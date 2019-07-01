<?php
/**
 * 队列配置
 */
namespace application\mem\conf;

class queue
{

    /**
     * 程序初始化队列配置
     * 本应用中有两个队列person和money
     * 注意：队列中写入的数据，程序终止后不会消失，程序重新启动后可继续消费数据
     * 
     * @var array
     */
    public static $keys = [
        'person' => 0x3000111,
        'money' => 0x3000112
    ];
}
