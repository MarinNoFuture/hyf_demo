<?php
namespace application\api\async\test;

class md
{
    
    public function tsd($param)
    {
        sleep(2);
        var_dump($param, server()->worker_id);
        return "ok tsd";
    }
    
    public function tyd($param)
    {
        sleep(5);
        var_dump($param, server()->worker_id);
        return "ok tyd";
    }
    
    public function tyd2($param)
    {
        sleep(5);
        var_dump($param, server()->worker_id);
    }

}