<?php

 
class Konsultan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get konsultan by ID_KONSULTAN
     */
    function get_konsultan($ID_KONSULTAN)
    {
        return $this->db->get_where('konsultan',array('ID_KONSULTAN'=>$ID_KONSULTAN))->row_array();
    }
    
    /*
     * Get all konsultan
     */
    function get_all_konsultan()
    {
        return $this->db->get('konsultan')->result_array();
    }
    
    /*
     * function to add new konsultan
     */
    function add_konsultan($params)
    {
        $this->db->insert('konsultan',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update konsultan
     */
    function update_konsultan($ID_KONSULTAN,$params)
    {
        $this->db->where('ID_KONSULTAN',$ID_KONSULTAN);
        $response = $this->db->update('konsultan',$params);
        if($response)
        {
            return "konsultan updated successfully";
        }
        else
        {
            return "Error occuring while updating konsultan";
        }
    }
    
    /*
     * function to delete konsultan
     */
    function delete_konsultan($ID_KONSULTAN)
    {
        $response = $this->db->delete('konsultan',array('ID_KONSULTAN'=>$ID_KONSULTAN));
        if($response)
        {
            return "konsultan deleted successfully";
        }
        else
        {
            return "Error occuring while deleting konsultan";
        }
    }
}
