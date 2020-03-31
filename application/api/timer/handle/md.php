<?php
namespace application\api\timer\handle;

class md
{

    public function ttd($param)
    {
        $n = rand(1, 8);
        sleep($n);
        echo "timer AA, I am task process timer. sleep {$n}. | " . date("Y-m-d H:i:s") . PHP_EOL;
    }
}