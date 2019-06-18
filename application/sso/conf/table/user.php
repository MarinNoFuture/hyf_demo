<?php
namespace application\sso\conf\table;

class user
{

    public static $name = "user";

    public static $table = [
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
    ];
}