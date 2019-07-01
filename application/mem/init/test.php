<?php

namespace application\mem\init;

class test
{

    public function run()
    {
        echo "init\n";
        // 向内存表user中写入键值=hhh的数据
        table('user')->set('hhh', ['name' => 'triple H', 'age' => 50, 'sex' => 'male']);
    }
}
