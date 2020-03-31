<?php
namespace application\tcptest\task;

class test
{

    public function dsy($data)
    {
        array_push($data, 'dsy');
        sleep(5);
        return $data;
    }
}