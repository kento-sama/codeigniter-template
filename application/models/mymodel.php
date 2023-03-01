<?php

class MyModel extends CI_Model {

public function insert_data($data) {
    $this->db->insert('pet', $data);
}

public function get_data() {
    $query = $this->db->get('pet');
    return $query->result_array();

    // $this->db->select();
}

}
