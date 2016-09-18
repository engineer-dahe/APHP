<?php
/**
 * Author: ddinnnng@qq.com
 * Date: 2016/9/8
 * Description:
 */
namespace system\core;

use system\library\singleton\Singleton;

class Config extends Singleton
{

    static private $configArr = array();

    /**
     * @param $name
     * @param null $group
     * @return null
     */
    public function get($name, $group = NULL)
    {
        if (!count(self::$configArr)) {
            $this->load();
        }

        if (is_null($group)) {
            return $this->find($name);
        } else {
            return isset(self::$configArr[$group][$name]) ? self::$configArr[$group][$name] : NULL;
        }
    }

    /**
     * Loading all config files.
     */
    private function load()
    {
        foreach (glob(CONFIG_PATH . DIRECTORY_SEPARATOR . '*.php') as $fileName) {
            self::$configArr[basename($fileName, '.php')] = include $fileName;
        }
    }

    /**
     * @param $name
     * @return null
     * @throws \Exception
     */
    private function find($name)
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