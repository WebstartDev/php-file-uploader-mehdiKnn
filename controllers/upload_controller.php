<?php
/**
 * Created by PhpStorm.
 * User: Mehdi
 * Date: 09/01/2020
 * Time: 15:03
 */

require_once('../models/upload.php');

if (empty($_FILES)){
    echo $twig->render('form.html');
}else{
    $uploader = new uploader;
    $uploader->setFileData($_FILES['file']);
    $uploader->setStoreName($_POST['filename'] . '.' . $uploader->getFileExtension());
    $uploader->upload();

    echo $twig->render('form.html',[
        'status'=>$uploader->error,
        'imageName'=>$uploader->filename,
        ]);
}
