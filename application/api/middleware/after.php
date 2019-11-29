<?php
namespace application\api\middleware;

/**
 * 后置中间件
 * global_开头的函数每次请求都会执行，router开头的会根据路由进行匹配，匹配到执行
 * Class before
 * @package application\api\middleware
 */
class after
{

    public function router_test_hello()
    {
        var_dump("after: " . microtime(true));
    }


}
