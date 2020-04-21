<?php
/**
 * observer.php
 *
 * User: lijiageng
 * Describe 设计模式-观察者模式
 *
 * Date: 2020/4/14
 * Time: 7:19 下午
 */

// 抽象通知者
abstract class Subject
{
    private $observers = [];

    public function Attach(Observer $observer)
    {
        array_push($this->observers, $observer);
    }

    public function Detach(Observer $observer)
    {
        foreach ($this->observers as $k => $v) {
            if ($v == $observer) {
                unset($this->observers[$k]);
            }
        }
    }

    public function Notify()
    {
        foreach ($this->observers as $item) {
            $item->update();
        }
    }
}

// 具体的通知者
class ConcreteSubject extends Subject
{
    public $subject_state;
}

// 抽象观察者
abstract class Observer
{
    public abstract function update();
}

// 具体观察者
class ConcreteObserver extends Observer
{
    private $name;
    private $observerState;
    public $subject;

    public function __construct(ConcreteSubject $concreteSubject, $name)
    {
        $this->name = $name;
        $this->subject = $concreteSubject;
    }

    public function update()
    {
        // TODO: Implement update() method.
        $this->observerState = $this->subject->subject_state;
        echo "观察者" . $this->name . "的新状态是:" . $this->observerState . "<br/>";
    }
}

$_subject = new ConcreteSubject();

$zhangsan = new ConcreteObserver($_subject, '张三');
$lisi = new ConcreteObserver($_subject, '李四');

$_subject->Attach($zhangsan);
$_subject->Attach($lisi);
$_subject->subject_state = '孙总回来了';
$_subject->Notify();
