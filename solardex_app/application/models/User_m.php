<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

    public function login($data, $auth, $data_auth)
    {
        $cek_auth = $this->db->get_where('users', $data_auth)->result_array();
        if ($cek_auth) {
            //jika ditemukan maka tambah dengan user_id
            $user_id = $cek_auth[0]['user_id'];
            $this->db->where($data);
            $this->db->update('users', ['shared_key' => $auth . $user_id]);
        } else {
            $this->db->where($data);
            $this->db->update('users', ['shared_key' => $auth]);
        }
        return $this->db->get_where('users', $data)->result_array();
    }

    public function cek_key($shared_key)
    {
        return $this->db->get_where('users', ['shared_key' => $shared_key])->result_array();
    }

    public function get($id = null)
    {
        $this->db->from('users');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        $params['password'] = sha1($post['password']);
        $params['address'] = $post['address'] != "" ? $post['address'] : null;
        $params['level'] = $post['level'];
        $this->db->insert('user', $params);
    }

    public function edit($post)
    {
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        if (!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }
        $params['address'] = $post['address'] != "" ? $post['address'] : null;
        $params['level'] = $post['level'];
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }

    public function del($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }

    //register
    public function register($data)
    {
        return $this->db->insert('users', $data);
    }

    public function cek_email($cek)
    {
        return $this->db->get_where('users', $cek)->result_array();
    }

    public function activation($shared_key)
    {
        return $this->db->get_where('users', ['shared_key' => $shared_key])->result_array();
    }

    public function activating($shared_key)
    {
        $this->db->where('shared_key', $shared_key);
        $data = [
            'activated' => 1,
            'updated' => date("Y-m-d H:i:s")
        ];
        return $this->db->update('users', $data);
    }
}
