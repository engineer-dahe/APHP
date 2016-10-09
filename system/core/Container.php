<?php
/**
 *
 * User: ddinnnng@gmail.com
 * Date: 2016-09-21
 */
namespace system\core;

final class Container {

    static protected $container = NULL;

    /**
     * @param object $obj
     * @param string $alias
     * @return bool
     */
    final static public function set($obj, $alias)
    {
        if (!$alias) {
            return false;
        }

        self::$container[$alias] = $obj;
        return true;
    }


    /**
     * @param string $alias
     * @throws \Exception
     */
    final static public function get($alias) {
        if (array_key_exists($alias, self::$container)) {
            return self::$container[$alias];
        }

        throw new \Exception('容器中不存在该对象');
    }

}