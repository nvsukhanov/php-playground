<?php
require_once 'autoloader.php';
spl_autoload_register('my_custom_autoloader');

class Foo implements \HashMap\IHashable {
    private int $init;
    public function __construct(int $init)
    {
        $this->init = $init;
    }

    function getHash(): string|float
    {
        return $this->init;
    }
}

//$a = [1, 6, 3, 4, 5, 9];
//var_dump(\Basic\Sorters::bubble($a));

$hashMap = new \HashMap\HashMap();

$k1 = 'key-a';
$v1 = 'value-a';
$v11 = 'value-aa';

$hashMap->set($k1, $v1);
var_dump($k1, $hashMap->get($k1));
var_dump('noop', $hashMap->get('noop'));
$hashMap->delete($k1);
var_dump($k1, $hashMap->get($k1));
$hashMap->delete($k1);

$hashMap->set($k1, $v1);
$hashMap->set($k1, $v11);
var_dump($k1, $hashMap->get($k1));

$r = new Foo(90);
$rv = 'got it';
$r2 = new Foo(90);
$rv2 = 'got it 2';
$hashMap->set($r, $rv);
$hashMap->set($r2, $rv2);
var_dump($hashMap->get($r));
var_dump($hashMap->get($r2));
