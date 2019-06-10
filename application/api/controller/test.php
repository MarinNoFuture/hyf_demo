<?php
namespace application\api\controller;

use hyf\facade\mysql;
//use hyf\facade\mysql_slave;
use hyf\facade\output;
use hyf\facade\table;

class test
{

    public function index()
    {
        var_dump(\Hyf::$app_config);
        var_dump(\Hyf::$request);
        var_dump(\Hyf::$dir);
        var_dump(TEST_CONST);
        
        
        table::user()->set('hello', [
            'name' => '李四',
            'age' => 40,
            'sex' => '男'
        ]);
        var_dump(table::user()->count());
        
        var_dump(table::user()->get('hello'));
        
        
        $result = mysql::query("select id from pmp_config_media limit 0,1;");
        var_dump($result);
        
        //$result_slave = mysql_slave::query("select id from pmp_config_media limit 1,1;");
        //var_dump($result_slave);
        
        $task_id = \Hyf::$server->task(\Hyf::$request->get);
        
        echo "$task_id\n";
        
        return output::success($result);
    }
}