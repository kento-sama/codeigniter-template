<?php

class MyModel extends CI_Model {

// public function insert_data($data) {
//     $this->db->insert('pet', $data);
// }

public function get_data() {
	
	$this->db->where('row_status', "1");
    $query = $this->db->get('pet');
    return $query->result_array();

}

public function save_data($post_data = [])
{
	if( ! empty($post_data))


	{
		$data['name']       = $post_data['name'];
		$data['species']    = $post_data['species'];
		$data['age']	    = $post_data['age'];

		$data['row_status'] = $post_data['row_status'];

		$this->db->where('id', $post_data['id']);
		return $this->db->update('pet', $data);
		
	}
	
}

public function edit_data($id) {
	$this->db->select('id');
	$this->db->select('name');
	$this->db->select('species');
	$this->db->select('age');
	$this->db->select('row_status');
	$this->db->where('id', $id);

	$data = $this->db->get('pet');

	return ($data->num_rows() > 0) ? $data->result_array()[0] : [];
}

// public function delete_data($id){
// 	$this->db->where("id", $id);
// 	$this->db->delete("pet");
// 	return true;
// }

}
