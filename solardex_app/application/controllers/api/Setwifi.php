<?php

defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Setwifi extends RestController
{

    public function index_get()
    {
        $ssid = $this->get('ssid');
        $password = $this->get('password');
        $pesan = $this->get('pesan');
        if ($pesan != null) {
            $urlGo = "http://192.168.4.1/?pesan=" . $pesan;
        } else {
            $urlGo = "http://192.168.4.1/?ssid=" . $ssid . "&pass=" . $password;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlGo);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
    }
}
