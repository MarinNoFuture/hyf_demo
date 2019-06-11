<?php
namespace application\api\timer\worker\test_timer;

class timer_sd {
    
    // 定时执行时间，单位毫秒
    public $loop_time = 2000;
    
    // 定时器执行入口
    public function run(){
        
        echo "timer sd, I am worker time." . PHP_EOL;
        echo microtime() . PHP_EOL;
        
    }
    
}