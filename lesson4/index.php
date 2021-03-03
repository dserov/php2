<?php
/**
 * Created by PhpStorm.
 * User: MegaVolt
 * Date: 27.02.2021
 * Time: 10:54
 */

function my_class_loader ($class) {
    include 'classes' . DIRECTORY_SEPARATOR . $class . '.class.php';
};
spl_autoload_register('my_class_loader');

include '../vendor/autoload.php';

try {
    $loader = new \Twig\Loader\FilesystemLoader('theme');
    $twig = new \Twig\Environment($loader);

    $rows = DB::getInstance()->QueryMany("SELECT * FROM log ORDER BY id LIMIT 0, 25");

    echo $twig->render('list.html', [
        'rows' => $rows
        ]);
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
