<?php

defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class User extends RestController
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
    }

    public function register_post() // User Register
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $auth = substr(str_shuffle($permitted_chars), 0, 30);

        $email = $this->post('email');

        $data = [
            'nama' => $this->post('nama'),
            'email' => $email,
            'password' => md5($this->post('password')),
            'role' => $this->post('role'),
            'shared_key' => $auth,
            'activated' => 1,
        ];

        $cek = [
            'email' => $this->post('email'),
        ];

        $cek_user = $this->user_m->cek_email($cek);
        if ($cek_user) {
            $this->session->set_flashdata('register_gagal', '');
            redirect('auth/login');
        } else if (!$cek_user) {
            $user = $this->user_m->register($data);
            if ($user) {

                $config = [
                    'protocol'  => 'smtp',
                    //'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_host' => 'smtp.gmail.com',
                    'smtp_user' => 'bkknoreplay@gmail.com',
                    'smtp_pass' => '123SuksesSelalu',
                    'smtp_port' => '587',
                    'smtp_crypto' => 'tls',
                    'smtp_timeout' => '30',
                    'charset' => 'iso-8859-1',
                    'newline' => "\r\n",
                    'wordwrap' => TRUE,
                    'mailtype' => 'html'
                ];
                $mail_data['nama'] = $this->post('nama');
                $mail_data['password'] = $this->post('password');
                $mail_data['email'] = $this->post('email');
                $mail_data['auth'] = $auth;
                $messages = $this->load->view('email', $mail_data, true);

                $this->email->initialize($config);
                $this->email->from('bkknoreplay@gmail.com', 'Bursa Kerja Khusus SMKN 1 Purwoasri');
                $this->email->to($email);
                $this->email->subject('Informasi Akun Bursa Kerja Khusus SMKN 1 Purwoasri');
                $this->email->message($messages);

                if ($this->email->send()) {
                    $this->session->set_flashdata('register_berhasil', '');
                    redirect('auth/login');
                } else {
                    $this->session->set_flashdata('register_gagal', '');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('register_gagal', '');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('register_gagal', '');
            redirect('auth/login');
        }
    }

    public function login_post() // User Login
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $auth = substr(str_shuffle($permitted_chars), 0, 30);

        $username = $this->post('username');
        $password = $this->post('password');

        $data = [
            'username' => $username,
            'password' => md5($password),
            'activated' => '1',
        ];

        $data_auth = [
            'username' => $username,
            'shared_key' => $auth,
            'password' => md5($password),
        ];

        $login = $this->user_m->login($data, $auth, $data_auth);
        if ($login) {
            $id_user = $login[0]['id_user'];
            $shared_key = $login[0]['shared_key'];

            $params = array(
                'userid' => $id_user,
                'shared_key' => $shared_key
            );
            $this->session->set_userdata($params);
            //cek role
            $role = $this->fungsi->user_login()->role;
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('login_failed', '');
            redirect('auth/login');
        }
    }

    public function request_kode_otp_post()
    {
        $email = $this->post('email');
        //membuat kode otp
        $permitted_chars = '0123456789';
        $otp = substr(str_shuffle($permitted_chars), 0, 6);

        //cek keberadaan email
        $cek_email_reset = $this->db->get_where('users', ['email' => $email])->result_array();
        if ($cek_email_reset) {
            //identifikasi data pribadi pengguna
            $id_user = $cek_email_reset[0]['id_user'];
            //membuat time expired
            $created = date('Y-m-d H:i:s');
            $jam = date('H');
            $menit = date('i');
            $menit_tambahan = $menit + 5;
            if ($menit_tambahan > 59) {
                $jam_expired = $jam + 1;
                $menit_expired = $menit_tambahan - $menit;
                $expired = date('d-m-Y') . " " . $jam_expired . ":" . $menit_expired . ":" . date('s');
            } else {
                $jam_expired = $jam;
                $menit_expired = $menit_tambahan;
                $expired = date('d-m-Y') . " " . $jam_expired . ":" . $menit_expired . ":" . date('s');
            }
            $config = [
                'protocol'  => 'smtp',
                //'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_user' => 'bkknoreplay@gmail.com',
                'smtp_pass' => '123SuksesSelalu',
                'smtp_port' => '587',
                'smtp_crypto' => 'tls',
                'smtp_timeout' => '30',
                'charset' => 'iso-8859-1',
                'newline' => "\r\n",
                'wordwrap' => TRUE,
                'mailtype' => 'html'
            ];

            $this->email->initialize($config);
            $this->email->from('bkknoreplay@gmail.com', 'BKK SMKN 1 Purwoasri');
            $this->email->to($email);
            $this->email->subject('Reset Password BKK');
            $this->email->message("<p>Kode OTP anda adalah <b>$otp</b>. berlaku sampai dengan <b>$expired</b></p>");

            if ($this->email->send()) {
                $created = date('Y-m-d H:i:s');
                $jam = date('H');
                $menit = date('i');
                $menit_tambahan = $menit + 5;
                if ($menit_tambahan > 59) {
                    $jam_expired = $jam + 1;
                    $menit_expired = $menit_tambahan - $menit;
                    $expired = date('Y-m-d') . " " . $jam_expired . ":" . $menit_expired . ":" . date('s');
                } else {
                    $jam_expired = $jam;
                    $menit_expired = $menit_tambahan;
                    $expired = date('Y-m-d') . " " . $jam_expired . ":" . $menit_expired . ":" . date('s');
                }

                $data_otp = [
                    'id_user' => $id_user,
                    'kode' => $otp,
                    'created' => $created,
                    'expired' => $expired
                ];

                $simpan_kode_otp = $this->db->insert('kode_otp', $data_otp);
                if ($simpan_kode_otp) {
                    $this->session->set_flashdata('otp_success', 'Berhasil Membuat kode OTP');
                    $otp_direct['id_user'] = $id_user;
                    $this->load->view('lupa_password/form_otp', $otp_direct);
                } else {
                    $this->session->set_flashdata('otp_failed', 'Gagal Membuat kode OTP');
                    redirect('lupa_password');
                }
            } else {
                echo $this->email->print_debugger();
                die;
            }
        } else {
            $this->session->set_flashdata('email_not_found', 'Email Tidak Ditemukan');
            redirect('lupa_password');
        }
    }

    public function otp_cek_post()
    {
        $kode = $this->post('kode');
        $id_user = $this->post('id_user');

        $data_cek = [
            'id_user' => $id_user,
            'kode' => $kode,
            'expired >' => date('Y-m-d H:i:s')
        ];

        $data_cek_expired = [
            'kode' => $kode,
            'expired <' => date('Y-m-d H:i:s')
        ];

        $cek_kode = $this->db->get_where('kode_otp', $data_cek)->result_array(); // Cek keberadaan OTP berdasarkan id pelanggan dan waktu expired

        if ($cek_kode) {
            $this->session->set_flashdata('otp_match', 'Kode OTP sesuai');
            $reset_password_data['id_user'] = $id_user;
            $this->load->view('lupa_password/form_reset_password', $reset_password_data);
        } else {
            $cek_kode_expired_count = count($this->db->get_where('kode_otp', $data_cek_expired)->result_array());
            $cek_kode_expired = $this->db->get_where('kode_otp', $data_cek_expired)->result_array();
            if ($cek_kode_expired) {
                for ($i = 0; $i < $cek_kode_expired_count; $i++) {
                    $id = $cek_kode_expired[$i]['id'];
                    //hapus kode otp yang sudah expired
                    $this->db->where('id', $id);
                    $this->db->delete('kode_otp');
                }
            }
            $this->session->set_flashdata('otp_mismatch', 'OTP Tidak Ditemukan');
            $otp_direct['id_user'] = $id_user;
            $this->load->view('lupa_password/form_otp', $otp_direct);
        }
    }

    public function reset_password_final_post()
    {
        $id_user = $this->post('id_user');
        $password = md5($this->post('password'));

        //update password berdasarkan id_user
        $this->db->where('id_user', $id_user);
        $this->db->update('users', ['password' => $password]);
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('reset_success', 'Password Berhasil di Update');
            redirect('auth/login');
        } else {
            $this->session->set_flashdata('reset_failed', 'Password Berhasil di Update');
            $data['id_user'] = $id_user;
            $this->load->view('lupa_password/form_reset_password', $data);
        }
    }

    public function profile_post()
    {
        $id_user = $this->post('id_user');
        $username = $this->post('username');
        $nama = $this->post('nama');
        $email = $this->post('email');
        $kelamin = $this->post('kelamin');

        $data_update = [
            'username' => $username,
            'nama' => $nama,
            'email' => $email,
            'kelamin' => $kelamin,
        ];
        $this->db->where('id_user', $id_user);
        $this->db->update('users', $data_update);
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('update_profile_success', '');
            redirect('setting/profile');
        } else {
            $this->session->set_flashdata('update_profile_success', '');
            redirect('setting/profile');
        }
    }
}
