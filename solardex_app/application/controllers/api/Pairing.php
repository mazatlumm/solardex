<?php

defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Pairing extends RestController
{
    public function index_get()
    {
        $id_device = $this->get('id_device');
        $battery_code = $this->get('battery_code');

        $data_cek = [
            'id_device' => $id_device,
            'code' => $battery_code,
        ];

        $get_battery = $this->db->get_where('battery', $data_cek)->result_array();
        if (count($get_battery) > 1) {
            $this->response([
                'status' => true,
                'message' => 'duplicate'
            ], 200);
            exit();
        }
        if (count($get_battery) == 1) {
            $this->response([
                'status' => true,
                'message' => 'paired'
            ], 200);
            exit();
        }
        if (count($get_battery) == 0) {
            //cek apakah kode baterai tersedia
            $get_battery_code = $this->db->get_where('battery', ['code' => $battery_code])->result_array();
            if (!$get_battery_code) {
                $this->response([
                    'status' => true,
                    'message' => 'battery code not found'
                ], 200);
                exit();
            }

            //cek apakah id device tersedia
            $get_control_device = $this->db->get_where('control_device', ['id_device' => $id_device])->result_array();
            if (!$get_control_device) {
                $this->response([
                    'status' => true,
                    'message' => 'id_device code not found'
                ], 200);
                exit();
            }

            if ($get_battery_code && $get_control_device) {

                //cek apakah ada id_device ini sebelumnya telah terhubung dengan baterai
                $get_battery_cek_device = $this->db->get_where('battery', ['code' => $battery_code, 'id_device !=' => null])->result_array();
                if ($get_battery_cek_device) {
                    $battery_code_cek = $get_battery_cek_device[0]['code'];
                    $id_device_cek = $get_battery_cek_device[0]['id_device'];
                    $this->response([
                        'status' => true,
                        'message' => 'duplicate',
                        'id_duplicate' => $id_device_cek,
                    ], 200);
                    exit();
                }

                $this->db->where('code', $battery_code);
                $this->db->update('battery', ['id_device' => $id_device, 'updated' => date('Y-m-d H:i:s')]);
                if ($this->db->affected_rows()) {
                    $this->response([
                        'status' => true,
                        'message' => 'pair'
                    ], 200);
                } else {
                    $this->response([
                        'status' => true,
                        'message' => 'failed'
                    ], 200);
                }
            }
        }
    }

    public function break_get()
    {
        $battery_code = $this->get('battery_code');
        $this->db->where('code', $battery_code);
        $this->db->update('battery', ['id_device' => null]);
        if ($this->db->affected_rows()) {
            $this->response([
                'status' => true,
                'message' => 'unpair'
            ], 200);
        } else {
            $this->response([
                'status' => true,
                'message' => 'failed'
            ], 200);
        }
    }

    public function status_get()
    {
        $id_device = $this->get('id_device');
        $get_battery = $this->db->get_where('battery', ['id_device' => $id_device])->result_array();
        if ($get_battery) {
            $this->response([
                'status' => true,
                'message' => 'success',
                'battery_code' => $get_battery[0]['code'],
            ], 200);
        } else {
            $this->response([
                'status' => true,
                'message' => 'success',
                'battery_code' => 'Not Pairing',
            ], 200);
        }
    }
}
