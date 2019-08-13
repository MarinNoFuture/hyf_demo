<?php
return [
    'host' => '0.0.0.0',
    'port' => 8088,
    'server_set' => [
        'worker_num' => 10,
        'task_worker_num' => 1,
        'document_root' => '/makle/hyf/application/rhandler/static/', //静态资源目录
        'enable_static_handler' => 1
    ]
];