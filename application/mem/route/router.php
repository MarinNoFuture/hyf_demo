<?php
/**
 * router handle
 * 配置文件中路由模式设置为 handle 模式，并且设置该路由文件即可使用
 */
namespace application\mem\route;

class router
{

    public static function Run($router)
    {
        $router::get('/test/person', 'test@person');
        $router::get('/test/money', 'test@money');
        $router::get('/test', 'test@index');
        return $router::dispatch();
    }
}
