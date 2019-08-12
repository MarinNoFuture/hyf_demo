<?php
namespace application\apigroup\exception;

class error {

    public function exceptionHook($e)
    {
        var_dump(__LINE__);
        var_dump($e);
        return '{"ret": 10085, "msg": "'.$e->getMessage().'", "data": []}';
    }

    public function errorHook($e)
    {
        var_dump(__LINE__);
        var_dump($e);

       return '{"ret": 10086, "msg": "'.$e->getMessage().'", "data": []}';
    }
}