<?php
namespace application\apigroup\timer\task\test_timer;

class timer_hd {
    
    // 定时执行时间，单位毫秒
    public $loop_time = 2000;
    
    // 定时器执行入口
    public function run(){
        
        echo "timer hd, I am task time." . PHP_EOL;
        echo microtime() . PHP_EOL;
        
    }
    
}