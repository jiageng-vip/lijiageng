<?php
/**
 * factory.php
 *
 * User: Jiageng
 * Describe 设计模式-工厂模式
 *
 * Date: 2020/4/14
 * Time: 3:58 下午
 */

//----------------------------------------------------------------------------------------------------------------------
//------------------------简单工厂又叫静态工厂方法模式，这样理解可以确定，简单工厂模式是通过一个静态方法创建对象的-----------------
//----------------------------------------------------------------------------------------------------------------------

interface ICar
{
    public function run();
}

class BMWCar implements ICar
{
    public function run()
    {
        // TODO: Implement run() method.
        echo 'bmw run';
    }
}

class AuDiCar implements ICar
{
    public function run()
    {
        // TODO: Implement run() method.
        echo 'Audi run';
    }
}

class FctorySimple
{
    public static function creatBmw()
    {
        return new BMWCar();
    }

    public static function creatAuDi()
    {
        return new AuDiCar();
    }

    public static function creatCar($type)
    {
        switch ($type) {
            case 'bmw':
                return new BMWCar();
            case 'audi':
                return new AuDiCar();
            default:
                throw new Exception('type error');
        }
    }
}

$carFactory = FctorySimple::creatCar('bmw');
$carFactory1 = FctorySimple::creatCar('bmw');
var_dump($carFactory);
var_dump($carFactory1);
$carFactory->run();

//----------------------------------------------------------------------------------------------------------------------
//------工厂方法模式：定义一个创建对象的接口，让子类决定哪个类实例化。 他可以解决简单工厂模式中的封闭开放原则问题。------------------
//----------------------------------------------------------------------------------------------------------------------

interface Car
{
    public function run();
}

class BmwICar implements Car
{
    public function run()
    {
        // TODO: Implement run() method.
        echo 'bmw run';
    }
}

class AuDiICar implements Car
{
    public function run()
    {
        // TODO: Implement run() method.
        echo 'Audi run';
    }
}

interface createCar
{
    public function create();
}

class BmwFactory implements createCar
{
    public function create()
    {
        // TODO: Implement create() method.
        return new BMWCar();
    }
}

class AudiFactory implements createCar
{
    public function create()
    {
        // TODO: Implement create() method.
        return new AuDiCar();
    }
}

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//------抽象工厂：提供一个创建一系列相关或相互依赖对象的接口。注意：这里和工厂方法的区别是：一系列，而工厂方法则是一个。那么，我们是否就可以想到在接口create里再增加创建“一系列”对象的方法呢？------------------
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

interface Cars
{
    public function run();
}

class WhiteBmwCar implements Cars
{
    public function run()
    {
        // TODO: Implement run() method.
        echo 'white bmw car run';
    }
}

class BlackBmwCar implements Cars
{
    public function run()
    {
        // TODO: Implement run() method.
        echo 'black bmw car run';
    }
}

class WhiteAudiCar implements Cars
{
    public function run()
    {
        // TODO: Implement run() method.
        echo 'white audi car run';
    }
}

class BlackAudiCar implements Cars
{
    public function run()
    {
        // TODO: Implement run() method.
        echo 'black audi car run';
    }
}

interface ICarCreate
{
    public function createBmw();

    public function createAudi();
}

class WhiteCarFactory implements ICarCreate
{
    public function createBmw()
    {
        // TODO: Implement createBmw() method.
        return new WhiteBmwCar();
    }

    public function createAudi()
    {
        // TODO: Implement createAudi() method.
        return new WhiteAudiCar();
    }
}

class BlackCarFactory implements ICarCreate
{
    public function createBmw()
    {
        // TODO: Implement createBmw() method.
        return new BlackBmwCar();
    }

    public function createAudi()
    {
        // TODO: Implement createAudi() method.
        return new BlackAudiCar();
    }
}

