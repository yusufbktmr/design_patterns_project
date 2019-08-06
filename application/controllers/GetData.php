<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (PHP_SAPI !== 'cli') {
    exit('No web access allowed');
}

use Application\Libraries\Api\ApiProvider;
use Application\Libraries\Api\ConvertProvider;
use Application\Libraries\Api\Logger;

class GetData extends CI_Controller
{
    public function index()
    {
        $this->load->model('db_model');

        $log = new Logger();
        $log->cli_log('Start get data in http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0');
        $provider1 = new ApiProvider('http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0', 'symbol', 'amount');
        $convertProvider1 = new ConvertProvider($provider1, 'USDTRY', 'EURTRY', 'GBPTRY');
        $amaount1 = $convertProvider1->generalRules();
        $log->cli_log('End get data in http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0');

        $log->cli_log('Start get data in http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3');
        $provider2 = new ApiProvider('http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3', 'kod', 'oran');
        $convertProvider2 = new ConvertProvider($provider2, 'DOLAR', 'AVRO', 'İNGİLİZ STERLİNİ');
        $amaount2 = $convertProvider2->generalRules();
        $log->cli_log('End get data in http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3');

        $log->cli_log('Start Comparison Datas');
        $comparedData = $convertProvider2->comparisonData($amaount1, $amaount2);
        $comparedData['CreateDate'] = date('Y-m-d H:i:s');

        $log->cli_log('End Comparison Datas');
        $this->db_model->insert($comparedData);
    }
}
