<?php

/**
 * Created by PhpStorm.
 * User: Mehdi
 * Date: 09/01/2020
 * Time: 14:55
 */
class uploader
{
    public $filename;
    public $error;

    function upload()
    {
        if ($this->error === null) {
            $uploads_dir = '../uploads';
            $tmp_name = $_FILES['file']["tmp_name"];
            $name = $this->filename;
            move_uploaded_file($tmp_name, "$uploads_dir/$name");
            $this->error = "File uploaded";
        }
    }

    function setFileData($image)
    {
        $allowed_extensions = ['jpg', 'jpeg', 'gif', 'png'];
        $ext = $this->getFileExtension();
        if ($image['size'] > 1000000000) {
            $this->error = "File too big";
        } else if (!in_array($ext, $allowed_extensions)) {
            $this->error = "File not an image";
        }
    }

    function setStoreName($name)
    {
        if ($this->error === null) {
            $dir = scandir('../uploads');
            if (!empty($_POST['filename'])) {
                if (in_array($name, $dir)) {
                    $this->error = "File already exist";
                } else {
                    $this->filename = $name;
                }

            } else {
                if (in_array($_FILES['file']['name'], $dir)) {
                    $this->error = "File already exist";
                } else {
                    $this->filename = $_FILES['file']['name'];
                }
            }
        }
    }

    function getFileExtension()
    {
        $path = $_FILES['file']['name'];
        return $ext = pathinfo($path, PATHINFO_EXTENSION);
    }

}

// taille + extension