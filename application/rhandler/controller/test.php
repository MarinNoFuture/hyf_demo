<?php
namespace application\rhandler\controller;

use hyf\facade\output;

class test
{

    public function index()
    {
        $ret = [
            "ret" => 0, 
            "msg" => "ok", 
            "data" => [
                "controller: test::index"
            ]
        ];
        
        // 从容器取值
        var_dump(DI('nx'));
        
        return json_encode($ret);
    }

    public function test()
    {
        // 从容器取值
        var_dump(DI('nx'));
        
        return output::success([
            'key' => 'test'
        ]);
    }
}