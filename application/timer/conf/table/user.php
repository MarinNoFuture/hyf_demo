<?php
namespace application\timer\conf\table;

class user
{
    
    public static $name = "user";

    public static $table = [
        [
            'name' => 'name',
            'type' => 'string',
            'size' => 50
        ],
        [
            'name' => 'age',
            'type' => 'int',
            'size' => 2
        ],
        [
            'name' => 'sex',
            'type' => 'string',
            'size' => 5
        ]
    ];
}