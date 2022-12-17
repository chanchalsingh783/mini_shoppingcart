<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Product_model extends CI_Model
{
  public function insert($data)
  {
    if($this->db->insert('product_tbl', $data)) {
      return true;
    }
    return false;
  }
  
  public function insert_itemDetails($data)
  {
    if($this->db->insert('orderdetails_tbl', $data)) {
      return true;
    }
    return false;
  }

  public function insert_item($data)
  {
    if($this->db->insert('order_tbl', $data)) {
      return true;
    }
    return false;
  }

  public function getAllproduct()
  {
    $query = $this->db->get('product_tbl');
    return $query->result();
  }
}