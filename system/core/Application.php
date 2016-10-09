<?php
/**
 * Author: ddinnnng@qq.com
 * Date: 2016/9/8
 * Description:
 */
namespace system\core;

use Psr\Log\LoggerInterface;
use AltoRouter;
use system\library\singleton\Singleton;
use system\tool\Func;

class Application extends Singleton
{
    /**
     *
     */
    public function run()
    {
        //Container::set(new Router(), 'router');
        //Container::set(new Logger(), 'logger');

        /**
         * 1 初始化基础Controller、Model、View、Config、Logger、Router
         * 2 加载系统函数库
         */

        Func::debug();
        Config::get('');
    }
}