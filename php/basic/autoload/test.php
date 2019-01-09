<?php

echo 'This is test.php!' . PHP_EOL;

function test1() {
    echo __file__ . ' ' . __FUNCTION__ . PHP_EOL;
}