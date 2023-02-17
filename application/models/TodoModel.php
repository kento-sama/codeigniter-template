<?php
    class TodoModel extends CI_Model{
        public function insertList($data){
            return $this->db->insert("todo",$data);
        }
        public function fetchTask(){
            $this->db->select("*");
            $this->db->from("todo");
            $result = $this->db->get();
            return $result->result();
        }
    }