<?php
namespace application\timer\init;

use hyf\facade\table;

class test
{

    public function run()
    {
        echo "test init" . PHP_EOL;
        
        table::user()->set('hi', [
            'name' => '李四', 
            'age' => 40, 
            'sex' => '男'
        ]);
        
        var_dump(\Hyf::$config);
        var_dump(\Hyf::$app_config);
    }
}