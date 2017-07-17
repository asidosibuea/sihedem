<?php

 
class Surveyor_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get surveyor by ID_SURVEYOR
     */
    function get_surveyor($ID_SURVEYOR)
    {
        return $this->db->get_where('surveyor',array('ID_SURVEYOR'=>$ID_SURVEYOR))->row_array();
    }
    
    /*
     * Get all surveyor
     */
    function get_all_surveyor()
    {
        return $this->db->get('surveyor')->result_array();
    }
    
    /*
     * function to add new surveyor
     */
    function add_surveyor($params)
    {
        $this->db->insert('surveyor',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update surveyor
     */
    function update_surveyor($ID_SURVEYOR,$params)
    {
        $this->db->where('ID_SURVEYOR',$ID_SURVEYOR);
        $response = $this->db->update('surveyor',$params);
        if($response)
        {
            return "surveyor updated successfully";
        }
        else
        {
            return "Error occuring while updating surveyor";
        }
    }
    
    /*
     * function to delete surveyor
     */
    function delete_surveyor($ID_SURVEYOR)
    {
        $response = $this->db->delete('surveyor',array('ID_SURVEYOR'=>$ID_SURVEYOR));
        if($response)
        {
            return "surveyor deleted successfully";
        }
        else
        {
            return "Error occuring while deleting surveyor";
        }
    }
}
