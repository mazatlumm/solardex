<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login_m extends CI_Model
{

    public function login($data, $auth, $data_auth)
    {
        $cek_auth = $this->db->get_where('users_app', $data_auth)->result_array();
        if ($cek_auth) {
            //jika ditemukan maka tambah dengan user_id
            $user_id = $cek_auth[0]['user_id'];
            $this->db->where($data);
            $this->db->update('users_app', ['shared_key' => $auth . $user_id]);
        } else {
            $this->db->where($data);
            $this->db->update('users_app', ['shared_key' => $auth]);
        }
        return $this->db->get_where('users_app', $data)->result_array();
    }

    public function cek_key($shared_key)
    {
        return $this->db->get_where('users_app', ['shared_key' => $shared_key])->result_array();
    }
}
