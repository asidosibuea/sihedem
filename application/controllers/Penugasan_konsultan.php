<?php

 
class Penugasan_konsultan extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penugasan_konsultan_model');
    } 

    /*
     * Listing of penugasan_konsultan
     */
    function index()
    {
        $data['penugasan_konsultan'] = $this->Penugasan_konsultan_model->get_all_penugasan_konsultan();

        $data['_view'] = 'penugasan_konsultan/index';
        $this->load->view('dashboard_admin/main',$data);
    }
    
     function indexkonsultan()
    {
        $data['penugasan_konsultan'] = $this->Penugasan_konsultan_model->get_all_penugasan_konsultan();

        $data['_view'] = 'penugasan_konsultan/Penugasan';
        $this->load->view('dashboard_konsultan/main',$data);
    }

    /*
     * Adding a new penugasan_konsultan
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'LAMA_PENUGASAN' => $this->input->post('LAMA_PENUGASAN'),
				'TANGGAL' => $this->input->post('TANGGAL'),
				'NAMA_SEKOLAH' => $this->input->post('NAMA_SEKOLAH'),
				'ID_KONSULTAN' => $this->input->post('ID_KONSULTAN'),
            );
            
            $penugasan_konsultan_id = $this->Penugasan_konsultan_model->add_penugasan_konsultan($params);
            redirect('penugasan_konsultan/index');
        }
        else
        {            
            $data['_view'] = 'penugasan_konsultan/add';
            $this->load->view('dashboard_admin/main',$data);
        }
    }  

    /*
     * Editing a penugasan_konsultan
     */
    function edit($ID_PENUGASAN)
    {   
        // check if the penugasan_konsultan exists before trying to edit it
        $data['penugasan_konsultan'] = $this->Penugasan_konsultan_model->get_penugasan_konsultan($ID_PENUGASAN);
        
        if(isset($data['penugasan_konsultan']['ID_PENUGASAN']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'LAMA_PENUGASAN' => $this->input->post('LAMA_PENUGASAN'),
					'TANGGAL' => $this->input->post('TANGGAL'),
					'NAMA_SEKOLAH' => $this->input->post('NAMA_SEKOLAH'),
					'ID_KONSULTAN' => $this->input->post('ID_KONSULTAN'),
                );

                $this->Penugasan_konsultan_model->update_penugasan_konsultan($ID_PENUGASAN,$params);            
                redirect('penugasan_konsultan/index');
            }
            else
            {
                $data['_view'] = 'penugasan_konsultan/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The penugasan_konsultan you are trying to edit does not exist.');
    } 

    /*
     * Deleting penugasan_konsultan
     */
    function remove($ID_PENUGASAN)
    {
        $penugasan_konsultan = $this->Penugasan_konsultan_model->get_penugasan_konsultan($ID_PENUGASAN);

        // check if the penugasan_konsultan exists before trying to delete it
        if(isset($penugasan_konsultan['ID_PENUGASAN']))
        {
            $this->Penugasan_konsultan_model->delete_penugasan_konsultan($ID_PENUGASAN);
            redirect('penugasan_konsultan/index');
        }
        else
            show_error('The penugasan_konsultan you are trying to delete does not exist.');
    }
    
}
