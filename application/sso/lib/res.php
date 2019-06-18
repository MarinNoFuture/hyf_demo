<?php
namespace application\sso\lib;

class res
{
    public static function success($res = [])
    {
        if(!is_array($res)){
            return json_encode(['error' => 1]);
        }
        $res = array_merge(['error' => 0], $res);
        if(!empty(request()->get['callback'])){
            return request()->get['callback'] . '(' .json_encode($res) . ')';
        } else {
            return json_encode($res);
        }
    }

    public static function error($res = [])
    {
        if(!is_array($res)){
            return json_encode(['error' => 1]);
        }
        $res = array_merge(['error' => 1], $res);
        if(!empty(request()->get['callback'])){
            return request()->get['callback'] . '(' .json_encode($res) . ')';
        } else {
            return json_encode($res);
        }
    }
}