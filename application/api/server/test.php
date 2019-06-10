<?php
namespace application\api\server;

use hyf\facade\output;

class test {
    
    public $server_config = array(
        'host' => '0.0.0.0',
        'port' => 55555,
        'server_set' => array(
            'open_http_protocol' => true
        )
    );
    
    public function onRequest($request, $response)
    {
        if ($request->server['path_info'] == '/favicon.ico' || $request->server['request_uri'] == '/favicon.ico') {
            return $response->end();
        }
        $response->header("Content-Type", "application/json; charset=utf-8");
        $response->end(output::success(['key' => 'hello']));
    }
    
}