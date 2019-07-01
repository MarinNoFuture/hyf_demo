<?php
namespace application\timer\timer;

class timer_sd
{
    
    // 定时器名称
    public $name = "timer_sd";

    /**
     *  设置定时器执行时间规则，支持crontab基本设置格式，支持秒级定时器
     *            0 1 2 3 4 5
     *            * * * * * *
     *            - - - - - -
     *            | | | | | |
     *            | | | | | +--- day of week (0 - 6) (Sunday=0)
     *            | | | | +----- month (1 - 12)
     *            | | | +------- day of month (1 - 31)
     *            | | +--------- hour (0 - 23)
     *            | +----------- min (0 - 59)
     *            +------------- sec (0-59) [秒可选参数，不填写默认为 1]
     *  
     */
    public $loop_time = "* */1 * * * *";

    // 定时器执行入口
    public function run()
    {
        echo "timer sd" . date("Y-m-d H:i:s") . PHP_EOL;
        // sleep(5);
        if (table('user')->exists('hi')) {
            var_dump(table('user')->get('hi'));
        }
    }
}