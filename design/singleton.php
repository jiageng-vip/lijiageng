<?php
/**
 * singleton.php
 *
 * User Jiageng
 * Describe 设计模式-单例模式-三私一公
 *
 * Date 2020/4/14
 * Time 1:33 下午
 */

class singleton
{
    private static $instance;

    private function __construct()
    {
       // TODO: 构造函数
    }

    public static function getInstance()
    {
        if (!self::$instance instanceof singleton) {
            self::$instance = new singleton();
        }

        return self::$instance;
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
}

class test
{

}

$single = singleton::getInstance();
$single1 = singleton::getInstance();
$test = new test();

var_dump($single);
var_dump($single1);
var_dump($test);