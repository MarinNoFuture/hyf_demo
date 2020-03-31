<?php
return [
    'host' => '0.0.0.0',
    'port' => 8088,
    'server_set' => [
        'worker_num' => 2,
        'task_worker_num' => 2,
        'package_max_length' => 100 * 1024 *1024, // ���http post form�ϴ��ߴ�
        'document_root' => '/makle/hyf/application/rhandle/static/', //��̬��ԴĿ¼
        'enable_static_handler' => 1
    ],
    'content-type' => 'application/json; charset=utf-8' // ������Ӧͷ��Ĭ��ֵ��application/json; charset=utf-8
    //'enableCoroutine' => 1
];