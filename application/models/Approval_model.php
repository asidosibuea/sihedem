<?php

 
class Approval_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get approval by IDAPPROVAL
     */
    function get_approval($IDAPPROVAL)
    {
        return $this->db->get_where('approval',array('IDAPPROVAL'=>$IDAPPROVAL))->row_array();
    }
    
    /*
     * Get all approval
     */
    function get_all_approval()
    {
        return $this->db->get('approval')->result_array();
    }
    
    /*
     * function to add new approval
     */
    function add_approval($params)
    {
        $this->db->insert('approval',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update approval
     */
    function update_approval($IDAPPROVAL,$params)
    {
        $this->db->where('IDAPPROVAL',$IDAPPROVAL);
        $response = $this->db->update('approval',$params);
        if($response)
        {
            return "approval updated successfully";
        }
        else
        {
            return "Error occuring while updating approval";
        }
    }
    
    /*
     * function to delete approval
     */
    function delete_approval($IDAPPROVAL)
    {
        $response = $this->db->delete('approval',array('IDAPPROVAL'=>$IDAPPROVAL));
        if($response)
        {
            return "approval deleted successfully";
        }
        else
        {
            return "Error occuring while deleting approval";
        }
    }
}
