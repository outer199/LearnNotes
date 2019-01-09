<?php

/**
 * spl_autoload_register() 有三种注册方式
 *  bool spl_autoload_register ([ callable $autoload_function [, bool $throw = true [, bool $prepend = false ]]] )
 * 
 * 有三种注册方式:
 *  1. 直接注册函数 spl_autoload_register(函数名或者匿名函数)
 *  2. 注册类实例的方法: spl_autoload_register([类的实例, 方法名称])
 *  3. 注册类的静态方法: spl_autoload_register([类名称, 静态方法名称])
 */

 // 使用全局函数注册
 function myAutoload($className) {
    echo '使用全局函数自动加载!' . PHP_EOL;
    $path = './' . $className . '.php';
    if (file_exists($path)) {
        require($path);
    } else {
        die("The file {$path} is not found!");
    }
 }

//  spl_autoload_register('myAutoload');

 // 使用 类实例方法
 class MyAutoload
 {
     public function ownAutoload($className){
        echo '使用类实例方法自动加载!' . PHP_EOL;
        $path = './' . $className . '.php';
        if (file_exists($path)) {
            require($path);
        } else {
            die("The file {$path} is not found!");
        }
     }

     public static function staticOwnAutoload($className){
        echo '使用类静态方法自动加载!' . PHP_EOL;
        $path = './' . $className . '.php';
        if (file_exists($path)) {
            require($path);
        } else {
            die("The file {$path} is not found!");
        }
     }
 }

//  $myautoload = new MyAutoload();
//  spl_autoload_register([$myautoload, 'ownAutoload']);

spl_autoload_register(['MyAutoload', 'staticOwnAutoload']);

 $auto = new Auto();
 $auto->run();