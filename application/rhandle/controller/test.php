<?php

namespace application\rhandle\controller;

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

    public function ddd()
    {
        // 从容器取值
        var_dump(DI('nx'));

        return output::success([
            'key' => 'test'
        ]);
    }

    public function html()
    {
        // 设置响应头为html格式
        response()->header("Content-Type", "text/html; charset=utf-8");
        return '<html><head></head><title>html test</title><body><h1>TEST HTML</h1><img align="center" src="1.jpg" /></body></html>';
    }
}
