<?php
namespace application\timer\conf;

class table
{

    public static $column = [
        'user' => [
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
        ]
    ];
}