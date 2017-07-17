<?php

 
class Penilaian_kerusakan extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penilaian_kerusakan_model');
    } 

    /*
     * Listing of penilaian_kerusakan
     */
    function index()
    {
        $data['penilaian_kerusakan'] = $this->Penilaian_kerusakan_model->get_all_penilaian_kerusakan();

        $data['_view'] = 'penilaian_kerusakan/index';
        $this->load->view('dashboard_surveyor/main',$data);
    }

    function indexlaporan()
    {
        $data['penilaian_kerusakan'] = $this->Penilaian_kerusakan_model->get_all_penilaian_kerusakan();


        $data['_view'] = 'penilaian_kerusakan/view_laporan';
        $this->load->view('dashboard_admin/main',$data);
    }

    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
			$get_foto=$this->_upload_gambar();
			$get_foto2=$this->_upload_gambar2();
			$get_foto3=$this->_upload_gambar3();
			$FOTO1=$get_foto['file_name'];
			$FOTO2=$get_foto2['file_name'];
			$FOTO3=$get_foto3['file_name'];
			
            $params = array(
				'ID_PENILAIAN'    =>$this->input->post('ID_PENILAIAN'),
				'SARAN' 		  => $this->input->post('SARAN'),
				'NILAI_KERUSAKAN' => $this->input->post('NILAI_KERUSAKAN'),
				'JANGKA_WAKTU'    => $this->input->post('JANGKA_WAKTU'),
				'TANGGAL' 		  => $this->input->post('TANGGAL'),
				'FOTO1' 		  => $FOTO1,
				'FOTO2' 		  => $FOTO2,
				'FOTO3' 		  => $FOTO3,
				'ID_SURVEYOR'     => $this->input->post('ID_SURVEYOR'),
				'NAMA_SEKOLAH'    => $this->input->post('NAMA_SEKOLAH'),
            );
            
            $penilaian_kerusakan_id = $this->Penilaian_kerusakan_model->add_penilaian_kerusakan($params);
            redirect('penilaian_kerusakan/index');
        }
        else
        {            
            $data['_view'] = 'penilaian_kerusakan/add';
            $this->load->view('dashboard_surveyor/main',$data);
        }
    }  

    /*
     * Editing a penilaian_kerusakan
     */
    function edit($ID_PENILAIAN)
    {   
        // check if the penilaian_kerusakan exists before trying to edit it
        $data['penilaian_kerusakan'] = $this->Penilaian_kerusakan_model->get_penilaian_kerusakan($ID_PENILAIAN);
        
        if(isset($data['penilaian_kerusakan']['ID_PENILAIAN']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'SARAN' => $this->input->post('SARAN'),
					'NILAI_KERUSAKAN' => $this->input->post('NILAI_KERUSAKAN'),
					'JANGKA_WAKTU' => $this->input->post('JANGKA_WAKTU'),
					'TANGGAL' => $this->input->post('TANGGAL'),
					//'FOTO1' => $FOTO1,
					//'FOTO2' => $FOTO2,
					//'FOTO3' => $FOTO3,
					'ID_SURVEYOR' => $this->input->post('ID_SURVEYOR'),
                );

                $this->Penilaian_kerusakan_model->update_penilaian_kerusakan($ID_PENILAIAN,$params);            
                redirect('penilaian_kerusakan/index');
            }
            else
            {
                $data['_view'] = 'penilaian_kerusakan/edit';
                $this->load->view('dashboard_surveyor/main',$data);
            }
        }
        else
            show_error('The penilaian_kerusakan you are trying to edit does not exist.');
    } 

    /*
     * Deleting penilaian_kerusakan
     */
    function remove($ID_PENILAIAN)
    {
        $penilaian_kerusakan = $this->Penilaian_kerusakan_model->get_penilaian_kerusakan($ID_PENILAIAN);

        // check if the penilaian_kerusakan exists before trying to delete it
        if(isset($penilaian_kerusakan['ID_PENILAIAN']))
        {
            $this->Penilaian_kerusakan_model->delete_penilaian_kerusakan($ID_PENILAIAN);
            redirect('penilaian_kerusakan/index');
        }
        else
            show_error('The penilaian_kerusakan you are trying to delete does not exist.');
    }
    
	private function _upload_gambar() {

 		// Setup folder upload path
 		$config['upload_path']		= './uploads/';

 		// Setup file yang di izinkan
 		$config['allowed_types']	= 'gif|jpg|png|jpeg';

 		// Encrpt nama foto agar tidak sama
 		$config['encrypt_name']		= true;

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
 		$config['upload_path']		= './uploads/';

 		// Setup file yang di izinkan
 		$config['allowed_types']	= 'gif|jpg|png|jpeg';

 		// Encrpt nama foto agar tidak sama
 		$config['encrypt_name']		= true;

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
 		$config['upload_path']		= './uploads/';

 		// Setup file yang di izinkan
 		$config['allowed_types']	= 'gif|jpg|png|jpeg';

 		// Encrpt nama foto agar tidak sama
 		$config['encrypt_name']		= true;

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
