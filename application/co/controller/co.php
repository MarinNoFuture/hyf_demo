<?php
namespace application\co\controller;

class co
{

    public function test1()
    {
        /*
         * for ($i = 1; $i <= 10; $i++) {
         * sleep(1);
         * echo $i . PHP_EOL;
         * }
         *
         * for ($j = 11; $j <= 20; $j++) {
         * sleep(1);
         * echo $j . PHP_EOL;
         * }
         */
        go(function () {
            for ($i = 1; $i <= 10; $i++) {
                \co::sleep(1);
                echo $i . PHP_EOL;
            }
        });
        
        go(function () {
            for ($j = 11; $j <= 20; $j++) {
                \co::sleep(1);
                echo $j . PHP_EOL;
            }
        });
        
        return json_encode([
            'key' => 'co::test1'
        ]);
    }

    public function test2()
    {
        $mysql1 = new \Swoole\Coroutine\MySQL();
        $mysql2 = new \Swoole\Coroutine\MySQL();
        
        defer(function () use ($mysql1, $mysql2) {
            $mysql1->close();
            $mysql2->close();
            echo "defer...\n";
        });
        
        $mysql1->connect(config('mysql'));
        $mysql1->setDefer();
        $mysql1->query('select id from uni_pmp.pmp_config_media where id=1;');
        
        $mysql2->connect(config('mysql'));
        $mysql2->setDefer();
        $mysql2->query('select id from uni_pmp.pmp_config_media where id=2;');
        
        $res1 = $mysql1->recv();
        $res2 = $mysql2->recv();
        
        var_dump($res1, $res2);
        
        return json_encode([
            'key' => 'co::test2'
        ]);
    }

    /**
     * 一鍵协程化测试
     * 可以在go函数中一键协程化同步操作代码异步化，server.php配置中开启即可，具体可以使用的php同步方法列表：
     * 可用列表
     * redis扩展
     * 使用mysqlnd模式的pdo、mysqli扩展，如果未启用mysqlnd将不支持协程化
     * soap扩展
     * file_get_contents
     * fopen
     * fread/fgets
     * fwrite/fputs
     * file_get_contents、file_put_contents
     * unlink
     * mkdir
     * rmdir
     * stream_socket_client (predis)
     * stream_socket_server
     * stream_select(需要4.3.2以上版本)
     * fsockopen
     *
     * 不可用列表
     * mysql：底层使用libmysql client
     * curl：底层使用libcurl （即不能使用CURL驱动的Guzzle）
     * mongo：底层使用mongo-c-client
     * pdo_pgsql
     * pdo_ori
     * pdo_odbc
     * pdo_firebird
     *
     * @return string
     */
    public function test3()
    {
        go(function () {
            sleep(1);
            echo "sleep 1s\n";
            usleep(1000);
            echo "sleep 1ms\n";
            
            $ret = mysql()->query("select budget_rate from pmp_config_creative where id=2;");
            var_dump($ret, microtime(true));
        });
        
        var_dump(app_config(), server_config(), config());
        
        return json_encode([
            'key' => 'co::test2' . microtime(true)
        ]);
    }
}

