<?php

 
class Penugasan_konsultan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get penugasan_konsultan by ID_PENUGASAN
     */
    function get_penugasan_konsultan($ID_PENUGASAN)
    {
        return $this->db->get_where('penugasan_konsultan',array('ID_PENUGASAN'=>$ID_PENUGASAN))->row_array();
    }
    
    /*
     * Get all penugasan_konsultan
     */
    function get_all_penugasan_konsultan()
    {
        return $this->db->get('penugasan_konsultan')->result_array();
    }
    
    /*
     * function to add new penugasan_konsultan
     */
    function add_penugasan_konsultan($params)
    {
        $this->db->insert('penugasan_konsultan',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update penugasan_konsultan
     */
    function update_penugasan_konsultan($ID_PENUGASAN,$params)
    {
        $this->db->where('ID_PENUGASAN',$ID_PENUGASAN);
        $response = $this->db->update('penugasan_konsultan',$params);
        if($response)
        {
            return "penugasan_konsultan updated successfully";
        }
        else
        {
            return "Error occuring while updating penugasan_konsultan";
        }
    }
    
    /*
     * function to delete penugasan_konsultan
     */
    function delete_penugasan_konsultan($ID_PENUGASAN)
    {
        $response = $this->db->delete('penugasan_konsultan',array('ID_PENUGASAN'=>$ID_PENUGASAN));
        if($response)
        {
            return "penugasan_konsultan deleted successfully";
        }
        else
        {
            return "Error occuring while deleting penugasan_konsultan";
        }
    }
}
