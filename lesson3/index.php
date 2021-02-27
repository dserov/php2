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

try {
    $loader = new \Twig\Loader\FilesystemLoader('theme');
    $twig = new \Twig\Environment($loader);


    if (@$_GET['t']) {
        echo $twig->render('detail.html', [
            'image' => str_replace(THUMBNAIL_DIR, '', $_GET['t'])
            ]);
        die();
    }

    $photos = [];
    $files = scandir('foto' . DS . THUMBNAIL_DIR);
    foreach ($files as $file) {
        if (substr($file, 0, 1) === '.') {
            continue;
        }
        $photos[] = 'foto' . DS . THUMBNAIL_DIR . $file;
    }
    echo $twig->render('list.html', [
        'images' => $photos,
        'img_width' => THUMBNAIL_WIDTH,
        'img_height' => THUMBNAIL_HEIGHT,
        ]);

} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
