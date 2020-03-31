<?php
return [
    'host' => '0.0.0.0',
    'port' => 8088,
    'server_set' => [
        'worker_num' => 2,
        'task_worker_num' => 2,
        'package_max_length' => 100 * 1024 *1024, // 最大http post form上传尺寸
        'document_root' => '/makle/hyf/application/rhandle/static/', //静态资源目录
        'enable_static_handler' => 1
    ],
    'content-type' => 'application/json; charset=utf-8' // 设置响应头，默认值：application/json; charset=utf-8
    //'enableCoroutine' => 1
];