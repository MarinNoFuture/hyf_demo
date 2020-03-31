<?php
namespace application\ws\data;

class dispatch
{

    // dispatch示例
    public static function run($data)
    {
        $data = json_decode($data, true);
        list($controller, $action) = explode('/', $data["type"]);
        
        $class = "\\application\\ws\\controller\\{$controller}";
        $obj = new $class();
        $ret = $obj->$action($data["data"]);
        return $ret;
    }
}

/*
 * 客户端示例代码
 * 
    <script>
        var ws = new WebSocket("ws://192.168.81.143:8088");
        ws.onopen = function(event){
           console.log("客户端已连接上!");
		   
           ws.send(JSON.stringify({"type": "user/list", "data": [1,2,3,4]}));
        };
        ws.onmessage= function(event){
           console.log("服务器传过来的数据是："+event.data);
		   var d = JSON.parse(event.data);
		   alert(d[2]);
        }

        ws.onclose = function(event){
            console.log("连接已关闭");
        };
    </script>
*/
    
