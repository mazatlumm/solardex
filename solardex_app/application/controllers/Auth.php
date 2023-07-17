<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function login()
    {
        check_already_login();
        $this->load->view('login');
    }

    public function logout()
    {
        $params = array('userid', 'level');
        $this->session->unset_userdata($params);
        redirect('auth/login');
    }

    public function user_list()
    {
        $data['get_users'] = $this->db->get('users')->result();
        $this->template->load('template', 'user/list', $data);
    }
}
