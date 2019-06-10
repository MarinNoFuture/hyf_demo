<?php
namespace application\api\init;

class app
{

    /**
     *
     * @todo 默认时区
     */
    public function default_timezone()
    {
        date_default_timezone_set('PRC');
    }

    // 定义常量
    public function const()
    {
        defined('TEST_CONST') or define('TEST_CONST', "TEST");
    }
}
