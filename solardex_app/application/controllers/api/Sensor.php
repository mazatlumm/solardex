<?php

defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Sensor extends RestController
{
    function __construct()
    {
        parent::__construct();
    }

    public function index_get()
    {
        $id_device =  $this->get('id_device');
        $tegangan =  $this->get('v');
        $arus =  $this->get('i');
        $daya =  $this->get('p');
        $energi =  $this->get('e');
        $lat =  $this->get('lat');
        $lon =  $this->get('lon');
        $reset_code =  $this->get('reset_code');

        $data = [
            'id_device' =>  $id_device,
            'tegangan' =>  $tegangan,
            'arus' =>  $arus,
            'daya' =>  $daya,
            'energi' =>  $energi,
            'latitude' => $lat,
            'longitude' => $lon,
        ];

        if ($id_device != null || $id_device != '') {
            $insert = $this->db->insert('sensor_device', $data);
            if ($insert) {
                //cek control_device 
                $get_control_device = $this->db->get_where('control_device', ['id_device' => $id_device])->result_array();
                if ($get_control_device) {
                    if ($reset_code == 200) {
                        $this->db->where('id_device', $id_device);
                        $this->db->update('control_device', ['reset_code' => $reset_code, 'reset' => 0]);
                    }
                    if ($reset_code == 404) {
                        $this->db->where('id_device', $id_device);
                        $this->db->update('control_device', ['reset_code' => $reset_code, 'reset' => 0]);
                    }
                    $status = $get_control_device[0]['status'];
                    $reset_dataCode = $get_control_device[0]['reset_code'];
                } else {
                    $this->db->insert('control_device', ['id_device' => $id_device, 'status' => 0, 'reset' => 0]);
                    $status = 0;
                }
                $Dataresponse = $id_device . "," . $status . "," . $reset_dataCode . ",";
                // print_r($Dataresponse);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'failed',
                    'id_device' => $id_device,
                    'relay' => 0,
                ], 404);
            }
        } else {
            $this->response([
                'status' => false,
                'message' => 'please insert id_device!',
            ], 404);
        }
    }

    public function read_get()
    {
        $id_device = $this->get('id_device');
        if ($id_device != null || $id_device != '') {
            $get_sensor_device = $this->db->get_where('sensor_device', ['id_device' => $id_device])->result_arraY();
            if ($get_sensor_device) {
                $this->response([
                    'status' => true,
                    'message' => 'success',
                    'result' => $get_sensor_device,
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'failed',
                    'result' => [],
                ], 404);
            }
        } else {
            $get_sensor_device = $this->db->get('sensor_device')->result_arraY();
            if ($get_sensor_device) {
                $this->response([
                    'status' => true,
                    'message' => 'success',
                    'result' => $get_sensor_device,
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'failed',
                    'result' => [],
                ], 404);
            }
        }
    }
}
