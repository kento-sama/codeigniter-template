<?php
    class TodoModel extends CI_Model{
        public function insertList($data){
            return $this->db->insert("todo",$data);
        }
        public function fetchTask(){
            $query = "select * from todo";
            $result = $this->db->query($query);
            return $result->result();
        }
    }