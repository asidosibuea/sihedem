<?php

 
class Admin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get admin by ID_ADM
     */
    function get_admin($ID_ADM)
    {
        return $this->db->get_where('admin',array('ID_ADM'=>$ID_ADM))->row_array();
    }
    
    /*
     * Get all admin
     */
    function get_all_admin()
    {
        return $this->db->get('admin')->result_array();
    }
    
    /*
     * function to add new admin
     */
    function add_admin($params)
    {
        $this->db->insert('admin',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update admin
     */
    function update_admin($ID_ADM,$params)
    {
        $this->db->where('ID_ADM',$ID_ADM);
        $response = $this->db->update('admin',$params);
        if($response)
        {
            return "admin updated successfully";
        }
        else
        {
            return "Error occuring while updating admin";
        }
    }
    
    /*
     * function to delete admin
     */
    function delete_admin($ID_ADM)
    {
        $response = $this->db->delete('admin',array('ID_ADM'=>$ID_ADM));
        if($response)
        {
            return "admin deleted successfully";
        }
        else
        {
            return "Error occuring while deleting admin";
        }
    }
}
