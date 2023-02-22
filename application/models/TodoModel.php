<?php
    class TodoModel extends CI_Model{
        public function insertList($data){
            return $this->db->insert("todo",$data);
        }
        public function fetchTask($status){
            $this->db->select("*");
            // $this->db->where("row_status",$status);
            $result = $this->db->get("todo");
            $result = $this->db->get_where('todo', array('row_status' => $status), "", "");
            return $result->result_array();
            // return "test_model";
        }
    }