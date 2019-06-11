<?php
namespace application\apigroup\timer\master\media_timer;

class timer_sohu
{

    // 定时执行时间，单位毫秒
    public $loop_time = 2000;

    // 定时器执行入口
    public function run()
    {
    	
    	echo "timer sohu, I am master time." . PHP_EOL;
    	echo microtime() . PHP_EOL;
    	
    }
}