<?php
namespace application\api\controller;

use hyf\facade\output;
use hyf\facade\table;

class test
{
    public function index()
    {
        var_dump(config());
        //等同于
        //var_dump(\Hyf::$config);

        var_dump(app_config());
        //等同于
        //var_dump(\Hyf::$app_config);

        var_dump(request());
//        var_dump(\Hyf::$request);
        //接受参数 request()->get()，等等方法具体参见https://wiki.swoole.com/wiki/page/328.html
        var_dump(\Hyf::$dir);
//        var_dump(TEST_CONST);
        table::user()->set('hello', [
            'name' => '李四',
            'age' => 40,
            'sex' => '男'
        ]);
        var_dump(table::user()->count());

        var_dump(table('user')->get('hello'));

//        var_dump(redis()->get('test'));

        $result = mysql()->query("select id from pmp_config_media limit 0,1;");

        //$result_slave = mysql('mysql_slave')->query("select id from pmp_config_media limit 1,1;");

        $task_id = \Hyf::$server->task(\Hyf::$request->get);

        echo "$task_id\n";

        return output::success($result);
    }
}