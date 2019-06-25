<?php
namespace application\rhandler\controller;

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
        return json_encode($ret);
    }
}