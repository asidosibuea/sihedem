<?php

class Laporan_progres_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get laporan_progres by ID_PROGRESS
     */
    function get_laporan_progres($ID_PROGRESS)
    {
        return $this->db->get_where('laporan_progress',array('ID_PROGRESS'=>$ID_PROGRESS))->row_array();
    }
    
    /*
     * Get all laporan_progress
     */
    function get_all_laporan_progress()
    {
        return $this->db->get('laporan_progress')->result_array();
    }
    
    /*
     * function to add new laporan_progres
     */
    function add_laporan_progres($params)
    {
        $this->db->insert('laporan_progress',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update laporan_progres
     */
    function update_laporan_progres($ID_PROGRESS,$params)
    {
        $this->db->where('ID_PROGRESS',$ID_PROGRESS);
        $response = $this->db->update('laporan_progress',$params);
        if($response)
        {
            return "laporan_progres updated successfully";
        }
        else
        {
            return "Error occuring while updating laporan_progres";
        }
    }
    
    /*
     * function to delete laporan_progres
     */
    function delete_laporan_progres($ID_PROGRESS)
    {
        $response = $this->db->delete('laporan_progress',array('ID_PROGRESS'=>$ID_PROGRESS));
        if($response)
        {
            return "laporan_progres deleted successfully";
        }
        else
        {
            return "Error occuring while deleting laporan_progres";
        }
    }
}
