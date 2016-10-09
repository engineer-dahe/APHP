<?php
/**
 * Author: ddinnnng@qq.com
 * Date: 2016/9/8
 * Description:
 */
namespace system\core;

class Config
{

    static private $configArr = array();

    /**
     * @param string $name
     * @param string $group
     * @return null
     */
    static public function get($name, $group = NULL)
    {
        if (!count(self::$configArr)) {
            self::load();
        }

        if (is_null($group)) {
            return self::find($name);
        } else {
            return isset(self::$configArr[$group][$name]) ? self::$configArr[$group][$name] : NULL;
        }
    }

    /**
     * Loading all config files.
     */
    static private function load()
    {
        foreach (glob(CONFIG_PATH . DIRECTORY_SEPARATOR . '*.php') as $fileName) {
            self::$configArr[basename($fileName, '.php')] = include $fileName;
        }
    }

    /**
     * @param string $name
     * @throws \Exception
     */
    static private function find($name)
    {
        $temp = array();
        $value = NULL;
        $count = 0;
        foreach (self::$configArr as $key => $config) {
            if (isset($config[$name])) {
                $temp[$key][$name] = $value = $config[$name];
                $count++;
            }
        }

        if ($count > 1) {
            throw new \Exception('有多个配置名称相同-' . json_encode($temp) . '-请添加class::get(name,group);group参数来指定配置文件');
        }

        unset($temp, $count);
        return $value;
    }

}