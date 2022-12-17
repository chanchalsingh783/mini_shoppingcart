<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Auth_model extends CI_Model
{
    private $table = "user_tbl";

    public function login($username, $password)
	{
        $this->db->where('email', $username);
        $this->db->or_where('mobile', $username);
		$query = $this->db->get($this->table);
        $data = array('error' => 'Invalid User Name or Password');
		
		if ($query->num_rows() > 0) 
		{
			foreach($query->result() as $row)
			{	
				if(password_verify($this->encrypt->decode($password), $row->password ))
				{	
					$data = array(
                        'id'  => $row->id,
                        'username' => $row->username,
                        'email' => $row->email,
                        'mobile' => $row->mobile,
						'is_login' => true
					);
		        	return $data; 
				} 
				else
				{
					return $data;				
				}
			}
		}
	}

    public function insert($data)
	{
		if($this->db->insert($this->table, $data)) {
			return true;
		}
		return false;
	}
}
?>