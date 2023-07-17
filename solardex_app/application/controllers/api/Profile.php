<?php

defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Profile extends RestController
{
    function __construct()
    {
        parent::__construct();
    }

    public function photo_post()
    {
        $this->load->library('image_lib');

        $uploaddir = "./upload/user_foto/";
        $id_user = $this->fungsi->user_login()->id_user;
        if (isset($_FILES['file'])) {
            $nama_file = $_FILES['file']['name'];
            $explode = explode('.', $nama_file);
            if (!empty($explode)) {
                $count = count($explode);
                $array_index = $count - 1;
                $type = strtolower($explode[$array_index]);
            } else {
                $type = "Undefined";
            }
            $allowedfileExtensions = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array($type, $allowedfileExtensions)) {
                $ukuran_file = $_FILES['file']['size'] / 1000000;
                if ($ukuran_file <= 6) {
                    $nama_file_baru = "Profile-" . $id_user . md5(sha1(date('Y-m-d H:i:s') . $nama_file . $type)) . "." . $type;
                    $uploadfile = $uploaddir . "$nama_file_baru";
                    $upload = move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
                    if ($upload) {
                        //resize image
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './upload/user_foto/' . $nama_file_baru;
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = FALSE;
                        $config['quality'] = '100%';
                        $config['width'] = 128;
                        $config['height'] = 128;
                        $config['new_image'] = './upload/user_foto/' . $nama_file_baru;
                        $this->image_lib->clear();
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();

                        //cek nama file
                        $get_users = $this->db->get_where('users', ['id_user' => $id_user])->result_array();
                        if ($get_users) {
                            $profile_picture = $get_users[0]['profile_picture'];
                            if ($profile_picture != null || $profile_picture != '') {
                                unlink('./upload/user_foto/' . $profile_picture);
                            }
                        }
                        //update nama file ke database
                        $this->db->where('id_user', $id_user);
                        $this->db->update('users', ['profile_picture' => $nama_file_baru]);
                        if ($this->db->affected_rows()) {
                            $this->session->set_flashdata('berhasil_upload', '');
                            redirect('setting/profile');
                        } else {
                            $this->session->set_flashdata('gagal_upload', '');
                            redirect('setting/profile');
                        }
                    }
                } else {
                    $this->session->set_flashdata('gagal_upload', '');
                    redirect('setting/profile');
                }
            } else {
                $this->session->set_flashdata('gagal_upload', '');
                redirect('setting/profile');
            }
        } else {
            $this->session->set_flashdata('gagal_upload', '');
            redirect('setting/profile');
        }
    }

    public function perusahaan_post()
    {
        $this->load->library('image_lib');

        $uploaddir = "./upload/logo_perusahaan/";
        $id_user = $this->fungsi->user_login()->id_user;
        if (isset($_FILES['file'])) {
            $nama_file = $_FILES['file']['name'];
            $explode = explode('.', $nama_file);
            if (!empty($explode)) {
                $count = count($explode);
                $array_index = $count - 1;
                $type = strtolower($explode[$array_index]);
            } else {
                $type = "Undefined";
            }
            $allowedfileExtensions = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array($type, $allowedfileExtensions)) {
                $ukuran_file = $_FILES['file']['size'] / 1000000;
                if ($ukuran_file <= 6) {
                    $nama_file_baru = "Profile-" . $id_user . md5(sha1(date('Y-m-d H:i:s') . $nama_file . $type)) . "." . $type;
                    $uploadfile = $uploaddir . "$nama_file_baru";
                    $upload = move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
                    if ($upload) {
                        //resize image
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './upload/logo_perusahaan/' . $nama_file_baru;
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = FALSE;
                        $config['quality'] = '80%';
                        // $config['width'] = 500;
                        // $config['height'] = 500;
                        $config['new_image'] = './upload/logo_perusahaan/' . $nama_file_baru;
                        $this->image_lib->clear();
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();

                        //cek nama file
                        $get_data_perusahaan = $this->db->get_where('data_perusahaan', ['id_user' => $id_user])->result_array();
                        if ($get_data_perusahaan) {
                            $logo = $get_data_perusahaan[0]['logo'];
                            if ($logo != null || $logo != '') {
                                unlink('./upload/logo_perusahaan/' . $logo);
                            }
                        }
                        //update nama file ke database
                        $this->db->where('id_user', $id_user);
                        $this->db->update('data_perusahaan', ['logo' => $nama_file_baru]);
                        if ($this->db->affected_rows()) {
                            $this->session->set_flashdata('berhasil_upload', '');
                            redirect('profile_perusahaan');
                        } else {
                            $this->session->set_flashdata('gagal_upload', '');
                            redirect('profile_perusahaan');
                        }
                    }
                } else {
                    $this->session->set_flashdata('gagal_upload', '');
                    redirect('profile_perusahaan');
                }
            } else {
                $this->session->set_flashdata('gagal_upload', '');
                redirect('profile_perusahaan');
            }
        } else {
            $this->session->set_flashdata('gagal_upload', '');
            redirect('profile_perusahaan');
        }
    }

    public function doc_perusahaan_post()
    {
        $uploaddir = "./upload/doc_perusahaan/";
        $id_user = $this->fungsi->user_login()->id_user;
        if (isset($_FILES['file'])) {
            $nama_file = $_FILES['file']['name'];
            $explode = explode('.', $nama_file);
            if (!empty($explode)) {
                $count = count($explode);
                $array_index = $count - 1;
                $type = strtolower($explode[$array_index]);
            } else {
                $type = "Undefined";
            }
            $allowedfileExtensions = array('jpg', 'png', 'jpeg', 'pdf');
            if (in_array($type, $allowedfileExtensions)) {
                $ukuran_file = $_FILES['file']['size'] / 1000000;
                if ($ukuran_file <= 6) {
                    $nama_file_baru = "Doc-" . $id_user . md5(sha1(date('Y-m-d H:i:s') . $nama_file . $type)) . "." . $type;
                    $uploadfile = $uploaddir . "$nama_file_baru";
                    $upload = move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
                    if ($upload) {
                        //cek nama file
                        $get_data_perusahaan = $this->db->get_where('data_perusahaan', ['id_user' => $id_user])->result_array();
                        if ($get_data_perusahaan) {
                            $doc_perusahaan = $get_data_perusahaan[0]['doc_perusahaan'];
                            if ($doc_perusahaan != null || $doc_perusahaan != '') {
                                unlink('./upload/doc_perusahaan/' . $doc_perusahaan);
                            }
                        }
                        //update nama file ke database
                        $this->db->where('id_user', $id_user);
                        $this->db->update('data_perusahaan', ['doc_perusahaan' => $nama_file_baru]);
                        if ($this->db->affected_rows()) {
                            $this->session->set_flashdata('berhasil', '');
                            redirect('profile_perusahaan');
                        } else {
                            $this->session->set_flashdata('gagal', '');
                            redirect('profile_perusahaan');
                        }
                    }
                } else {
                    $this->session->set_flashdata('gagal', '');
                    redirect('profile_perusahaan');
                }
            } else {
                $this->session->set_flashdata('gagal', '');
                redirect('profile_perusahaan');
            }
        } else {
            $this->session->set_flashdata('gagal', '');
            redirect('profile_perusahaan');
        }
    }

    public function portofolio_post()
    {
        $uploaddir = "./upload/portofolio/";
        $id_user = $this->fungsi->user_login()->id_user;
        if (isset($_FILES['file'])) {
            $nama_file = $_FILES['file']['name'];
            $explode = explode('.', $nama_file);
            if (!empty($explode)) {
                $count = count($explode);
                $array_index = $count - 1;
                $type = strtolower($explode[$array_index]);
            } else {
                $type = "Undefined";
            }
            $allowedfileExtensions = array('jpg', 'png', 'jpeg', 'pdf');
            if (in_array($type, $allowedfileExtensions)) {
                $ukuran_file = $_FILES['file']['size'] / 1000000;
                if ($ukuran_file <= 6) {
                    $nama_file_baru = "Doc-" . $id_user . md5(sha1(date('Y-m-d H:i:s') . $nama_file . $type)) . "." . $type;
                    $uploadfile = $uploaddir . "$nama_file_baru";
                    $upload = move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
                    if ($upload) {
                        //cek nama file
                        $get_data_pribadi = $this->db->get_where('data_pribadi', ['id_user' => $id_user])->result_array();
                        if ($get_data_pribadi) {
                            $portofolio = $get_data_pribadi[0]['portofolio'];
                            if ($portofolio != null || $portofolio != '') {
                                unlink('./upload/portofolio/' . $portofolio);
                            }
                        }
                        //update nama file ke database
                        $this->db->where('id_user', $id_user);
                        $this->db->update('data_pribadi', ['portofolio' => $nama_file_baru]);
                        if ($this->db->affected_rows()) {
                            $this->session->set_flashdata('berhasil', '');
                            redirect('portofolio');
                        } else {
                            $this->session->set_flashdata('gagal', '');
                            redirect('portofolio');
                        }
                    }
                } else {
                    $this->session->set_flashdata('gagal', '');
                    redirect('portofolio');
                }
            } else {
                $this->session->set_flashdata('gagal', '');
                redirect('portofolio');
            }
        } else {
            $this->session->set_flashdata('gagal', '');
            redirect('portofolio');
        }
    }

    public function spesialisasi_pk_post()
    {
        $id_user = $this->fungsi->user_login()->id_user;
        $id_spesialisasi = $this->post('jenis_spesialisasi');

        $data = [
            'id_user' => $id_user,
            'id_spesialisasi' => $id_spesialisasi,
        ];

        $get_spesialisasi_pk = $this->db->get_where('spesialisasi_pk', ['id_spesialisasi' => $id_spesialisasi, 'id_user' => $id_user])->result_array();
        if ($get_spesialisasi_pk) {
            $this->session->set_flashdata('berhasil', '');
            redirect('portofolio');
        } else {
            $insert = $this->db->insert('spesialisasi_pk', $data);
            if ($insert) {
                $this->session->set_flashdata('berhasil', '');
                redirect('portofolio');
            } else {
                $this->session->set_flashdata('gagal', '');
                redirect('portofolio');
            }
        }
    }

    public function hapus_spesialisasi_pk_get()
    {
        $id = $this->get('id');
        $this->db->where('id', $id);
        $this->db->delete('spesialisasi_pk');
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('berhasil', '');
            redirect('portofolio');
        } else {
            $this->session->set_flashdata('gagal', '');
            redirect('portofolio');
        }
    }

    public function spesialisasi_perusahaan_post()
    {
        $id_user_perusahaan = $this->fungsi->user_login()->id_user;
        $id_spesialisasi = $this->post('jenis_spesialisasi');

        $data = [
            'id_user_perusahaan' => $id_user_perusahaan,
            'id_spesialisasi' => $id_spesialisasi,
        ];

        $get_spesialisasi_perusahaan = $this->db->get_where('spesialisasi_perusahaan', ['id_spesialisasi' => $id_spesialisasi, 'id_user_perusahaan' => $id_user_perusahaan])->result_array();
        if ($get_spesialisasi_perusahaan) {
            $this->session->set_flashdata('berhasil', '');
            redirect('profile_perusahaan');
        } else {
            $insert = $this->db->insert('spesialisasi_perusahaan', $data);
            if ($insert) {
                $this->session->set_flashdata('berhasil', '');
                redirect('profile_perusahaan');
            } else {
                $this->session->set_flashdata('gagal', '');
                redirect('profile_perusahaan');
            }
        }
    }

    public function hapus_spesialisasi_perusahaan_get()
    {
        $id = $this->get('id');
        $this->db->where('id', $id);
        $this->db->delete('spesialisasi_perusahaan');
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('berhasil', '');
            redirect('profile_perusahaan');
        } else {
            $this->session->set_flashdata('gagal', '');
            redirect('profile_perusahaan');
        }
    }

    public function status_karir_post()
    {
        $id_user = $this->fungsi->user_login()->id_user;
        $status = $this->post('status');
        $get_status_karir = $this->db->get_where('status_karir', ['id_user' => $id_user])->result_array();
        if ($get_status_karir) {
            $this->db->where('id_user', $id_user);
            $this->db->update('status_karir', ['status' => $status]);
            if ($this->db->affected_rows()) {
                $this->session->set_flashdata('berhasil', '');
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('gagal', '');
                redirect('dashboard');
            }
        } else {
            $insert = $this->db->insert('status_karir', ['id_user' => $id_user, 'status' => $status]);
            if ($insert) {
                $this->session->set_flashdata('berhasil', '');
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('gagal', '');
                redirect('dashboard');
            }
        }
    }

    public function status_karir_setting_post()
    {
        $id_user = $this->fungsi->user_login()->id_user;
        $status = $this->post('status');
        $get_status_karir = $this->db->get_where('status_karir', ['id_user' => $id_user])->result_array();
        if ($get_status_karir) {
            $this->db->where('id_user', $id_user);
            $this->db->update('status_karir', ['status' => $status]);
            if ($this->db->affected_rows()) {
                $this->session->set_flashdata('berhasil', '');
                redirect('setting');
            } else {
                $this->session->set_flashdata('gagal', '');
                redirect('setting');
            }
        } else {
            $insert = $this->db->insert('status_karir', ['id_user' => $id_user, 'status' => $status]);
            if ($insert) {
                $this->session->set_flashdata('berhasil', '');
                redirect('setting');
            } else {
                $this->session->set_flashdata('gagal', '');
                redirect('setting');
            }
        }
    }

    public function sk_siswa_post()
    {
        $id_user = $this->fungsi->user_login()->id_user;
        $id_status_karir = $this->post('id_status_karir');
        $nisn = $this->post('nisn');

        $data = [
            'id_user' => $id_user,
            'nisn' => $nisn,
            'id_status_karir' => $id_status_karir,
            'updated' => date('Y-m-d H:i:s')
        ];

        $get_sk_siswa = $this->db->get_where('sk_siswa', ['id_user' => $id_user])->result_array();
        if ($get_sk_siswa) {
            $this->db->where('id_user', $id_user);
            $this->db->update('sk_siswa', $data);
            if ($this->db->affected_rows()) {
                $this->session->set_flashdata('berhasil', '');
                redirect('setting');
            } else {
                $this->session->set_flashdata('gagal', '');
                redirect('setting');
            }
        } else {
            $insert = $this->db->insert('sk_siswa', $data);
            if ($insert) {
                $this->session->set_flashdata('berhasil', '');
                redirect('setting');
            } else {
                $this->session->set_flashdata('gagal', '');
                redirect('setting');
            }
        }
    }

    public function sk_mahasiswa_post()
    {
        $id_user = $this->fungsi->user_login()->id_user;
        $id_status_karir = $this->post('id_status_karir');
        $nim = $this->post('nim');
        $perguruan_tinggi = $this->post('perguruan_tinggi');
        $fakultas = $this->post('fakultas');
        $jurusan = $this->post('jurusan');

        $data = [
            'id_user' => $id_user,
            'id_status_karir' => $id_status_karir,
            'nim' => $nim,
            'perguruan_tinggi' => $perguruan_tinggi,
            'fakultas' => $fakultas,
            'jurusan' => $jurusan,
            'updated' => date('Y-m-d H:i:s')
        ];

        $get_sk_mahasiswa = $this->db->get_where('sk_mahasiswa', ['id_user' => $id_user])->result_array();
        if ($get_sk_mahasiswa) {
            $this->db->where('id_user', $id_user);
            $this->db->update('sk_mahasiswa', $data);
            if ($this->db->affected_rows()) {
                $this->session->set_flashdata('berhasil', '');
                redirect('setting');
            } else {
                $this->session->set_flashdata('gagal', '');
                redirect('setting');
            }
        } else {
            $insert = $this->db->insert('sk_mahasiswa', $data);
            if ($insert) {
                $this->session->set_flashdata('berhasil', '');
                redirect('setting');
            } else {
                $this->session->set_flashdata('gagal', '');
                redirect('setting');
            }
        }
    }

    public function sk_pegawai_post()
    {
        $id_user = $this->fungsi->user_login()->id_user;
        $id_status_karir = $this->post('id_status_karir');
        $nip = $this->post('nip');
        $nama_perusahaan = $this->post('nama_perusahaan');
        $alamat_perusahaan = $this->post('alamat_perusahaan');
        $jabatan = $this->post('jabatan');
        $job_role = $this->post('job_role');

        $data = [
            'id_user' => $id_user,
            'id_status_karir' => $id_status_karir,
            'nip' => $nip,
            'nama_perusahaan' => $nama_perusahaan,
            'alamat_perusahaan' => $alamat_perusahaan,
            'jabatan' => $jabatan,
            'job_role' => $job_role,
            'updated' => date('Y-m-d H:i:s')
        ];

        $get_sk_pegawai = $this->db->get_where('sk_pegawai', ['id_user' => $id_user])->result_array();
        if ($get_sk_pegawai) {
            $this->db->where('id_user', $id_user);
            $this->db->update('sk_pegawai', $data);
            if ($this->db->affected_rows()) {
                $this->session->set_flashdata('berhasil', '');
                redirect('setting');
            } else {
                $this->session->set_flashdata('gagal', '');
                redirect('setting');
            }
        } else {
            $insert = $this->db->insert('sk_pegawai', $data);
            if ($insert) {
                $this->session->set_flashdata('berhasil', '');
                redirect('setting');
            } else {
                $this->session->set_flashdata('gagal', '');
                redirect('setting');
            }
        }
    }

    public function sk_pengusaha_post()
    {
        $id_user = $this->fungsi->user_login()->id_user;
        $id_status_karir = $this->post('id_status_karir');
        $nama_usaha = $this->post('nama_usaha');
        $bidang_usaha = $this->post('bidang_usaha');
        $alamat_usaha = $this->post('alamat_usaha');

        $data = [
            'id_user' => $id_user,
            'id_status_karir' => $id_status_karir,
            'nama_usaha' => $nama_usaha,
            'bidang_usaha' => $bidang_usaha,
            'alamat_usaha' => $alamat_usaha,
            'updated' => date('Y-m-d H:i:s')
        ];

        $get_sk_pengusaha = $this->db->get_where('sk_pengusaha', ['id_user' => $id_user])->result_array();
        if ($get_sk_pengusaha) {
            $this->db->where('id_user', $id_user);
            $this->db->update('sk_pengusaha', $data);
            if ($this->db->affected_rows()) {
                $this->session->set_flashdata('berhasil', '');
                redirect('setting');
            } else {
                $this->session->set_flashdata('gagal', '');
                redirect('setting');
            }
        } else {
            $insert = $this->db->insert('sk_pengusaha', $data);
            if ($insert) {
                $this->session->set_flashdata('berhasil', '');
                redirect('setting');
            } else {
                $this->session->set_flashdata('gagal', '');
                redirect('setting');
            }
        }
    }

    public function sk_pencari_kerja_post()
    {
        $id_user = $this->fungsi->user_login()->id_user;
        $id_status_karir = $this->post('id_status_karir');
        $gaji = $this->post('gaji');

        $data = [
            'id_user' => $id_user,
            'id_status_karir' => $id_status_karir,
            'gaji' => $gaji,
            'updated' => date('Y-m-d H:i:s')
        ];

        $get_sk_pencari_kerja = $this->db->get_where('sk_pencari_kerja', ['id_user' => $id_user])->result_array();
        if ($get_sk_pencari_kerja) {
            $this->db->where('id_user', $id_user);
            $this->db->update('sk_pencari_kerja', $data);
            if ($this->db->affected_rows()) {
                $this->session->set_flashdata('berhasil', '');
                redirect('setting');
            } else {
                $this->session->set_flashdata('gagal', '');
                redirect('setting');
            }
        } else {
            $insert = $this->db->insert('sk_pencari_kerja', $data);
            if ($insert) {
                $this->session->set_flashdata('berhasil', '');
                redirect('setting');
            } else {
                $this->session->set_flashdata('gagal', '');
                redirect('setting');
            }
        }
    }
}
