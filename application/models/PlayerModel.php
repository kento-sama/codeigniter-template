<?php
class PlayerModel extends CI_Model 
{
	
    function saverecords($post_data){
            $this->db->where('id', $post_data['id']);
            $result = $this->db->update("playertable",$post_data);
            return $result;
        // $this->db->insert('playertable', $post_data);
        // $insert_id = $this->db->insert_id();
     
        // return  $insert_id;
     }


     function updateRowStatus($id) {
        $this->db->where('id', $id);
        $result = $this->db->update("playertable", array('row_status' => 0));
        return $result;
    }

    public function get_players() {
        $this->db->select('*');
        $this->db->where('row_status', 1);
        $query = $this->db->get('playertable');
        return $query->result();
    }

    public function get_data($id)
    {   
        $this->db->select('id');
        $this->db->select('first_name');
        $this->db->select('last_name');
        $this->db->select('age');
        $this->db->select('row_status');
        $this->db->where('id', $id);
    
        $data = $this->db->get('playertable');
        //var_dump($data);
        return  $data->result_array()[0] ;
        
    }
    
    public function save_player($post_data = [])
    {
        if( ! empty($post_data))
        {
            $data['first_name'] = $post_data['first_name'];
            $data['last_name']  = $post_data['last_name'];
            $data['age']		= $post_data['age'];
    
            $this->db->where('id', $post_data['id']);
            $this->db->update('playertable', $data);
        }
    }

}