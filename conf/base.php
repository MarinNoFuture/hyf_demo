<?php
return [
    'mysql' => [
        'host' => 'localhost', 
        'port' => 3306, 
        'user' => 'root', 
        'password' => 123456, 
        'database' => 'uni_pmp', 
        'charset' => 'utf8', 
        'timeout' => 2, 
        'strict' => false
    ], 
    'mysql_slave' => [
        'host' => 'localhost', 
        'port' => 3306, 
        'user' => 'root', 
        'password' => 123456, 
        'database' => 'uni_pmp', 
        'charset' => 'utf8', 
        'timeout' => 2
    ], 
    'redis' => [
        'host' => '127.0.0.1', 
        'port' => 6379
        // 'auth' => true,
        // 'password' => '123456'
    ], 
    'redis2' => [], 
    'redis3' => [], 
    'log' => [
        'dir' => '/tmp/log/xxx/'
    ]
];
