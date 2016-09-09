<?php
/**
 * Author: ddinnnng@qq.com
 * Date: 2016/9/8
 * Description:
 */
namespace system\core;

use AltoRouter;

class Router extends AltoRouter
{

    public function __construct(array $routes, $basePath, array $matchTypes)
    {
        parent::__construct($routes, $basePath, $matchTypes);
    }


}