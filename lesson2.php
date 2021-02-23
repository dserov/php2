<?php
/**
 * Created by PhpStorm.
 * User: MegaVolt
 * Date: 24.02.2021
 * Time: 0:27
 */

spl_autoload_register(function ($name) {
    require_once "classes" . DIRECTORY_SEPARATOR . "$name.class.php";
});

$goodPiece1 = new PieceGood(1, "штучный товар 2", 123);
$goodPiece1->setQuantity(10);

$goodWeight1 = new WeigthGood(2, "весовой товар 1", 123);
$goodWeight1->setWeigth(5);

$goodDigital1 = new DigitalGood(3, "цифровой товар", 123);

echo "\nФинальная стоимость штучный - " . $goodPiece1->finalCost();
echo "\nДоход с продажи штучный - " . $goodPiece1->calcIncome();

echo "\nФинальная стоимость цифровой - " . $goodDigital1->finalCost();
echo "\nДоход с продажи цифровой - " . $goodDigital1->calcIncome();

echo "\nФинальная стоимость весовой - " . $goodWeight1->finalCost();
echo "\nДоход с продажи весовой - " . $goodWeight1->calcIncome();

