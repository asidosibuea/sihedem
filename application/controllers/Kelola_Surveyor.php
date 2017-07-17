<?php

class Kelola_Surveyor extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Surveyor_model');
    } 

    /*
     * Listing of surveyor
     */
    function index()
    {
        $data['surveyor'] = $this->Surveyor_model->get_all_surveyor();

        $data['_view'] = 'kelola_surveyor/index';
        $this->load->view('dashboard_admin/main',$data);
    }

    /*
     * Adding a new surveyor
     */
    function add()
    {   
        
        $this->load->library('form_validation');
		
		$this->form_validation->set_rules('ID_SURVEYOR','ID_SURVEYOR','required');
		$this->form_validation->set_rules('NAMA_SURVEYOR','NAMA SURVEYOR','required|max_length[25]');
		$this->form_validation->set_rules('NO_TELP','NO TELP','required|integer');
		$this->form_validation->set_rules('USERNAME','USERNAME','required|max_length[20]');
		$this->form_validation->set_rules('PASSWORD','PASSWORD','required|max_length[20]');
		$this->form_validation->set_rules('ALAMAT','ALAMAT','required|max_length[100]');
		// $this->form_validation->set_rules('FOTO_PROFIL','FOTO PROFIL','required');
		
		if($this->form_validation->run())     
        {  

            $get_foto=$this->_upload_gambar();
            $FOTO_PROFIL=$get_foto['file_name']; 

            $params = array(
				'ID_SURVEYOR' =>$this->input->post('ID_SURVEYOR'),
				'NAMA_SURVEYOR' => $this->input->post('NAMA_SURVEYOR'),
				'NO_TELP' => $this->input->post('NO_TELP'),
				'USERNAME' => $this->input->post('USERNAME'),
				'PASSWORD' => $this->input->post('PASSWORD'),
				'ALAMAT' => $this->input->post('ALAMAT'),
				'FOTO_PROFIL' => $FOTO_PROFIL,
            );
            
            $surveyor_id = $this->Surveyor_model->add_surveyor($params);
            redirect('Kelola_Surveyor/index');
        }
        else
        {            
            $data['_view'] = 'Kelola_Surveyor/add';
            $this->load->view('dashboard_admin/main',$data);
        }
    }  

    /*
     * Editing a surveyor
     */
    function edit($ID_SURVEYOR)
    {   
        // check if the surveyor exists before trying to edit it
        $data['surveyor'] = $this->Surveyor_model->get_surveyor($ID_SURVEYOR);
        
        if(isset($data['surveyor']['ID_SURVEYOR']))
        {
            $this->load->library('form_validation');
			
			$this->form_validation->set_rules('PASSWORD','PASSWORD','required|max_length[20]');
			$this->form_validation->set_rules('NO_TELP','NO TELP','required|integer');
			$this->form_validation->set_rules('USERNAME','USERNAME','required|max_length[20]');
			//$this->form_validation->set_rules('FOTO_PROFIL','FOTO PROFIL','required');
			$this->form_validation->set_rules('NAMA_SURVEYOR','NAMA SURVEYOR','required|max_length[25]');
			$this->form_validation->set_rules('ALAMAT','ALAMAT','required|max_length[100]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'PASSWORD' => $this->input->post('PASSWORD'),
					'NO_TELP' => $this->input->post('NO_TELP'),
					'USERNAME' => $this->input->post('USERNAME'),
					//'FOTO_PROFIL' => $this->input->post('FOTO_PROFIL'),
					'NAMA_SURVEYOR' => $this->input->post('NAMA_SURVEYOR'),
					'ALAMAT' => $this->input->post('ALAMAT'),
                );

                $this->Surveyor_model->update_surveyor($ID_SURVEYOR,$params);            
                redirect('Kelola_Surveyor/index');
            }
            else
            {
                $data['_view'] = 'Kelola_Surveyor/edit';
                $this->load->view('dashboard_admin/main',$data);
            }
        }
        else
            show_error('The surveyor you are trying to edit does not exist.');
    } 

    /*
     * Deleting surveyor
     */
    function remove($ID_SURVEYOR)
    {
        $surveyor = $this->Surveyor_model->get_surveyor($ID_SURVEYOR);

        // check if the surveyor exists before trying to delete it
        if(isset($surveyor['ID_SURVEYOR']))
        {
            $this->Surveyor_model->delete_surveyor($ID_SURVEYOR);
            redirect('Kelola_Surveyor/index');
        }
        else
            show_error('The surveyor you are trying to delete does not exist.');
    }

    private function _upload_gambar() {

        // Setup folder upload path
        $config['upload_path']      = './uploads/';

        // Setup file yang di izinkan
        $config['allowed_types']    = 'gif|jpg|png|jpeg';

        // Encrpt nama foto agar tidak sama
        $config['encrypt_name']     = true;

        // Memanggil library upload disertai dengan paramter $config array
        $this->load->library('upload', $config);

        // jika upload gagal, return false
        if( $this->upload->do_upload( 'FOTO_PROFIL' ) == false) {
            return false;
            #return $this->upload->display_errors();
        } 
        
        // jika upload berhasil, return nama file dan membuat thumbnail foto
        else 
        {
            // Mengambil data yang berhasil di upload
            $uploaded_data = $this->upload->data();

            // Mendapatkan nama file
            $file_name = $uploaded_data['file_name'];

            // Memanggil library GD 2
            $config['image_library'] = 'gd2';

            // Memanggil nama file images
            $config['source_image'] = './uploads/'.$file_name;

            // Membuat thumbnail
            $config['create_thumb'] = TRUE;

            // Mempertahankan foto berdasarkan ratio, hal ini digunakan agar foto tidak gepeng
            $config['maintain_ratio'] = TRUE;

            // Setting lebar dan tinggi
            $config['width']         = 100;
            $config['height']       = 100;

            // Memanggil library image_lib untuk memproses images resize disertai dengan parameter $config
            $this->load->library('image_lib', $config);

            // Melakukan resize
            $this->image_lib->resize();

            // Return data
            return $uploaded_data;
        }
    }
    
}
