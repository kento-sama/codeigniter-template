<?php
  class ProductModel extends CI_Model {
    function saverecords($data){
      $this->db->insert('products', $data);
      return true;
    }
  }