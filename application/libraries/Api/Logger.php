<?php

namespace Application\Libraries\Api;


class Logger
{
    public function __construct()
    {
        date_default_timezone_set("Europe/Istanbul");
    }

    public function log(string $str)
    {
        $message = date('Y-m-d H:i:s') . ' : ' . $str . "\n";
        $this->write_log($message);
    }

    public function cli_log(string $str)
    {
        $message = date('Y-m-d H:i:s') . ' : ' . $str . "\n";
        $this->write_log($message);
        echo $message;

    }

    private function write_log($message)
    {
        $fp = fopen(APPPATH . 'logs/' . date('Y-m-d') . '-log.txt', 'a');
        fwrite($fp, $message);
        fclose($fp);
    }
}