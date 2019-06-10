<?php
namespace application\timer\timer;

use hyf\facade\table;

class timer_se
{

    // 定时执行时间，单位毫秒
    public $loop_time = 3000;

    // 定时器执行入口
    public function run()
    {
        echo "timer se ---- " . table::user()->count() . PHP_EOL;
        // sleep(5);
    }
}