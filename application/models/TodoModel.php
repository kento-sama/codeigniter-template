<?php
    class TodoModel extends CI_Model{
        public function insertList($data){
            
            $this->load->database();
            //$this->db->insert("table_name",$data);
            return $this->db->insert("todo",$data);
        }
    }