<?php

/**
 * money队列处理程序（队列消费者）
 */

namespace application\mem\process;

class process_money
{
    public $name = "money";

    public function run()
    {
        while (true) {
            sleep(1);
            // var_dump(queue('money')->status());
            $msg = queue('money')->pop();
            if ($msg) {
                echo "money: " . PHP_EOL;
                var_dump($msg);
            }
        }
    }
}
