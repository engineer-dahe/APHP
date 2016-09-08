<?php
/**
 * Author: ddinnnng@qq.com
 * Date: 2016/7/27
 * Description:
 */
namespace system\library\singleton;

abstract class SingletonFactory
{

    protected static $instances = [];

    public static function getInstance()
    {
        $className = static::getClassName();
        if (!array_key_exists($className, self::$instances) || !self::$instances[$className] instanceof $className) {
            self::$instances[$className] = new $className();
        }
        return self::$instances[$className];
    }

    public static function removeInstance()
    {
        $className = static::getClassName();
        if (array_key_exists($className, self::$instances)) {
            unset(self::$instances[$className]);
        }
    }

    final private static function getClassName()
    {
        return get_called_class();
    }

}