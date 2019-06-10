<?php
namespace application\api\timer\process\ttyy;

class timer_ss
{

    // 定时执行时间，单位毫秒
    public $loop_time = 5000;

    // 定时器执行入口
    public function run()
    {
    	
        echo microtime() . " - timer ttyy-ss, I am process time." . PHP_EOL;
    	
    }
}