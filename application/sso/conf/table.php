<?php
namespace application\sso\conf;

class table
{

    public static $column = [
        'user' => [
            [
                'name' => 'uid', 
                'type' => 'string', 
                'size' => 50
            ], 
            [
                'name' => 'vcode', 
                'type' => 'string', 
                'size' => 50
            ], 
            [
                'name' => 'last_active_time', 
                'type' => 'int', 
                'size' => 11
            ]
        ]
    ];
}
