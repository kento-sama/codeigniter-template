<?php
    class TodoModel extends CI_Model{
        public function insertList($data,$id){
            $this->db->where("todo_id",$id);
            $result = $this->db->update("todo",$data);
            return $result;
        }
        public function fetchTask($status){
            $this->db->select("*");
            // $this->db->where("row_status",$status);
            $result = $this->db->get("todo");
            $result = $this->db->get_where('todo', array('row_status' => $status), "", "");
            return $result->result_array();
            // return "test_model";
        }
        public function fetch_one_task($id){
            $this->db->select("*");
            $this->db->where("todo_id",$id);
            $result = $this->db->get("todo");
            //$result = $this->db->get_where('todo', array('todo_id' => $id));
            // var_dump($result->result_array());
            return $result->result_array()[0];
        }
    }