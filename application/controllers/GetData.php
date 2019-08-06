<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (PHP_SAPI !== 'cli'){
    exit('No web access allowed');
}

use Application\Libraries\Api\ApiProvider;
use Application\Libraries\Api\ConvertProvider;
use Application\Libraries\Api\Logger;

class GetData extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
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
        $comparedData = $convertProvider2->comparisonData($amaount1,$amaount2);
        $log->cli_log('End Comparison Datas');

	}
}
