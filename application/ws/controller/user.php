<?php
namespace application\ws\controller;

class user
{

    public function list($data)
    {
        var_dump($data);
        return json_encode($data);
    }
}