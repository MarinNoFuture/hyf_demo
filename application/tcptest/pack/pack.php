<?php
namespace application\tcptest\pack;

class pack
{

    /**
     * 打包数据
     * 
     * @param unknown $data            
     * @return string
     */
    public static function run($data)
    {
        return base64_encode($data . "[pack]");
    }
}