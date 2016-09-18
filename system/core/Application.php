<?php
/**
 * Author: ddinnnng@qq.com
 * Date: 2016/9/8
 * Description:
 */
namespace system\core;

use Keradus\Psr4Autoloader;
use Psr\Log\LoggerInterface;
use system\library\singleton\Singleton;
use system\tool\TFunction as F;

class Application extends Singleton
{

    /**
     * @var Router
     */
    protected $router = null;

    /**
     * @var Psr4Autoloader
     */
    protected $loader = null;

    /**
     * @var LoggerInterface
     */
    protected $logger = null;

    /**
     * @var Config
     */
    protected $config = null;

    /**
     * @param Router $router
     */
    public function setRouter(Router $router)
    {
        $this->router = $router;
    }

    /**
     * @return Router $router
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * @param Psr4Autoloader $loader
     */
    public function setLoader(Psr4Autoloader $loader)
    {
        $this->loader = $loader;
    }

    /**
     * @return Psr4Autoloader $loader
     */
    public function getLoader()
    {
        return $this->loader;
    }

    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return LoggerInterface $logger
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * @return Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param Config $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

    /**
     *
     */
    public function run()
    {
        /**
         * 1 初始化基础Controller、Model、View、Config、Logger、Router
         * 2 加载系统函数库
         */

        F::debug();
        $this->config->get('a');
    }
}