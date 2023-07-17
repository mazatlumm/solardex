<?php

defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class User extends RestController
{

    public function index_get($id_user = null)
    {
        if ($id_user == null) {
            $this->db->order_by('id_user', 'desc');
            $get_user = $this->db->get('user')->result_array();
            if ($get_user) {
                $this->response([
                    'status' => true,
                    'message' => 'success',
                    'result' => $get_user
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'failed',
                    'result' => []
                ], 404);
            }
        } else {
            $get_user = $this->db->get_where('user', ['id_user' => $id_user])->result_array();
            if ($get_user) {
                $this->response([
                    'status' => true,
                    'message' => 'success',
                    'result' => $get_user
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'failed',
                    'result' => []
                ], 404);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'nama' => $this->post('nama'),
            'alamat' => $this->post('alamat'),
        ];
        $insertUser = $this->db->insert('user', $data);
        if ($insertUser) {
            $this->response([
                'status' => true,
                'message' => 'success',
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed',
            ], 404);
        }
    }

    public function index_put()
    {
        $data = [
            'nama' => $this->put('nama'),
            'alamat' => $this->put('alamat'),
        ];
        $id_user = $this->put('id_user');
        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);
        if ($this->db->affected_rows()) {
            $this->response([
                'status' => true,
                'message' => 'success',
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed',
            ], 404);
        }
    }

    public function index_delete()
    {
        $id_user = $this->delete('id_user');
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
        if ($this->db->affected_rows()) {
            $this->response([
                'status' => true,
                'message' => 'success',
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed',
                'id_user' => $id_user,
            ], 404);
        }
    }

    public function add_post()
    {
        $nama = $this->post('nama');
        $username = $this->post('username');
        $email = $this->post('email');
        $password = $this->post('password');
        $role = $this->post('role');

        $data = [
            'nama' => $nama,
            'username' => $username,
            'email' => $email,
            'password' => md5($password),
            'role' => $role,
            'activated' => 1,
        ];

        $where = [
            'username' => $username
        ];

        $get_users = $this->db->get_where('users', $where)->result_array();
        if ($get_users) {
            $this->session->set_flashdata('gagal', '');
            redirect('auth/user_list');
        } else {
            $this->db->insert('users', $data);
            $this->session->set_flashdata('berhasil', '');
            redirect('auth/user_list');
        }
    }

    public function edit_post()
    {
        $id_user = $this->post('id_user');
        $nama = $this->post('nama');
        $username = $this->post('username');
        $email = $this->post('email');
        $password = $this->post('password');
        $role = $this->post('role');

        if ($password != null || $password != '') {
            $data = [
                'nama' => $nama,
                'username' => $username,
                'email' => $email,
                'password' => md5($password),
                'role' => $role,
                'updated' => date('Y-m-d H:i:s'),
            ];
        } else {
            $data = [
                'nama' => $nama,
                'username' => $username,
                'email' => $email,
                'role' => $role,
                'updated' => date('Y-m-d H:i:s'),
            ];
        }

        $this->db->where('id_user', $id_user);
        $this->db->update('users', $data);

        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('berhasil', '');
            redirect('auth/user_list');
        } else {
            $this->session->set_flashdata('gagal', '');
            redirect('auth/user_list');
        }
    }

    public function hapus_get()
    {
        $id_user = $this->get('id_user');
        $this->db->where('id_user', $id_user);
        $this->db->delete('users');
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('berhasil_hapus_user', '');
            redirect('auth/user_list');
        } else {
            $this->session->set_flashdata('gagal_hapus_user', '');
            redirect('auth/user_list');
        }
    }
}
