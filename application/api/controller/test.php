<?php
namespace application\api\controller;

use hyf\facade\output;

class test
{
    public function index()
    {
        var_dump(config());
        //等同于
        //var_dump(\Hyf::$config);
        
        var_dump(server_config());

        var_dump(app_config());
        //等同于
        //var_dump(\Hyf::$app_config);

        var_dump(request());
        //        var_dump(\Hyf::$request);
        //接受参数 request()->get()，等等方法具体参见https://wiki.swoole.com/wiki/page/328.html
        var_dump(\Hyf::$dir);
        //        var_dump(TEST_CONST);
        table('user')->set('hello', [
            'name' => '李四',
            'age' => 40,
            'sex' => '男'
        ]);
        var_dump(table('user')->count());

        var_dump(table('user')->get('hello'));

        //var_dump(redis()->get('test'));

        $result = mysql()->query("select * from pmp_config_media limit 0,1;");

        //$result_slave = mysql('mysql_slave')->query("select id from pmp_config_media limit 1,1;");

        return output::success($result);
    }

    public function ddd()
    {
        if (table('user')->exists('hello')) {
            var_dump(table('user')->get('hello'));
        }
        $result = mysql()->query("select * from pmp_config_media limit 0,1;");
        return output::success($result);
    }

    public function hello()
    {
        return output::success(["msg" => "hello", "time" => microtime(true)]);
    }

    // 异步task示例
    public function async_test()
    {
        var_dump(server_config());
        
        $task_id1 = task('async/test/md::tsd', 'data: testxxxxxxxx111', function ($data, $task_id) {
            var_dump($data, $task_id);
        });
        $task_id2 = task('async/test/md::tyd', request()->get, function ($data, $task_id) {
            var_dump($data, $task_id);
        });
        return output::success([
            "task_id" => $task_id1 . "|" . $task_id2, 
            "memo" => "async_test"
        ]);
    }
}
