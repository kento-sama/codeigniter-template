<?php
    class TodoModel extends CI_Model{
        public function insertList($data){
            return $this->db->insert("todo",$data);
        }
        public function fetchTask(){
            $this->db->select("*");
            $result = $this->db->get("todo");
            return $result->result();
        }
    }