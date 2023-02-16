<?php
class PlayerModel extends CI_Model 
{
	function saverecords($data)
	{
        $this->db->insert('playertable',$data);
        return true;
	}

	
}