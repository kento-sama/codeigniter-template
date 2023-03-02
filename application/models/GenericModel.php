<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class GenericModel extends CI_Model {
	public function __construct()
    {
        parent::__construct();
    }

    public function add_create_row($table = '', $column_name = '', $condition = [])
    {
    	if( ! empty($table) && ! empty($column_name) && ! empty($condition))
    	{
    		$this->db->select($column_name);
    		foreach ($condition as $key => $value) {
    			$this->db->where($key, $value);
    		}

    		$data = $this->db->get($table);

    		$data_id = ($data->num_rows() > 0)? $data->result_array()[0][$column_name] : NULL;

    		if ($data_id == NULL)
    		{
    			$this->db->insert($table, $condition);
    			$data_id = $this->db->insert_id();
    		}

    		return $data_id;
    	}
    }
}