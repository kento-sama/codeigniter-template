<?php
    class TodoModel extends CI_Model{
        public function insertList($data){
            return $this->db->insert("todo",$data);
        }
    }