<?php
class PlayerModel extends CI_Model 
{
	function saverecords($data)
	{
        $this->db->insert('playertable',$data);
        return true;
	}
	// public function get_players() {
    //     $this->db->select('*');
    //     $this->db->from('playertable');
	// 	$this->db->order_by('id','desc');
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    public function get_players() {
        $this->db->select('*');
        $query = $this->db->get('playertable');
        return $query->result();
    }
}