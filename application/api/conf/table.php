<?php
namespace application\api\conf;

class table
{

    public static $user = [
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
    
    public static $car = [
        [
            'name' => 'name',
            'type' => 'string',
            'size' => 50
        ],
        [
            'name' => 'color',
            'type' => 'string',
            'size' => 10
        ]
    ];
}
