<?php
namespace application\api\timer;

class timer_aa
{

    // 定时器名称
    public $name = "timer_aa";

    /**
     * 设置定时器执行时间规则，支持crontab基本设置格式，支持秒级定时器
     * 0 1 2 3 4 5
     * * * * * * *
     * - - - - - -
     * | | | | | |
     * | | | | | +--- day of week (0 - 6) (Sunday=0)
     * | | | | +----- month (1 - 12)
     * | | | +------- day of month (1 - 31)
     * | | +--------- hour (0 - 23)
     * | +----------- min (0 - 59)
     * +------------- sec (0-59) [秒可选参数，不填写默认为 1]
     */
    public $loop_time = "*/5 * * * * *";

    // 定时器执行入口
    public function run()
    {
        // 异步定时器，定时器安装在master进程
        
        // 方法一
        // 从Master、Manager、UserProcess进程中投递的任务，是单向的。（hyf中的初始化、定时器等在绑定在master上的程序都是单向的）
        // 在TaskWorker进程中无法使用return或Server->finish()方法返回结果数据。
        // 因此task函数无需回调参数
        
        $task_id = task('timer/handle/md::ttd', '');
        echo "task timer[{$task_id}] | " . date("Y-m-d H:i:s") . PHP_EOL;
        
        // 方法二
        // 在run方法内使用全协程化代码或开启一键协程化php原生代码
        //echo "task timer | " . date("Y-m-d H:i:s") . PHP_EOL;
        //mysql()->query("select sleep(10);");
        //echo "timer AA, I am task process timer. | " . date("Y-m-d H:i:s") . PHP_EOL;
    }
}