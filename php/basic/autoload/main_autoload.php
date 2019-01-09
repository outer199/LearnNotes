<?php
// 自动加载
// include './test.php';

/**
 * __autolaod 自动加载函数, 懒加载
 * 缺点: 如果是多人合作项目, __autoload() 只能声明一次, 那么所有的自动加载逻辑都要写在这个函数中 ....
 * 7.2.0 版本将弃用 __autoload()
 * 由此----->出现了 spl_autoload_register()
 */
function __autoload($className)
{
    $path = './' . $className . '.php';
    if (file_exists($path)) {
        require $path;
    } else {
        die("The file {$path} not be found!");
    }
}

function main() {
    // test1();
    $auto = new Auto();
    $auto->run();
}

main();