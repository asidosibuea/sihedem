<?php

 
class Permohonan_perbaikan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get permohonan_perbaikan by ID_PERMOHONAN
     */
    function get_permohonan_perbaikan($ID_PERMOHONAN)
    {
        return $this->db->get_where('permohonan_perbaikan',array('ID_PERMOHONAN'=>$ID_PERMOHONAN))->row_array();
    }
    
    /*
     * Get all permohonan_perbaikan
     */
    function get_all_permohonan_perbaikan()
    {   
        // $this->db->select('*');
        // $this->db->from('permohonan_perbaikan');
        // $this->db->join('approval', 'permohonan_perbaikan.ID_PERMOHONAN = approval.ID_PERMOHONAN');
        // return $this->db->get()->result_array();

         return $this->db->get('permohonan_perbaikan')->result_array();
    }
    
    
    function add_permohonan_perbaikan($params)
    {
        $this->db->insert('permohonan_perbaikan',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update permohonan_perbaikan
     */
    function update_permohonan_perbaikan($ID_PERMOHONAN,$params)
    {
        $this->db->where('ID_PERMOHONAN',$ID_PERMOHONAN);
        $response = $this->db->update('permohonan_perbaikan',$params);
        if($response)
        {
            return "permohonan_perbaikan updated successfully";
        }
        else
        {
            return "Error occuring while updating permohonan_perbaikan";
        }
    }
    
    /*
     * function to delete permohonan_perbaikan
     */
    function delete_permohonan_perbaikan($ID_PERMOHONAN)
    {
        $response = $this->db->delete('permohonan_perbaikan',array('ID_PERMOHONAN'=>$ID_PERMOHONAN));
        if($response)
        {
            return "permohonan_perbaikan deleted successfully";
        }
        else
        {
            return "Error occuring while deleting permohonan_perbaikan";
        }
    }
}
