<?php
class PlayerModel extends CI_Model 
{
	function saverecords($data)
	{
        $this->db->insert('playertable',$data);
        return true;
	}
	public function get_players() {
        $this->db->select('*');
        $this->db->from('playertable');
        $query = $this->db->get();
        return $query->result();
    }

	
}