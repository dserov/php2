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
    $limitFrom = 0;
    $limitCount = 25;

    if (isset($_GET['from'])) {
        $limitFrom = intval($_GET['from']);
    }

    $rows = DB::getInstance()->QueryMany(
        sprintf("SELECT * FROM log ORDER BY id LIMIT %d,%d", $limitFrom, $limitCount)
    );

    // отправим уже отрендереннeую верстку
    $loader = new \Twig\Loader\FilesystemLoader('theme');
    $twig = new \Twig\Environment($loader);
    $html = $twig->render('log_details.html', [
        'rows' => $rows
    ]);

    Http::response(200, ['html' => $html]);
} catch (Exception $e) {
    Http::response(400, ['html' => $e->getMessage()]);
}
