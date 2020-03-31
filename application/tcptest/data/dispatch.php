<?php
namespace application\tcptest\data;

class dispatch
{

    /**
     * 对客户端发送数据进行处理
     * 约定的数据格式，例如：{"type": "user/list", "data": [1,2,3,4]}
     * @param unknown $data
     */
    public static function run($data)
    {
        $data = json_decode($data, true);
        list($controller, $action) = explode('/', $data["type"]);
        
        $class = "\\application\\tcptest\\controller\\{$controller}";
        $obj = new $class();
        $ret = $obj->$action($data["data"]);
        return $ret;
    }
}
/*
    // 客户端代码示例
    $client = new swoole_client(SWOOLE_SOCK_TCP);
    if (!$client->connect('127.0.0.1', 8088, -1)) {
        exit("connect failed. Error: {$client->errCode}\n");
    }
    $client->send(base64_encode('{"type": "user/list", "data": [1,2,3,4]}'));
    echo base64_decode($client->recv()) . PHP_EOL;
    $client->close();
*/