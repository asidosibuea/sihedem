<?php

 
class Admin extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    } 

    /*
     * Listing of admin
     */
    function index()
    {
        $data['admin'] = $this->Admin_model->get_all_admin();

        $data['_view'] = 'admin/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new admin
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('PASSWORD','PASSWORD','required|max_length[20]');
		$this->form_validation->set_rules('USERNAME','USERNAME','required|max_length[20]');
		$this->form_validation->set_rules('FOTO_PROFIL','FOTO PROFIL','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'PASSWORD' => $this->input->post('PASSWORD'),
				'USERNAME' => $this->input->post('USERNAME'),
				'FOTO_PROFIL' => $this->input->post('FOTO_PROFIL'),
            );
            
            $admin_id = $this->Admin_model->add_admin($params);
            redirect('admin/index');
        }
        else
        {            
            $data['_view'] = 'admin/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a admin
     */
    function edit($ID_ADM)
    {   
        // check if the admin exists before trying to edit it
        $data['admin'] = $this->Admin_model->get_admin($ID_ADM);
        
        if(isset($data['admin']['ID_ADM']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('PASSWORD','PASSWORD','required|max_length[20]');
			$this->form_validation->set_rules('USERNAME','USERNAME','required|max_length[20]');
			$this->form_validation->set_rules('FOTO_PROFIL','FOTO PROFIL','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'PASSWORD' => $this->input->post('PASSWORD'),
					'USERNAME' => $this->input->post('USERNAME'),
					'FOTO_PROFIL' => $this->input->post('FOTO_PROFIL'),
                );

                $this->Admin_model->update_admin($ID_ADM,$params);            
                redirect('admin/index');
            }
            else
            {
                $data['_view'] = 'admin/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The admin you are trying to edit does not exist.');
    } 

    /*
     * Deleting admin
     */
    function remove($ID_ADM)
    {
        $admin = $this->Admin_model->get_admin($ID_ADM);

        // check if the admin exists before trying to delete it
        if(isset($admin['ID_ADM']))
        {
            $this->Admin_model->delete_admin($ID_ADM);
            redirect('admin/index');
        }
        else
            show_error('The admin you are trying to delete does not exist.');
    }
    
}
