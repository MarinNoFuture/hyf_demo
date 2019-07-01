<?php

namespace application\mem\controller;

use hyf\facade\output;

class test
{
    public function index()
    {
        // 读取user表hhh的数据
        if (table('user')->exists('hhh')) {
           var_dump(table('user')->get('hhh'));
        }
        return output::success([
            "controller: test::index"
        ]);
    }

    public function person()
    {
        table('user')->set('jc', ['name' => 'John Cena', 'age' => 42, 'sex' => 'male']);

        // 给person队列中插入字符串（队列生产者）
        queue('person')->push('man');

        return output::success([
            "controller: test::person"
        ]);
    }

    public function money()
    {
        if (table('user')->exists('jc')) {
           var_dump(table('user')->get('jc'));
        }

        // 给money队列中插入数组（队列生产者）
        queue('money')->push(['1','3']);

        return output::success([
            "controller: test::money"
        ]);
    }
}
