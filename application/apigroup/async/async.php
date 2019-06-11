<?php
/**
 * Class async
 * 
 * 异步task处理类，controller中使用 \Hyf::$server->task($data) 创建异步任务
 * 通过async::tack 处理异步任务，任务完成执行 async::finish 方法
 * 
 * 可通过对$data参数的格式定义类型字段，根据类型字段将async::task作为事件分发入口，创建不同的类对业务进行处理
 *
 * @author Makle <zhang.tao@hylinkad.com>
 */
namespace application\apigroup\async;

class async
{

    public static function task($server, $task_id, $from_id, $data)
    {
        // do something
        $server->finish(json_encode($data));
    }

    public static function finish($server, $task_id, $data)
    {
        // do something
        echo $data . PHP_EOL;
    }
}