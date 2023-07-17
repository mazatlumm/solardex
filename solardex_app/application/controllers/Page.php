<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{

    public function iot_device()
    {
        check_not_login();
        $this->db->order_by('id', 'desc');
        $data['control_device'] = $this->db->get('control_device')->result();
        $this->template->load('template', 'page/iot_device', $data);
    }

    public function master_control()
    {
        check_not_login();
        $this->template->load('template', 'page/master_control');
    }

    public function battery_scanner()
    {
        check_not_login();
        $this->template->load('template', 'page/battery_scanner');
    }

    public function add_battery()
    {
        check_not_login();
        $data['get_battery'] = $this->db->get('battery')->result();
        $this->template->load('template', 'page/add_battery', $data);
    }
}
