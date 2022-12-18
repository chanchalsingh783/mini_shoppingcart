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
    if($this->db->insert_batch('orderdetails_tbl', $data)) {
      return true;
    }
    return false;
  }

  public function insert_item($data)
  {
    if($this->db->insert('order_tbl', $data)) {
      return $this->db->insert_id();
    }
    return false;
  }

  public function getAllproduct()
  {
    $query = $this->db->get('product_tbl');
    return $query->result();
  }

  public function update_data($id, $data)
	{
      $this->db->where('order_id',$id);
    	$this->db->update('order_tbl', $data); 
        if($this->db->affected_rows())
        {
        	return true;
        }
		return false;
	}
}