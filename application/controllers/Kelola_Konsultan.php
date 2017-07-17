<?php

class Kelola_Konsultan extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Konsultan_model');
    } 

    /*
     * Listing of konsultan
     */
    function index()
    {
        $data['konsultan'] = $this->Konsultan_model->get_all_konsultan();

        $data['_view'] = 'kelola_konsultan/index';
        $this->load->view('dashboard_admin/main',$data);
    }


    function add()
    {   
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('ID_KONSULTAN','ID KONSULTAN','required');
        $this->form_validation->set_rules('NAMA_KONSULTAN','NAMA KONSULTAN','required|max_length[25]');
        $this->form_validation->set_rules('USERNAME','USERNAME','required|max_length[20]');
		$this->form_validation->set_rules('PASSWORD','PASSWORD','required|max_length[20]');		
		$this->form_validation->set_rules('NO_TELP','NO TELP','required|integer');
		//$this->form_validation->set_rules('FOTO_PROFIL','FOTO PROFIL','required');
		$this->form_validation->set_rules('ALAMAT','ALAMAT','required|max_length[100]');
		
		if($this->form_validation->run())     
        {   
            $get_foto=$this->_upload_gambar();
            $FOTO_PROFIL=$get_foto['file_name'];
            $params = array(
                'ID_KONSULTAN'=> $this->input->post('ID_KONSULTAN'),
				'PASSWORD' => $this->input->post('PASSWORD'),
				'NAMA_KONSULTAN' => $this->input->post('NAMA_KONSULTAN'),
				'NO_TELP' => $this->input->post('NO_TELP'),
				'USERNAME' => $this->input->post('USERNAME'),
				'FOTO_PROFIL' => $FOTO_PROFIL,
				'ALAMAT' => $this->input->post('ALAMAT'),
            );
            
            $konsultan_id = $this->Konsultan_model->add_konsultan($params);
            redirect('kelola_konsultan/index');
        }
        else
        {            
            $data['_view'] = 'kelola_konsultan/add';
            $this->load->view('dashboard_admin/main',$data);
        }
    }  

    /*
     * Editing a konsultan
     */
    function edit($ID_KONSULTAN)
    {   
        // check if the konsultan exists before trying to edit it
        $data['konsultan'] = $this->Konsultan_model->get_konsultan($ID_KONSULTAN);
        
        if(isset($data['konsultan']['ID_KONSULTAN']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('PASSWORD','PASSWORD','required|max_length[20]');
			$this->form_validation->set_rules('NAMA_KONSULTAN','NAMA KONSULTAN','required|max_length[25]');
			$this->form_validation->set_rules('NO_TELP','NO TELP','required|integer');
			$this->form_validation->set_rules('USERNAME','USERNAME','required|max_length[20]');
			//$this->form_validation->set_rules('FOTO_PROFIL','FOTO PROFIL','required');
			$this->form_validation->set_rules('ALAMAT','ALAMAT','required|max_length[100]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'PASSWORD' => $this->input->post('PASSWORD'),
					'NAMA_KONSULTAN' => $this->input->post('NAMA_KONSULTAN'),
					'NO_TELP' => $this->input->post('NO_TELP'),
					'USERNAME' => $this->input->post('USERNAME'),
					//'FOTO_PROFIL' => $this->input->post('FOTO_PROFIL'),
					'ALAMAT' => $this->input->post('ALAMAT'),
                );

                $this->Konsultan_model->update_konsultan($ID_KONSULTAN,$params);            
                redirect('kelola_konsultan/index');
            }
            else
            {
                $data['_view'] = 'kelola_konsultan/edit';
                $this->load->view('dashboard_admin/main',$data);
            }
        }
        else
            show_error('The konsultan you are trying to edit does not exist.');
    } 

    /*
     * Deleting konsultan
     */
    function remove($ID_KONSULTAN)
    {
        $konsultan = $this->Konsultan_model->get_konsultan($ID_KONSULTAN);

        // check if the konsultan exists before trying to delete it
        if(isset($konsultan['ID_KONSULTAN']))
        {
            $this->Konsultan_model->delete_konsultan($ID_KONSULTAN);
            redirect('kelola_konsultan/index');
        }
        else
            show_error('The konsultan you are trying to delete does not exist.');
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
