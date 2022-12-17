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
   public function getAllproduct()
   {
        $query = $this->db->get('product_tbl');
        return $query->result();
   }
}