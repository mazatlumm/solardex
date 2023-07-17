<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{

    public function index()
    {
        check_not_login();
        $this->template->load('template', 'setting');
    }

    public function profile()
    {
        check_not_login();
        $id_user = $this->fungsi->user_login()->id_user;
        $users = $this->db->get_where('users', ['id_user' => $id_user])->result_array();
        if ($users) {
            $data['nama'] = $users[0]['nama'];
            $data['username'] = $users[0]['username'];
            $data['email'] = $users[0]['email'];
            $data['kelamin'] = $users[0]['kelamin'];
            $role = $users[0]['role'];
            if ($role == "Dudi") {
                $data['role'] = "Perusahaan";
            } else {
                $data['role'] = $users[0]['role'];
            }
        } else {
            $data['nama'] = null;
            $data['username'] = null;
            $data['email'] = null;
            $data['kelamin'] = null;
            $data['role'] = null;
        }
        $this->template->load('template', 'user/form_profile', $data);
    }

    public function device()
    {
        $this->template->load('template', 'page/setting_device');
    }
}
