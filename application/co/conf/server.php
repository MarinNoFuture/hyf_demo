<?php
return [
    'host' => '0.0.0.0',
    'port' => 8088,
    'enableCoroutine' => 1, //是否开启一键协程化，将php某些原生语法在go函数中协程化，1 开启， 0 关闭
    'server_set' => [
        'worker_num' => 2
//        'task_worker_num' => 1
    ]
];