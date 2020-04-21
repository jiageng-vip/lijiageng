<?php
/**
 * adapter.php
 *
 * User lijiageng
 * Describe 适配器模式
 *
 * Date 2020/4/20
 * Time 10:11 下午
 */

interface Target {
    /**
     *源类也有的方法1
     */
    public function sampleMethod1();

    /**
     *源类没有的方法2
     *
     */
    public function sampleMethod2();
}

/**
 *源角色
 */
class Adaptee {
    /**
     *方法1
     *
     */
    public function sampleMethod1() {
        echo 'Adaptee sampleMethod1 <br/>';
    }
}

/**
 *类适配器角色
 *@author li.yonghuan
 *@version 2014.02.13
 */
class Adapter extends Adaptee implements Target {
    /**
     *方法2
     */
    public function sampleMethod2() {
        echo 'Adapter sampleMethod2 <br/>';
    }
}

/**
 *客户端调用
 */
class Client {
    public static function main() {
        $adapter = new Adapter();
        $adapter->sampleMethod1();
        $adapter->sampleMethod2();
    }
}

Client::main();