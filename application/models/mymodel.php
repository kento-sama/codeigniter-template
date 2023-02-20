<?php

class mymodel extends CI_Model {

public function insert_data($data) {
    $this->db->insert('pet', $data);
}

}
