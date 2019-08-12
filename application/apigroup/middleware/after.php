<?php
namespace application\apigroup\middleware;

/**
 * 后置中间件
 * global_开头的函数每次请求都会执行，router开头的会根据路由进行匹配，匹配到执行
 * Class after
 * @package application\apigroup\middleware
 */
class after
{

    /**
     *
     * @todo 默认时区
     */
    public function global_end()
    {
        var_dump('end#############');
    }

    public function router_v1_test_index()
    {
        var_dump('ssss');
    }


}
