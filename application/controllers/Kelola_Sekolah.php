<?php

 
class Kelola_Sekolah extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sekolah_model');
    } 

    /*
     * Listing of sekolah
     */
    function index()
    {
        $data['sekolah'] = $this->Sekolah_model->get_all_sekolah();

        $data['_view'] = 'kelola_sekolah/index';
        $this->load->view('dashboard_admin/main',$data);
    }

    /*
     * Adding a new sekolah
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('NAMA_SEKOLAH','Nama Sekolah','trim|required|max_length[25]');
            $this->form_validation->set_rules('USERNAME','USERNAME','required|max_length[20]');
            $this->form_validation->set_rules('PASSWORD','PASSWORD','required|max_length[20]');
            $this->form_validation->set_rules('NO_TELP','NO TELP','required|integer');


            $this->form_validation->set_rules('ALAMAT','ALAMAT','required|max_length[100]');


		if($this->form_validation->run())     
        {   
            $get_foto=$this->_upload_gambar();
            $FOTO_PROFIL=$get_foto['file_name'];
            $params = array(
				'NAMA_SEKOLAH'=>$this->input->post('NAMA_SEKOLAH'),
                'USERNAME' => $this->input->post('USERNAME'),
                'PASSWORD' => $this->input->post('PASSWORD'),
                'NO_TELP' => $this->input->post('NO_TELP'),
                'FOTO_PROFIL' => $FOTO_PROFIL,
                'ALAMAT' => $this->input->post('ALAMAT'),
            );
            
            $sekolah_id = $this->Sekolah_model->add_sekolah($params);
            redirect('kelola_sekolah/index');
        }
        else
        {            
            $data['_view'] = 'kelola_sekolah/add';
            $this->load->view('dashboard_admin/main',$data);
        }
    }  

    /*
     * Editing a sekolah
     */
    function edit($NAMA_SEKOLAH)
    {   
        // check if the sekolah exists before trying to edit it
        $data['sekolah'] = $this->Sekolah_model->get_sekolah($NAMA_SEKOLAH);
        
        if(isset($data['sekolah']['NAMA_SEKOLAH']))
        {
            $this->load->library('form_validation');

            // $this->form_validation->set_rules('NAMA_SEKOLAH','Nama Sekolah','required|max_length[25]');
			$this->form_validation->set_rules('USERNAME','USERNAME','required|max_length[20]');
            $this->form_validation->set_rules('PASSWORD','PASSWORD','required|max_length[20]');
            $this->form_validation->set_rules('NO_TELP','NO TELP','required|integer');
			// $this->form_validation->set_rules('FOTO_PROFIL','FOTO PROFIL','required');
			$this->form_validation->set_rules('ALAMAT','ALAMAT','required|max_length[100]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
                    //'NAMA_SEKOLAH'=>$this->input->post('NAMA_SEKOLAH'),
					'USERNAME' => $this->input->post('USERNAME'),
                    'PASSWORD' => $this->input->post('PASSWORD'),
                    'NO_TELP' => $this->input->post('NO_TELP'),
                    'FOTO_PROFIL' => $this->input->post('FOTO_PROFIL'),
					'ALAMAT' => $this->input->post('ALAMAT'),
                );

                $this->Sekolah_model->update_sekolah($NAMA_SEKOLAH,$params);            
                redirect('kelola_sekolah/index');
            }
            else
            {
                $data['_view'] = 'kelola_sekolah/edit';
                $this->load->view('dashboard_admin/main',$data);
            }
        }
        else
            show_error('The sekolah you are trying to edit does not exist.');
    } 

    /*
     * Deleting sekolah
     */
    function remove($NAMA_SEKOLAH)
    {
        $sekolah = $this->Sekolah_model->get_sekolah($NAMA_SEKOLAH);

        // check if the sekolah exists before trying to delete it
        if(isset($sekolah['NAMA_SEKOLAH']))
        {
            $this->Sekolah_model->delete_sekolah($NAMA_SEKOLAH);
            redirect('kelola_sekolah/index');
        }
        else
            show_error('The sekolah you are trying to delete does not exist.');
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
