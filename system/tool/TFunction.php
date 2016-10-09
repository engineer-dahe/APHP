<?php
/**
 * Author: ddinnnng@qq.com
 * Date: 2016/9/8
 * Description:
 */
namespace system\tool;

class Func {

    final static public function debug() {
        header('Content-Type: text/html; charset=UTF-8');
        echo '调试函数';
    }

}