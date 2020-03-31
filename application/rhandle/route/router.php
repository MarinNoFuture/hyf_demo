<?php
/**
 * router handle
 * 配置文件中路由模式设置为 handle 模式，并且设置该路由文件即可使用
 */
namespace application\rhandle\route;

use hyf\facade\output;

class router
{

    public static function Run($router)
    {
        $router::get('/', function () {
            // return json_encode([
            // "ret" => 0,
            // "msg" => "ok",
            // "data" => [
            // "hello"
            // ]
            // ]);
            return output::success([
                'key' => 'hello'
            ]);
        });
        $router::get('/test/hello', function () {
            var_dump(request());
            return 'hello';
        });
        
        // $handler::map(['get','post'], '/aaa/bbb', 'aaa\bbb@index');
        $router::get('/test', 'test@index'); // 应用目录/controller/aaa/bbb.php
        $router::get('/test/ddd', 'test@ddd');
        $router::get('/htmltest', 'test@html');
        
        $router::get('/middleware', function () {
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
        
        // middleware before | after test
        $router::get('/m2', function () {
            echo "hello middleware before.\n";
        }, function () {
            return json_encode([
                "ret" => 0, 
                "msg" => "ok", 
                "data" => [
                    "hello middleware"
                ]
            ]);
        }, function () {
            echo "hello middleware after.\n";
        });
        
        $router::get('/m3', 'test@abc', 'test@index', 'test@abc');
        
        $router::get('/middleware/test', 'test@abc', 'test@index');
        
        // group
        $router::group('/v1', function ($r) {
            $r::get('/test', function () {
                return json_encode([
                    "ret" => 0, 
                    "msg" => "ok", 
                    "data" => [
                        "hello group test"
                    ]
                ]);
            });
            $r::get('/middleware', function () {
                echo "hello v1 hyf\n";
            }, function () {
                return json_encode([
                    "ret" => 0, 
                    "msg" => "ok", 
                    "data" => [
                        "hello v1 middleware"
                    ]
                ]);
            });
            $r::get('/test2', 'test@index');
        });
        
        $router::group('/v2', function () {
            echo "v2 group middleware\n";
        }, function ($r) {
            $r::get('/test', function () {
                return json_encode([
                    "ret" => 0, 
                    "msg" => "ok", 
                    "data" => [
                        "hello group test"
                    ]
                ]);
            });
            $r::get('/middleware', function () {
                echo "hello v2 hyf middleware\n";
            }, function () {
                return json_encode([
                    "ret" => 0, 
                    "msg" => "ok", 
                    "data" => [
                        "hello v2 middleware"
                    ]
                ]);
            });
        });
        
        $router::group('/v3', 'v3group@test', function ($r) {
            $r::get('/test', function () {
                return json_encode([
                    "ret" => 0, 
                    "msg" => "ok", 
                    "data" => [
                        "hello group v3 test"
                    ]
                ]);
            });
            $r::get('/middleware', function () {
                echo "hello v3 hyf middleware\n";
            }, function () {
                return json_encode([
                    "ret" => 0, 
                    "msg" => "ok", 
                    "data" => [
                        "hello v3 middleware"
                    ]
                ]);
            });
        });
        
        $router::get('/testx/(:any)', function ($any) {
            echo 'The any is: ' . $any . PHP_EOL;
            return json_encode([
                "ret" => 0, 
                "msg" => "ok", 
                "data" => [
                    "The any is: {$any}!"
                ]
            ]);
        });
        
        $router::get('/testy/(:num)/(:num)', function ($num1, $num2) {
            echo 'The num is: ' . $num1 . '|' . $num2 . PHP_EOL;
            return json_encode([
                "ret" => 0, 
                "msg" => "ok", 
                "data" => [
                    "The any is: {$num1} | {$num2}!"
                ]
            ]);
        });
        
        $router::get('/testz/(:any)', function () {
            echo "middleware any...\n";
        }, function ($any) {
            echo 'The any is: ' . $any . PHP_EOL;
            return json_encode([
                "ret" => 0, 
                "msg" => "ok", 
                "data" => [
                    "The any is: {$any}!"
                ]
            ]);
        });
        
        $router::group('v4', function () {
            echo "middleware v4 any...\n";
        }, function ($r) {
            $r::get('/test/(:any)', function () {
                echo "middleware any...\n";
            }, function ($any) {
                echo 'The any is: ' . $any . PHP_EOL;
                return json_encode([
                    "ret" => 0, 
                    "msg" => "ok", 
                    "data" => [
                        "The any is: {$any}!"
                    ]
                ]);
            });
        });
        
        // group middleware befor | after test
        $router::group('/g1', function () {
            echo "g1 group middleware before\n";
        }, function ($r) {
            $r::get('/test', function () {
                echo "test middleware before\n";
            }, function () {
                return json_encode([
                    "ret" => 0, 
                    "msg" => "ok", 
                    "data" => [
                        "hello group test"
                    ]
                ]);
            }, function () {
                echo "test middleware after\n";
            });
            $r::get('/test2', 'test@index');
        }, function () {
            echo "g1 group middleware after\n";
        });
        
        $router::group('/g2', 'test@abc', function ($r) {
            $r::get('/test', function () {
                echo "test middleware before\n";
            }, function () {
                return json_encode([
                    "ret" => 0, 
                    "msg" => "ok", 
                    "data" => [
                        "hello group test"
                    ]
                ]);
            }, function () {
                echo "test middleware after\n";
            });
            $r::get('/test2', 'test@index');
        }, 'test@abc');
    }
    
    // 请求前处理（全局事件）（方法可选）
    public function _before()
    {
        echo "_before\n";
    }
    
    // 请求完成后处理（全局事件）（方法可选）
    public function _after()
    {
        echo "_after\n";
    }
}
