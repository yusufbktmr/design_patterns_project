<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

use Application\Libraries\Api\ApiProvider;
use Application\Libraries\Api\ConvertProvider;
use Application\Libraries\Api\Logger;

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->model('db_model');
        $data['lastRate'] = $this->db_model->getLastRate();
        $this->load->view('index.php', $data);
    }
}
