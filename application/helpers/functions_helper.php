<?php if( !defined('BASEPATH')) exit('No direct script access allowed');

    // check auth function
    if (!function_exists('auth_check')) {
        
        function auth_check()
        {
            $ci =& get_instance();
            if (!$ci->session->has_userdata('is_login')) {
                redirect('/auth', 'refresh');
            }
        }
    }
?>