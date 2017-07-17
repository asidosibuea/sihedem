<?php

 
class Permohonan_perbaikan extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Permohonan_perbaikan_model');
    } 

    /*
     * Listing of permohonan_perbaikan
     */
    function index()
    {
        $data['permohonan_perbaikan'] = $this->Permohonan_perbaikan_model->get_all_permohonan_perbaikan();

        $data['_view'] = 'permohonan_perbaikan/index';
        $this->load->view('dashboard_kepsek/main',$data);
    }

    function indexpermohonan()
    {
        $data['permohonan_perbaikan'] = $this->Permohonan_perbaikan_model->get_all_permohonan_perbaikan();

        $data['_view'] = 'permohonan_perbaikan/kelola_permohonan';
        $this->load->view('dashboard_admin/main',$data);
    }

    /*
     * Adding a new permohonan_perbaikan
     */
    function add()
    {   
        $this->load->library('form_validation');

        $status="Belum diapprove";

		$this->form_validation->set_rules('NAMA_SEKOLAH','NAMA SEKOLAH','trim|required|max_length[25]');
        $this->form_validation->set_rules('JUDUL_PERMOHONAN','JUDUL PERMOHONAN','required|max_length[50]');
		$this->form_validation->set_rules('DESKRIPSI','DESKRIPSI','required|max_length[100]');
        $this->form_validation->set_rules('TANGGAL','TANGGAL','required');
        // $this->form_validation->set_rules('FOTO1','FOTO1','required');
        // $this->form_validation->set_rules('FOTO2','FOTO2','required');
        // $this->form_validation->set_rules('FOTO3','FOTO3','required');
		
		if($this->form_validation->run())     
        {   
            $get_foto=$this->_upload_gambar();
            $get_foto2=$this->_upload_gambar2();
            $get_foto3=$this->_upload_gambar3();
            $FOTO1=$get_foto['file_name'];
            $FOTO2=$get_foto2['file_name'];
            $FOTO3=$get_foto3['file_name'];
            $params = array(
				'NAMA_SEKOLAH' => $this->input->post('NAMA_SEKOLAH'),
                'JUDUL_PERMOHONAN' => $this->input->post('JUDUL_PERMOHONAN'),
				'DESKRIPSI' => $this->input->post('DESKRIPSI'),
                'TANGGAL' => $this->input->post('TANGGAL'),
                'FOTO1' => $FOTO1,
                'FOTO2' => $FOTO2,
                'FOTO3' => $FOTO3,
                'status'=>$status,
            );
            
            $permohonan_perbaikan_id = $this->Permohonan_perbaikan_model->add_permohonan_perbaikan($params);
            redirect('permohonan_perbaikan/index');
        }
        else
        {            
            $data['_view'] = 'permohonan_perbaikan/add';
            $this->load->view('dashboard_kepsek/main',$data);
        }
    }  

    /*
     * Editing a permohonan_perbaikan
     */
    function edit($ID_PERMOHONAN)
    {   
        // check if the permohonan_perbaikan exists before trying to edit it
        $data['permohonan_perbaikan'] = $this->Permohonan_perbaikan_model->get_permohonan_perbaikan($ID_PERMOHONAN);
        
        if(isset($data['permohonan_perbaikan']['ID_PERMOHONAN']))
        {
            $this->load->library('form_validation');

			// $this->form_validation->set_rules('NAMA_SEKOLAH','NAMA SEKOLAH','required|max_length[25]');
   //          // $this->form_validation->set_rules('JUDUL_PERMOHONAN','JUDUL PERMOHONAN','required|max_length[50]');
			// $this->form_validation->set_rules('DESKRIPSI','DESKRIPSI','required|max_length[100]');
            // $this->form_validation->set_rules('TANGGAL','TANGGAL','required');
            // $this->form_validation->set_rules('FOTO1','FOTO1','required');
            // $this->form_validation->set_rules('FOTO2','FOTO2','required');
            // $this->form_validation->set_rules('FOTO3','FOTO3','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
                    // 'NAMA_SEKOLAH' => $this->input->post('NAMA_SEKOLAH'),
                    // 'JUDUL_PERMOHONAN' => $this->input->post('JUDUL_PERMOHONAN'),
                    // 'DESKRIPSI' => $this->input->post('DESKRIPSI'),
                    // 'TANGGAL' => $this->input->post('TANGGAL'),
                    // 'FOTO1' => $this->input->post('FOTO1'),
                    // 'FOTO2' => $this->input->post('FOTO2'),
                    // 'FOTO3' => $this->input->post('FOTO3'),
                    'STATUS'=> $this->input->post('STATUS'),
                );

                $this->Permohonan_perbaikan_model->update_permohonan_perbaikan($ID_PERMOHONAN,$params);            
                redirect('permohonan_perbaikan/indexpermohonan');
            }
            else
            {
                $data['_view'] = 'permohonan_perbaikan/edit';
                $this->load->view('dashboard_admin/main',$data);
            }
        }
        else
            show_error('The permohonan_perbaikan you are trying to edit does not exist.');
    } 

    /*
     * Deleting permohonan_perbaikan
     */
    function remove($ID_PERMOHONAN)
    {
        $permohonan_perbaikan = $this->Permohonan_perbaikan_model->get_permohonan_perbaikan($ID_PERMOHONAN);

        // check if the permohonan_perbaikan exists before trying to delete it
        if(isset($permohonan_perbaikan['ID_PERMOHONAN']))
        {
            $this->Permohonan_perbaikan_model->delete_permohonan_perbaikan($ID_PERMOHONAN);
            redirect('permohonan_perbaikan/index');
        }
        else
            show_error('The permohonan_perbaikan you are trying to delete does not exist.');
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
        if( $this->upload->do_upload( 'FOTO1' ) == false) {
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
    
    private function _upload_gambar2() {

        // Setup folder upload path
        $config['upload_path']      = './uploads/';

        // Setup file yang di izinkan
        $config['allowed_types']    = 'gif|jpg|png|jpeg';

        // Encrpt nama foto agar tidak sama
        $config['encrypt_name']     = true;

        // Memanggil library upload disertai dengan paramter $config array
        $this->load->library('upload', $config);

        // jika upload gagal, return false
        if( $this->upload->do_upload( 'FOTO2' ) == false) {
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
            $config['create_thumb'] = FALSE;

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
    private function _upload_gambar3() {

        // Setup folder upload path
        $config['upload_path']      = './uploads/';

        // Setup file yang di izinkan
        $config['allowed_types']    = 'gif|jpg|png|jpeg';

        // Encrpt nama foto agar tidak sama
        $config['encrypt_name']     = true;

        // Memanggil library upload disertai dengan paramter $config array
        $this->load->library('upload', $config);

        // jika upload gagal, return false
        if( $this->upload->do_upload( 'FOTO3' ) == false) {
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
            $config['create_thumb'] = FALSE;

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
