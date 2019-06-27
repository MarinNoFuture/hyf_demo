<?php
/**
 * 自定义解析规则，存在该文件则按照文件中定义规则替换系统默认解析流程
 */
namespace application\apigroup\route;

class dispatch
{
    /**
     * 自定义路由解析规则
     * @return array 
     * group模式： 返回 [組名, 控制器名, 方法名]
     * normal模式： 返回 [控制器名, 方法名]
     */
    public function run()
    {
        return ['v1', 'bbb', 'index'];
    }
}