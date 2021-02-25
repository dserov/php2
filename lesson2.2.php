<?php
/**
 * Created by PhpStorm.
 * User: MegaVolt
 * Date: 24.02.2021
 * Time: 0:43
 */

trait Singleton
{
    static $_instance;

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    public function sayHello()
    {
        echo 'Hello' . PHP_EOL;
    }

    private function __construct()
    {
        echo "создан новый экземпляр!\n";
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}

class DB
{
    use Singleton;
}

$db1 = DB::getInstance();
$db1->sayHello();

$db2 = DB::getInstance();
$db2->sayHello();

var_dump($db1 === $db2); // true, поскольку экземпляр один и тот же

// будет ошибка. приватный конструктор
$db3 = new DB();
$db3->sayHello();
