<?php
class Add_model extends CI_Model 
{
	
	function saverecords($data)
	{
        $this->db->insert('table',$data);
        return true;
	}
	
}