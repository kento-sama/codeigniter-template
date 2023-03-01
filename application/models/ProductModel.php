<?php
  class ProductModel extends CI_Model {
    function saverecords($data = []){
      if(!empty($data)) {
        $product_data['product_name'] = $data['product_name'];
        $product_data['product_price'] = $data['product_price'];
        $product_data['product_category'] = $data['product_category'];
        $product_data['row_status'] = 1;

        $this->db->where('id',$data['id']);
        return $this->db->update('products', $product_data);
      }
    }

    function updatestatus($data) {
      $product_data['row_status'] = 0;

      $this->db->where('id',$data['id']);
      return $this->db->update('products', $product_data);
    }

    function get_data($id) {
      $this->db->select('id');
      $this->db->select('product_name');
      $this->db->select('product_price');
      $this->db->select('product_category');
      $this->db->select('row_status');
      $this->db->where('id', $id);

      $data = $this->db->get('products');

      return ($data->num_rows() > 0) ? $data->result_array()[0] : [];
    }

    function getrecords(){
      $this->db->where('row_status','1');
      $query = $this->db->get('products');
      return $query->result();
    }


  }