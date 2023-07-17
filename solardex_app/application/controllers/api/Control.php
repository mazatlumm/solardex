<?php

defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Control extends RestController
{
    public function index_get()
    {
        $id_device = $this->get('id_device');
        $status = $this->get('status');
        $data_update = [
            'status' => $status,
            'updated' => date('Y-m-d H:i:s'),
        ];
        $this->db->where('id_device', $id_device);
        $this->db->update('control_device', $data_update);
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

    public function status_get()
    {
        $id_device = $this->get('id_device');
        $get_control_device = $this->db->get_where('control_device', ['id_device' => $id_device])->result_array();
        if ($get_control_device) {
            $this->response([
                'status' => true,
                'message' => 'success',
                'result' => $get_control_device,
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed',
                'result' => [],
            ], 404);
        }
    }

    public function device_get()
    {
        $get_battery = $this->db->get('battery')->result_array();
        if ($get_battery) {
            $this->response($get_battery, 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed'
            ], 404);
        }
    }

    public function reset_energy_get()
    {
        $id_device = $this->get('id_device');
        $reset = $this->get('reset');
        $data_update = [
            'reset' => $reset,
            'updated' => date('Y-m-d H:i:s'),
        ];
        $this->db->where('id_device', $id_device);
        $this->db->update('control_device', $data_update);
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
}
