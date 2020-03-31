<?php
namespace application\tcptest\pack;

class unpack
{

    /**
     * 解包数据
     * @param unknown $data            
     * @return string
     */
    public static function run($data)
    {
        $data = base64_decode($data);
        return $data;
    }
}