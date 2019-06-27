<?php
/**
 * router handler
 * 配置文件中路由模式设置为 handler 模式，并且设置该路由文件即可使用
 */
namespace application\api\route;

class router
{

    public static function Run($handler)
    {
        $handler::get('/', function () {
            return json_encode([
                "ret" => 0, 
                "msg" => "ok", 
                "data" => [
                    "hello"
                ]
            ]);
        });
        // $handler::map(['get','post'], '/aaa/bbb', 'aaa\bbb@index');
        $handler::get('/aaa/bbb', 'aaa\bbb@index'); // 应用目录/controller/aaa/bbb.php
        
        $handler::get('/middleware', function () {
            echo "hello hyf\n";
        }, function () {
            return json_encode([
                "ret" => 0, 
                "msg" => "ok", 
                "data" => [
                    "hello middleware"
                ]
            ]);
        });
        $handler::get('/middleware/aaa/bbb', 'test@abc', 'aaa\bbb@index');
        
        return $handler::dispatch();
    }
}
