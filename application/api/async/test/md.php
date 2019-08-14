<?php
namespace application\api\async\test;

class md
{
    
    public function tsd($param)
    {
        sleep(2);
        var_dump($param);
        return "ok tsd";
    }
    
    public function tyd($param)
    {
        sleep(5);
        var_dump($param);
        return "ok tyd";
    }
}