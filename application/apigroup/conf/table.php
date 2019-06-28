<?php
namespace application\apigroup\conf;

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
        ], 
        
        'car' => [
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
        ]
    ];
}
