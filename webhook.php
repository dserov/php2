<?php

/**
 * Created by PhpStorm.
 * User: MegaVolt
 * Date: 27.02.2021
 * Time: 13:14
 */

$data = file_get_contents("php://input");

ob_start();
echo $_SERVER['REQUEST_METHOD'] . PHP_EOL;
print_r(@$_GET);
print_r(@$_POST);
$content = ob_get_clean();

$old = file_get_contents('webhook.log');
$old = $old . PHP_EOL . date("d.m.Y H:i:s") . PHP_EOL .  $content . PHP_EOL . print_r(json_decode($data, true), true) . PHP_EOL . PHP_EOL;
file_put_contents('webhook.log', $old);
