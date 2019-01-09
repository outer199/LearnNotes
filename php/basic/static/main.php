<?php
/**
 * static
 * static 后期静态绑定
 */


class A 
{
    public static function who(){
        echo __CLASS__ . PHP_EOL;
    }

    public static function run(){
        echo get_called_class() . '调用了 run()' . PHP_EOL;
        // self::who();
        static::who();
    }
}

class B extends A
{
    public static function who(){
        echo __CLASS__ . PHP_EOL;
    }
}

A::run(); 
B::run();