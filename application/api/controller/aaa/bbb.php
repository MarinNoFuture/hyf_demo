<?php
namespace application\api\controller\aaa;

class bbb
{
    public function index()
    {
        var_dump(request()->get);
        echo 'dddd' . PHP_EOL;
        echo swoole_version() . PHP_EOL;
        return json_encode(["ret" => 0, "msg" => "ok", "data" => ["id" => 123, "value" => swoole_version()]]);
    }
}
