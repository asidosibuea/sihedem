<?php

class Penugasan_surveyor_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get penugasan_surveyor by ID_PENUGASAN
     */
    function get_penugasan_surveyor($ID_PENUGASAN)
    {
        return $this->db->get_where('penugasan_surveyor',array('ID_PENUGASAN'=>$ID_PENUGASAN))->row_array();
    }
    
    /*
     * Get all penugasan_surveyor
     */
    function get_all_penugasan_surveyor()
    {
        return $this->db->get('penugasan_surveyor')->result_array();
    }
    
    /*
     * function to add new penugasan_surveyor
     */
    function add_penugasan_surveyor($params)
    {
        $this->db->insert('penugasan_surveyor',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update penugasan_surveyor
     */
    function update_penugasan_surveyor($ID_PENUGASAN,$params)
    {
        $this->db->where('ID_PENUGASAN',$ID_PENUGASAN);
        $response = $this->db->update('penugasan_surveyor',$params);
        if($response)
        {
            return "penugasan_surveyor updated successfully";
        }
        else
        {
            return "Error occuring while updating penugasan_surveyor";
        }
    }
    
    /*
     * function to delete penugasan_surveyor
     */
    function delete_penugasan_surveyor($ID_PENUGASAN)
    {
        $response = $this->db->delete('penugasan_surveyor',array('ID_PENUGASAN'=>$ID_PENUGASAN));
        if($response)
        {
            return "penugasan_surveyor deleted successfully";
        }
        else
        {
            return "Error occuring while deleting penugasan_surveyor";
        }
    }
}
