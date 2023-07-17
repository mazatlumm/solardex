<?php

defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Battery extends RestController
{
    function __construct()
    {
        parent::__construct();
    }

    public function add_post()
    {
        $code =  $this->post('code');
        $lowest_voltage =  $this->post('lowest_voltage');
        $highest_voltage =  $this->post('highest_voltage');
        $capacity =  $this->post('capacity');

        $data = [
            'code' => $code,
            'lowest_voltage' => $lowest_voltage,
            'highest_voltage' => $highest_voltage,
            'capacity' => $capacity,
        ];

        //cek Code
        $get_battery = $this->db->get_where('battery', ['code' => $code])->result_array();
        if ($get_battery) {
            $this->session->set_flashdata('duplicate_battery_code', '');
            redirect('page/add_battery');
        } else {
            $add_battery = $this->db->insert('battery', $data);
            if ($add_battery) {
                $this->session->set_flashdata('battery_added_success', '');
                redirect('page/add_battery');
            } else {
                $this->session->set_flashdata('battery_added_failed', '');
                redirect('page/add_battery');
            }
        }
    }

    public function edit_post()
    {
        $id_battery =  $this->post('id_battery');
        $code =  $this->post('code');
        $lowest_voltage =  $this->post('lowest_voltage');
        $highest_voltage =  $this->post('highest_voltage');
        $capacity =  $this->post('capacity');

        $data = [
            'code' => $code,
            'lowest_voltage' => $lowest_voltage,
            'highest_voltage' => $highest_voltage,
            'capacity' => $capacity,
            'updated' => date('Y-m-d H:i:s'),
        ];

        //cek Code
        $this->db->where('id_battery', $id_battery);
        $this->db->update('battery', $data);
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('battery_edit_success', '');
            redirect('page/add_battery');
        } else {
            $this->session->set_flashdata('battery_edit_failed', '');
            redirect('page/add_battery');
        }
    }

    public function delete_get()
    {
        $id_battery = $this->get('id_battery');

        $this->db->where('id_battery', $id_battery);
        $this->db->delete('battery');

        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('battery_delete_success', '');
            redirect('page/add_battery');
        } else {
            $this->session->set_flashdata('battery_delete_failed', '');
            redirect('page/add_battery');
        }
    }

    public function information_get()
    {
        $id_device = $this->get('id_device');
        $this->db->order_by('id', 'desc');
        $this->db->limit('1');
        $get_sensor_device = $this->db->get_where('sensor_device', ['id_device' => $id_device])->result_array();

        $get_sensor_device_record = $this->db->get_where('sensor_device', ['id_device' => $id_device])->result_array();
        $get_control_device = $this->db->get_where('control_device', ['id_device' => $id_device])->result_array();
        if ($get_control_device) {
            $status_control = $get_control_device[0]['status'];
        } else {
            $status_control = 0;
        }
        if ($get_sensor_device) {
            $this->response([
                'status' => true,
                'message' => 'success',
                'result' => $get_sensor_device,
                'total_record' => count($get_sensor_device_record),
                'last_update' => date('Y-m-d H:i', strtotime($get_sensor_device[0]['created'])),
                'load' => $status_control,
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed',
            ], 200);
        }
    }

    public function production_energy_get()
    {
        //get last time update
        $this->db->order_by('id', 'desc');
        $get_sensor_device = $this->db->get('sensor_device')->result_array();
        if ($get_sensor_device) {
            $last_update1 = date('Y-m-d', strtotime($get_sensor_device[0]['created']));
            $last_update2 = date('Y-m-d', strtotime("-1 day", strtotime($last_update1)));
            $last_update3 = date('Y-m-d', strtotime("-2 day", strtotime($last_update1)));
            $last_update4 = date('Y-m-d', strtotime("-3 day", strtotime($last_update1)));
            $last_update5 = date('Y-m-d', strtotime("-4 day", strtotime($last_update1)));
            $last_update6 = date('Y-m-d', strtotime("-5 day", strtotime($last_update1)));
            $last_update7 = date('Y-m-d', strtotime("-6 day", strtotime($last_update1)));
            $total_consumptionc1 = 0;
            $total_consumptionc2 = 0;
            $total_consumptionc3 = 0;
            $total_consumptionc4 = 0;
            $total_consumptionc5 = 0;
            $total_consumptionc6 = 0;
            $total_consumptionc7 = 0;
            $total_production1 = 0;
            $total_production2 = 0;
            $total_production3 = 0;
            $total_production4 = 0;
            $total_production5 = 0;
            $total_production6 = 0;
            $total_production7 = 0;
            $get_control_device = $this->db->get('control_device')->result_array();
            if ($get_control_device) {
                foreach ($get_control_device as $value) {
                    $id_device = $value['id_device'];
                    //Pencarian 1
                    $where1 = [
                        'id_device' => $id_device,
                        'created >=' => $last_update1,
                    ];
                    $this->db->order_by('id', 'desc');
                    $this->db->limit('1');
                    $get_sensor_device1 = $this->db->get_where('sensor_device', $where1)->result_array();
                    if ($get_sensor_device1) {
                        $tegangan1 = $get_sensor_device1[0]['tegangan'];
                        $energi1 = $get_sensor_device1[0]['daya'];
                        $get_battery1 = $this->db->get_where('battery', ['id_device' => $id_device])->result_array();
                        if ($get_battery1) {
                            $highest_voltage1 = $get_battery1[0]['highest_voltage'];
                            $lowest_voltage1 = $get_battery1[0]['lowest_voltage'];
                            $capacity1 = $get_battery1[0]['capacity'];
                        } else {
                            $highest_voltage1 = 0;
                            $lowest_voltage1 = 0;
                            $capacity1 = 0;
                        }
                        $battery_remaining1 = (100 * (($highest_voltage1 - $lowest_voltage1) - ($highest_voltage1 - $tegangan1))) / ($highest_voltage1 - $lowest_voltage1);
                        $power_remaining1 = (($capacity1 * $battery_remaining1) / 100) * $tegangan1;
                        $total_consumptionc1 += $energi1;
                        $total_production1 += $power_remaining1;
                    }

                    //Pencarian 2
                    $where2 = [
                        'id_device' => $id_device,
                        'created >=' => $last_update2,
                        'created <' => $last_update1,
                    ];
                    $this->db->order_by('id', 'desc');
                    $this->db->limit('1');
                    $get_sensor_device2 = $this->db->get_where('sensor_device', $where2)->result_array();
                    if ($get_sensor_device2) {
                        $tegangan2 = $get_sensor_device2[0]['tegangan'];
                        $energi2 = $get_sensor_device2[0]['daya'];
                        $get_battery2 = $this->db->get_where('battery', ['id_device' => $id_device])->result_array();
                        if ($get_battery2) {
                            $highest_voltage2 = $get_battery2[0]['highest_voltage'];
                            $lowest_voltage2 = $get_battery2[0]['lowest_voltage'];
                            $capacity2 = $get_battery2[0]['capacity'];
                        } else {
                            $highest_voltage2 = 0;
                            $lowest_voltage2 = 0;
                            $capacity2 = 0;
                        }
                        $battery_remaining2 = (100 * (($highest_voltage2 - $lowest_voltage2) - ($highest_voltage2 - $tegangan2))) / ($highest_voltage2 - $lowest_voltage2);
                        $power_remaining2 = (($capacity2 * $battery_remaining2) / 100) * $tegangan2;
                        $total_consumptionc2 += $energi2;
                        $total_production2 += $power_remaining2;
                    }

                    //Pencarian 3
                    $where3 = [
                        'id_device' => $id_device,
                        'created >=' => $last_update3,
                        'created <' => $last_update2,
                    ];
                    $this->db->order_by('id', 'desc');
                    $this->db->limit('1');
                    $get_sensor_device3 = $this->db->get_where('sensor_device', $where3)->result_array();
                    if ($get_sensor_device3) {
                        $tegangan3 = $get_sensor_device3[0]['tegangan'];
                        $energi3 = $get_sensor_device3[0]['daya'];
                        $get_battery3 = $this->db->get_where('battery', ['id_device' => $id_device])->result_array();
                        if ($get_battery3) {
                            $highest_voltage3 = $get_battery3[0]['highest_voltage'];
                            $lowest_voltage3 = $get_battery3[0]['lowest_voltage'];
                            $capacity3 = $get_battery3[0]['capacity'];
                        } else {
                            $highest_voltage3 = 0;
                            $lowest_voltage3 = 0;
                            $capacity3 = 0;
                        }
                        $battery_remaining3 = (100 * (($highest_voltage3 - $lowest_voltage3) - ($highest_voltage3 - $tegangan3))) / ($highest_voltage3 - $lowest_voltage3);
                        $power_remaining3 = (($capacity3 * $battery_remaining3) / 100) * $tegangan3;
                        $total_consumptionc3 += $energi3;
                        $total_production3 += $power_remaining3;
                    }

                    //Pencarian 4
                    $where4 = [
                        'id_device' => $id_device,
                        'created >=' => $last_update4,
                        'created <' => $last_update3,
                    ];
                    $this->db->order_by('id', 'desc');
                    $this->db->limit('1');
                    $get_sensor_device4 = $this->db->get_where('sensor_device', $where4)->result_array();
                    if ($get_sensor_device4) {
                        $tegangan4 = $get_sensor_device4[0]['tegangan'];
                        $energi4 = $get_sensor_device4[0]['daya'];
                        $get_battery4 = $this->db->get_where('battery', ['id_device' => $id_device])->result_array();
                        if ($get_battery4) {
                            $highest_voltage4 = $get_battery4[0]['highest_voltage'];
                            $lowest_voltage4 = $get_battery4[0]['lowest_voltage'];
                            $capacity4 = $get_battery4[0]['capacity'];
                        } else {
                            $highest_voltage4 = 0;
                            $lowest_voltage4 = 0;
                            $capacity4 = 0;
                        }
                        $battery_remaining4 = (100 * (($highest_voltage4 - $lowest_voltage4) - ($highest_voltage4 - $tegangan4))) / ($highest_voltage4 - $lowest_voltage4);
                        $power_remaining4 = (($capacity4 * $battery_remaining4) / 100) * $tegangan4;
                        $total_consumptionc4 += $energi4;
                        $total_production4 += $power_remaining4;
                    }

                    //Pencarian 5
                    $where5 = [
                        'id_device' => $id_device,
                        'created >=' => $last_update5,
                        'created <' => $last_update4,
                    ];
                    $this->db->order_by('id', 'desc');
                    $this->db->limit('1');
                    $get_sensor_device5 = $this->db->get_where('sensor_device', $where5)->result_array();
                    if ($get_sensor_device5) {
                        $tegangan5 = $get_sensor_device5[0]['tegangan'];
                        $energi5 = $get_sensor_device5[0]['daya'];
                        $get_battery5 = $this->db->get_where('battery', ['id_device' => $id_device])->result_array();
                        if ($get_battery5) {
                            $highest_voltage5 = $get_battery5[0]['highest_voltage'];
                            $lowest_voltage5 = $get_battery5[0]['lowest_voltage'];
                            $capacity5 = $get_battery5[0]['capacity'];
                        } else {
                            $highest_voltage5 = 0;
                            $lowest_voltage5 = 0;
                            $capacity5 = 0;
                        }
                        $battery_remaining5 = (100 * (($highest_voltage5 - $lowest_voltage5) - ($highest_voltage5 - $tegangan5))) / ($highest_voltage5 - $lowest_voltage5);
                        $power_remaining5 = (($capacity5 * $battery_remaining5) / 100) * $tegangan5;
                        $total_consumptionc5 += $energi5;
                        $total_production5 += $power_remaining5;
                    }

                    //Pencarian 6
                    $where6 = [
                        'id_device' => $id_device,
                        'created >=' => $last_update6,
                        'created <' => $last_update5,
                    ];
                    $this->db->order_by('id', 'desc');
                    $this->db->limit('1');
                    $get_sensor_device6 = $this->db->get_where('sensor_device', $where6)->result_array();
                    if ($get_sensor_device6) {
                        $tegangan6 = $get_sensor_device6[0]['tegangan'];
                        $energi6 = $get_sensor_device6[0]['daya'];
                        $get_battery6 = $this->db->get_where('battery', ['id_device' => $id_device])->result_array();
                        if ($get_battery6) {
                            $highest_voltage6 = $get_battery6[0]['highest_voltage'];
                            $lowest_voltage6 = $get_battery6[0]['lowest_voltage'];
                            $capacity6 = $get_battery6[0]['capacity'];
                        } else {
                            $highest_voltage6 = 0;
                            $lowest_voltage6 = 0;
                            $capacity6 = 0;
                        }
                        $battery_remaining6 = (100 * (($highest_voltage6 - $lowest_voltage6) - ($highest_voltage6 - $tegangan6))) / ($highest_voltage6 - $lowest_voltage6);
                        $power_remaining6 = (($capacity6 * $battery_remaining6) / 100) * $tegangan6;
                        $total_consumptionc6 += $energi6;
                        $total_production6 += $power_remaining6;
                    }

                    //Pencarian 7
                    $where7 = [
                        'id_device' => $id_device,
                        'created >=' => $last_update7,
                        'created <' => $last_update6,
                    ];
                    $this->db->order_by('id', 'desc');
                    $this->db->limit('1');
                    $get_sensor_device7 = $this->db->get_where('sensor_device', $where7)->result_array();
                    if ($get_sensor_device7) {
                        $tegangan7 = $get_sensor_device7[0]['tegangan'];
                        $energi7 = $get_sensor_device7[0]['daya'];
                        $get_battery7 = $this->db->get_where('battery', ['id_device' => $id_device])->result_array();
                        if ($get_battery7) {
                            $highest_voltage7 = $get_battery7[0]['highest_voltage'];
                            $lowest_voltage7 = $get_battery7[0]['lowest_voltage'];
                            $capacity7 = $get_battery7[0]['capacity'];
                        } else {
                            $highest_voltage7 = 0;
                            $lowest_voltage7 = 0;
                            $capacity7 = 0;
                        }
                        $battery_remaining7 = (100 * (($highest_voltage7 - $lowest_voltage7) - ($highest_voltage7 - $tegangan7))) / ($highest_voltage7 - $lowest_voltage7);
                        $power_remaining7 = (($capacity7 * $battery_remaining7) / 100) * $tegangan7;
                        $total_consumptionc7 += $energi7;
                        $total_production7 += $power_remaining7;
                    }
                }
            }
        }
        $this->response([
            'status' => true,
            'message' => 'success',
            'total_consumption' => [
                floor($total_consumptionc7 * 10) / 10,
                floor($total_consumptionc6 * 10) / 10,
                floor($total_consumptionc5 * 10) / 10,
                floor($total_consumptionc4 * 10) / 10,
                floor($total_consumptionc3 * 10) / 10,
                floor($total_consumptionc2 * 10) / 10,
                floor($total_consumptionc1 * 10) / 10,
            ],
            'total_production' => [
                floor($total_production7 * 10) / 10,
                floor($total_production6 * 10) / 10,
                floor($total_production5 * 10) / 10,
                floor($total_production4 * 10) / 10,
                floor($total_production3 * 10) / 10,
                floor($total_production2 * 10) / 10,
                floor($total_production1 * 10) / 10,
            ],
            'last_update' => [
                date('M d', strtotime($last_update7)),
                date('M d', strtotime($last_update6)),
                date('M d', strtotime($last_update5)),
                date('M d', strtotime($last_update4)),
                date('M d', strtotime($last_update3)),
                date('M d', strtotime($last_update2)),
                date('M d', strtotime($last_update1)),
            ],
        ], 200);
    }

    public function cek_data_get()
    {
        $get_sensor_device = $this->db->get_where('sensor_device', ['created >=' => '2021-09-29', 'created <' => '2021-09-30'])->result_array();
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
            ], 404);
        }
    }
}
