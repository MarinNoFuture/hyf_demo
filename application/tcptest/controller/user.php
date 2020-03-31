<?php
namespace application\tcptest\controller;

class user
{

    public function list($data)
    {
        var_dump($data);
        $task_id = task('task/test::dsy', $data, function ($data, $task_id) {
            var_dump($data, $task_id);
        });
        return json_encode($data) . "[user/list][{$task_id}]";
    }
}