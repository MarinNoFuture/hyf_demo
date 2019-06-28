<?php
namespace application\rhandler\init;

class test {
    
    public function run(){
        
        echo "init" . PHP_EOL;
        
        // 初始化容器
        DI('nx', function () {
            return 'aaa';
        });
    }
    
}