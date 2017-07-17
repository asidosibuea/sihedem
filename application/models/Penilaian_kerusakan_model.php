<?php

 
class Penilaian_kerusakan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get penilaian_kerusakan by ID_PENILAIAN
     */
    function get_penilaian_kerusakan($ID_PENILAIAN)
    {
        return $this->db->get_where('penilaian_kerusakan',array('ID_PENILAIAN'=>$ID_PENILAIAN))->row_array();
    }
    
    /*
     * Get all penilaian_kerusakan
     */
    function get_all_penilaian_kerusakan()
    {
        return $this->db->get('penilaian_kerusakan')->result_array();
    }
    
    /*
     * function to add new penilaian_kerusakan
     */
    function add_penilaian_kerusakan($params)
    {
        $this->db->insert('penilaian_kerusakan',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update penilaian_kerusakan
     */
    function update_penilaian_kerusakan($ID_PENILAIAN,$params)
    {
        $this->db->where('ID_PENILAIAN',$ID_PENILAIAN);
        $response = $this->db->update('penilaian_kerusakan',$params);
        if($response)
        {
            return "penilaian_kerusakan updated successfully";
        }
        else
        {
            return "Error occuring while updating penilaian_kerusakan";
        }
    }
    
    /*
     * function to delete penilaian_kerusakan
     */
    function delete_penilaian_kerusakan($ID_PENILAIAN)
    {
        $response = $this->db->delete('penilaian_kerusakan',array('ID_PENILAIAN'=>$ID_PENILAIAN));
        if($response)
        {
            return "penilaian_kerusakan deleted successfully";
        }
        else
        {
            return "Error occuring while deleting penilaian_kerusakan";
        }
    }
}
