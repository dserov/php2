<?php
/**
 * Created by PhpStorm.
 * User: MegaVolt
 * Date: 27.02.2021
 * Time: 10:54
 */

define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']);
define('WEB_ROOT', '');
define('DS', DIRECTORY_SEPARATOR);

define('THUMBNAIL_DIR', 'thumb' . DIRECTORY_SEPARATOR);
define('THUMBNAIL_WIDTH', 128);
define('THUMBNAIL_HEIGHT', 128);

include '../vendor/autoload.php';

function my_class_loader ($class) {
    include 'classes' . DIRECTORY_SEPARATOR . $class . '.class.php';
};
spl_autoload_register('my_class_loader');

try {
    $loader = new \Twig\Loader\FilesystemLoader('theme');
    $twig = new \Twig\Environment($loader);

    if (@$_GET['t']) {
        echo $twig->render('detail.html', [
            'image' => str_replace(THUMBNAIL_DIR, '', $_GET['t'])
            ]);
        die();
    }

    $thumbnails = [];
    $rows = DB::getInstance()->QueryMany("SELECT * FROM pictures ORDER BY product_id, id desc");
    foreach ($rows as $row) {
        $thumbnails[] = [
            'path' => str_replace(DIRECTORY_SEPARATOR, '/', $row['path']) . $row['name'],
            'thumb' => str_replace(DIRECTORY_SEPARATOR, '/', $row['path'] . THUMBNAIL_DIR) . $row['name']];
    }

    echo $twig->render('list.html', [
        'images' => $thumbnails,
        'img_width' => THUMBNAIL_WIDTH,
        'img_height' => THUMBNAIL_HEIGHT,
        ]);

} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
