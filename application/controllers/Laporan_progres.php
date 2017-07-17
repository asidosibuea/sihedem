<?php

 
class Laporan_progres extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_progres_model');
    } 

    /*
     * Listing of laporan_progress
     */
    function index()
    {
        $data['laporan_progress'] = $this->Laporan_progres_model->get_all_laporan_progress();

        $data['_view'] = 'laporan_progres/index';
        $this->load->view('dashboard_konsultan/main',$data);
    }
    function indexlaporan()
    {
        $data['laporan_progress'] = $this->Laporan_progres_model->get_all_laporan_progress();

        $data['_view'] = 'laporan_progres/view_laporan';
        $this->load->view('dashboard_admin/main',$data);
    }

    /*
     * Adding a new laporan_progres
     */
    function add()
    {   
        $this->load->library('form_validation');

                $this->form_validation->set_rules('ID_KONSULTAN','ID KONSULTAN','required');
                $this->form_validation->set_rules('NAMA_SEKOLAH','NAMA SEKOLAH','required');
		$this->form_validation->set_rules('NAMA_PROGRESS','NAMA PROGRESS','required|max_length[25]');
		$this->form_validation->set_rules('PERSENTASE_PROGRESS','PERSENTASE PROGRESS','required|integer');
		$this->form_validation->set_rules('TANGGAL','TANGGAL','required');
		//$this->form_validation->set_rules('FOTO1','FOTO1','required');
		//$this->form_validation->set_rules('FOTO2','FOTO2','required');
		//$this->form_validation->set_rules('FOTO3','FOTO3','required');
		
		if($this->form_validation->run())     
        {   
            $get_foto=$this->_upload_gambar();
            $get_foto2=$this->_upload_gambar2();
            $get_foto3=$this->_upload_gambar3();
            $FOTO1=$get_foto['file_name'];
            $FOTO2=$get_foto2['file_name'];
            $FOTO3=$get_foto3['file_name'];
            
            $params = array(
                'ID_KONSULTAN' => $this->input->post('ID_KONSULTAN'),
                'NAMA_SEKOLAH' => $this->input->post('NAMA_SEKOLAH'),
				'NAMA_PROGRESS' => $this->input->post('NAMA_PROGRESS'),
				'PERSENTASE_PROGRESS' => $this->input->post('PERSENTASE_PROGRESS'),
				'TANGGAL' => $this->input->post('TANGGAL'),
				'FOTO1' => $FOTO1,
				'FOTO2' => $FOTO2,
				'FOTO3' => $FOTO3,
				'ID_KONSULTAN' => $this->input->post('ID_KONSULTAN'),
            );
            
            $laporan_progres_id = $this->Laporan_progres_model->add_laporan_progres($params);
            redirect('laporan_progres/index');
        }
        else
        {            
            $data['_view'] = 'laporan_progres/add';
            $this->load->view('dashboard_konsultan/main',$data);
        }
    }  

    /*
     * Editing a laporan_progres
     */
    function edit($ID_PROGRESS)
    {   
        // check if the laporan_progres exists before trying to edit it
        $data['laporan_progres'] = $this->Laporan_progres_model->get_laporan_progres($ID_PROGRESS);
        
        if(isset($data['laporan_progres']['ID_PROGRESS']))
        {
            $this->load->library('form_validation');
                                    
			$this->form_validation->set_rules('NAMA_PROGRESS','NAMA PROGRESS','required|max_length[25]');
			$this->form_validation->set_rules('PERSENTASE_PROGRESS','PERSENTASE PROGRESS','required|integer');
			$this->form_validation->set_rules('TANGGAL','TANGGAL','required');
			//$this->form_validation->set_rules('FOTO1','FOTO1','required');
			//$this->form_validation->set_rules('FOTO2','FOTO2','required');
			//$this->form_validation->set_rules('FOTO3','FOTO3','required');
			$this->form_validation->set_rules('ID_KONSULTAN','ID KONSULTAN','required|integer');
		
			if($this->form_validation->run())     
            {   
                $params = array(

					'NAMA_PROGRESS' => $this->input->post('NAMA_PROGRESS'),
					'PERSENTASE_PROGRESS' => $this->input->post('PERSENTASE_PROGRESS'),
					'TANGGAL' => $this->input->post('TANGGAL'),
					//'FOTO1' => $this->input->post('FOTO1'),
					//'FOTO2' => $this->input->post('FOTO2'),
					//'FOTO3' => $this->input->post('FOTO3'),
					'ID_KONSULTAN' => $this->input->post('ID_KONSULTAN'),
                );

                $this->Laporan_progres_model->update_laporan_progres($ID_PROGRESS,$params);            
                redirect('laporan_progres/index');
            }
            else
            {
                $data['_view'] = 'laporan_progres/edit';
                $this->load->view('dashboard_konsultan/main',$data);
            }
        }
        else
            show_error('The laporan_progres you are trying to edit does not exist.');
    } 

    /*
     * Deleting laporan_progres
     */
    function remove($ID_PROGRESS)
    {
        $laporan_progres = $this->Laporan_progres_model->get_laporan_progres($ID_PROGRESS);

        // check if the laporan_progres exists before trying to delete it
        if(isset($laporan_progres['ID_PROGRESS']))
        {
            $this->Laporan_progres_model->delete_laporan_progres($ID_PROGRESS);
            redirect('laporan_progres/index');
        }
        else
            show_error('The laporan_progres you are trying to delete does not exist.');
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
