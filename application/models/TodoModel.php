<?php
    class TodoModel extends CI_Model{
        public function insertList($data){
            $this->load->database();
            return $this->db->insert("todo",$data);
        }
    }