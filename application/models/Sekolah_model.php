<?php

class Sekolah_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get sekolah by NAMA_SEKOLAH
     */
    function get_sekolah($NAMA_SEKOLAH)
    {
        return $this->db->get_where('sekolah',array('NAMA_SEKOLAH'=>$NAMA_SEKOLAH))->row_array();
    }
    
    /*
     * Get all sekolah
     */
    function get_all_sekolah()
    {
        return $this->db->get('sekolah')->result_array();
    }
    
    /*
     * function to add new sekolah
     */
    function add_sekolah($params)
    {
        $this->db->insert('sekolah',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update sekolah
     */
    function update_sekolah($NAMA_SEKOLAH,$params)
    {
        $this->db->where('NAMA_SEKOLAH',$NAMA_SEKOLAH);
        $response = $this->db->update('sekolah',$params);
        if($response)
        {
            return "sekolah updated successfully";
        }
        else
        {
            return "Error occuring while updating sekolah";
        }
    }
    
    /*
     * function to delete sekolah
     */
    function delete_sekolah($NAMA_SEKOLAH)
    {
        $response = $this->db->delete('sekolah',array('NAMA_SEKOLAH'=>$NAMA_SEKOLAH));
        if($response)
        {
            return "sekolah deleted successfully";
        }
        else
        {
            return "Error occuring while deleting sekolah";
        }
    }
}
