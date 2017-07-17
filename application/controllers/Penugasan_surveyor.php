<?php

 
class Penugasan_surveyor extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penugasan_surveyor_model');
    } 

    /*
     * Listing of penugasan_surveyor
     */
    function index()
    {
        $data['penugasan_surveyor'] = $this->Penugasan_surveyor_model->get_all_penugasan_surveyor();

        $data['_view'] = 'Penugasan_surveyor/index';
        $this->load->view('dashboard_admin/main',$data);
    }
	
	function indexsurveyor()
    {
        $data['penugasan_surveyor'] = $this->Penugasan_surveyor_model->get_all_penugasan_surveyor();

        $data['_view'] = 'Penugasan_surveyor/penugasan';
        $this->load->view('dashboard_surveyor/main',$data);
    }

    /*
     * Adding a new penugasan_surveyor
     */
	
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'TANGGAL' => $this->input->post('TANGGAL'),
				'NAMA_SEKOLAH' => $this->input->post('NAMA_SEKOLAH'),
				'ID_SURVEYOR' => $this->input->post('ID_SURVEYOR'),
            );
            
            $penugasan_surveyor_id = $this->Penugasan_surveyor_model->add_penugasan_surveyor($params);
            redirect('penugasan_surveyor/index');
        }
        else
        {            
            $data['_view'] = 'penugasan_surveyor/add';
            $this->load->view('dashboard_admin/main',$data);
        }
    }  

    /*
     * Editing a penugasan_surveyor
     */
    function edit($ID_PENUGASAN)
    {   
        // check if the penugasan_surveyor exists before trying to edit it
        $data['penugasan_surveyor'] = $this->Penugasan_surveyor_model->get_penugasan_surveyor($ID_PENUGASAN);
        
        if(isset($data['penugasan_surveyor']['ID_PENUGASAN']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'TANGGAL' => $this->input->post('TANGGAL'),
					'NAMA_SEKOLAH' => $this->input->post('NAMA_SEKOLAH'),
					'ID_SURVEYOR' => $this->input->post('ID_SURVEYOR'),
                );

                $this->Penugasan_surveyor_model->update_penugasan_surveyor($ID_PENUGASAN,$params);            
                redirect('penugasan_surveyor/index');
            }
            else
            {
                $data['_view'] = 'penugasan_surveyor/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The penugasan_surveyor you are trying to edit does not exist.');
    } 

    /*
     * Deleting penugasan_surveyor
     */
    function remove($ID_PENUGASAN)
    {
        $penugasan_surveyor = $this->Penugasan_surveyor_model->get_penugasan_surveyor($ID_PENUGASAN);

        // check if the penugasan_surveyor exists before trying to delete it
        if(isset($penugasan_surveyor['ID_PENUGASAN']))
        {
            $this->Penugasan_surveyor_model->delete_penugasan_surveyor($ID_PENUGASAN);
            redirect('penugasan_surveyor/index');
        }
        else
            show_error('The penugasan_surveyor you are trying to delete does not exist.');
    }
    
}
