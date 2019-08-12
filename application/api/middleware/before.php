<?php
namespace application\api\middleware;

/**
 * 前置中间件
 * global_开头的函数每次请求都会执行，router开头的会根据路由进行匹配，匹配到执行
 * Class before
 * @package application\api\middleware
 */
class before
{

    /**
     *
     * @todo 默认时区
     */
    public function global_default_timezone()
    {
        date_default_timezone_set('PRC');
    }

    public function global_auth()
    {
//        throw new \Exception('认证失败');
    }

    public function router_test_index()
    {
        //throw new \Exception('进入了testindex');
    }

    public function router_aaa_bbb_index()
    {

    }


}
