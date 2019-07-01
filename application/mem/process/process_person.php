<?php

/**
 * person队列处理程序（队列消费者）
 */

namespace application\mem\process;

class process_person
{
    public $name = "person";

    public function run()
    {
        while (true) {
            sleep(1);
            // var_dump(queue('person')->status());
            $msg = queue('person')->pop();
            if ($msg) {
                echo "person: " . PHP_EOL;
                var_dump($msg);
            }
        }
    }
}
