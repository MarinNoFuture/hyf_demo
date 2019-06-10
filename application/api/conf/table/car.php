<?php
namespace application\api\conf\table;

class car
{

    public static $name = "car";
    
    public static $table = [
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