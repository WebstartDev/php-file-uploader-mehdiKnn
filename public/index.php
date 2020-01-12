<?php
/**
 * Created by PhpStorm.
 * User: Mehdi
 * Date: 06/01/2020
 * Time: 14:38
 */

require __DIR__ . '/../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../views');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

require('../controllers/upload_controller.php');
