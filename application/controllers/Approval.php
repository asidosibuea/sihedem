<?php

class Approval extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Approval_model');
    } 

    /*
     * Listing of approval
     */
    function index()
    {
        $data['approval'] = $this->Approval_model->get_all_approval();
        // $data2['permohonan_perbaikan'] = $this->Permohonan_perbaikan_model->get_all_permohonan_perbaikan();

        $data['_view'] = 'approval/index';
        $this->load->view('dashboard_admin/main',$data);
    }

    /*
     * Adding a new approval
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'STATUS' => $this->input->post('STATUS'),
				'TANGGAL' => $this->input->post('TANGGAL'),
				'ID_PERMOHONAN' => $this->input->post('ID_PERMOHONAN'),
				'ID_ADM' => $this->input->post('ID_ADM'),
            );
            
            $approval_id = $this->Approval_model->add_approval($params);
            redirect('approval/index');
        }
        else
        {            
            $data['_view'] = 'approval/add';
            $this->load->view('dashboard_admin/main',$data);
        }
    }  

    /*
     * Editing a approval
     */
    function edit($IDAPPROVAL)
    {   
        // check if the approval exists before trying to edit it
        $data['approval'] = $this->Approval_model->get_approval($IDAPPROVAL);
        
        if(isset($data['approval']['IDAPPROVAL']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'STATUS' => $this->input->post('STATUS'),
					'TANGGAL' => $this->input->post('TANGGAL'),
					'ID_PERMOHONAN' => $this->input->post('ID_PERMOHONAN'),
					'ID_ADM' => $this->input->post('ID_ADM'),
                );

                $this->Approval_model->update_approval($IDAPPROVAL,$params);            
                redirect('approval/index');
            }
            else
            {
                $data['_view'] = 'approval/edit';
                $this->load->view('dashboard_admin/main',$data);
            }
        }
        else
            show_error('The approval you are trying to edit does not exist.');
    } 

    /*
     * Deleting approval
     */
    function remove($IDAPPROVAL)
    {
        $approval = $this->Approval_model->get_approval($IDAPPROVAL);

        // check if the approval exists before trying to delete it
        if(isset($approval['IDAPPROVAL']))
        {
            $this->Approval_model->delete_approval($IDAPPROVAL);
            redirect('approval/index');
        }
        else
            show_error('The approval you are trying to delete does not exist.');
    }
    
}
