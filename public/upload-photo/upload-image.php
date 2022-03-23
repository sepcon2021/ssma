<?php

class UploadImage
{

  function uploadImageWeb($file_photo)
  {



    $temporal   = $file_photo['image_file']['tmp_name'];
    $nombre     = $file_photo['image_file']['name'];

    if ($file_photo['image_file']['type'] == 'image/jpeg'  || $file_photo['image_file']['type'] == 'image/jpg') {
      $original   = imagecreatefromjpeg($temporal);
    } else {

      if ($file_photo['image_file']['type'] == 'image/png') {
        $original   = imagecreatefrompng($temporal);
      } else {
        die('public/img/noimagen.jpg');
      }
    }

    $ancho_original  = imagesx($original);
    $alto_original  = imagesy($original);

    //crear el lienzo vacio 520*400
    $ancho_nuevo   = 520;
    $alto_nuevo    = 400; //round($ancho_nuevo * $alto_original / $ancho_original);

    $copia = imagecreatetruecolor($ancho_nuevo, $alto_nuevo);

    //copiar original -> copia
    imagecopyresampled($copia, $original, 0, 0, 0, 0, $ancho_nuevo, 400, $ancho_original, $alto_original);


    //limipamos el nombre de la foto
    $find = array(" ");
    $replace = array("");
    $arr = $nombre;
    $nombre = str_replace($find, $replace, $arr);


    //exportar guardar imagen
    imagejpeg($copia, "public/photos/" . $nombre, 50);

    //elimina los datos temporales
    imagedestroy($original);
    imagedestroy($copia);

    return $nombre;
  }


  function uploadImageWebPopUp($file_photo)
  {
    $temporal   = $file_photo['image_file2']['tmp_name'];
    $nombre     = $file_photo['image_file2']['name'];



    if ($file_photo['image_file2']['type'] == 'image/jpeg' || $file_photo['image_file2']['type'] == 'image/jpg') {
      $original   = imagecreatefromjpeg($temporal);
    } else {
      if ($file_photo['image_file2']['type'] == 'image/png') {
        $original   = imagecreatefrompng($temporal);
      } else {
        die('1');
      }
    }






    $ancho_original  = imagesx($original);
    $alto_original  = imagesy($original);

    //crear el lienzo vacio 520*400
    $ancho_nuevo   = 520;
    $alto_nuevo    = 400; //round($ancho_nuevo * $alto_original / $ancho_original);

    $copia = imagecreatetruecolor($ancho_nuevo, $alto_nuevo);

    //copiar original -> copia
    imagecopyresampled($copia, $original, 0, 0, 0, 0, $ancho_nuevo, 400, $ancho_original, $alto_original);

    $nombre = preg_replace('/\s+/', '-', $nombre);

    //exportar guardar imagen
    imagejpeg($copia, "public/photos/" . $nombre, 50);

    //elimina los datos temporales
    imagedestroy($original);
    imagedestroy($copia);

    return  $nombre;
  }

  function uploadImageApp($image, $image_name)
  {

    $fecha_image = new DateTime();

    $outputfile = '';

    if (strlen($image) > 1) {

      $base64_string = $image;


      //limipamos el nombre de la foto
      $find = array(" ");
      $replace = array("");
      $arr = $image_name;
      $image_name = str_replace($find, $replace, $arr);

      $outputfile = "public/photos/" . $fecha_image->getTimestamp() . $image_name;
      //save as image.jpg in uploads/ folder

      $filehandler = fopen($outputfile, 'wb');
      //file open with "w" mode treat as text file
      //file open with "wb" mode treat as binary file

      fwrite($filehandler, base64_decode($base64_string));
      // we could add validation here with ensuring count($data)>1

      // clean up the file resource
      fclose($filehandler);

      $outputfile = $fecha_image->getTimestamp() . $image_name . ",";
    }

    return $outputfile;
  }

  function uploadImageGeneral($fileArray)
  {

    $listaEvidencia = '';


    $uploadDir = 'public/photos/';
    $allowTypes = array('pdf', 'doc', 'docx', 'xlsx', 'jpg', 'png', 'jpeg');

    $fileNames = array_filter($fileArray['name']);

    if (!empty($fileNames)) {
      foreach ($fileArray['name'] as $key => $val) {
        // File upload path  
        $fecha_image = new DateTime();

        $fileName = basename($fileArray['name'][$key]);
        $oficialName = $fecha_image->getTimestamp();
        $fileName =  $oficialName . $this->getExtensionPhoto($fileName);

        $targetFilePath = $uploadDir .  $oficialName . $this->getExtensionPhoto($fileName);

        // Check whether file type is valid  
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        if (in_array($fileType, $allowTypes)) {
          // Upload file to server  
          if (move_uploaded_file($fileArray["tmp_name"][$key], $targetFilePath)) {

            //Convert PNG to JPG
            if ($this->isPhotoPng($fileName)) {
              $image = imagecreatefrompng($targetFilePath);
              imagejpeg($image, $uploadDir . $oficialName . '.jpg', 70);
              imagedestroy($image);
            }
            $listaEvidencia .= ($fileName . ',');
          }
        }
      }
    }
    return $listaEvidencia;
  }

  function getExtensionPhoto($data)
  {
    $extension = "";

    // Test if string contains the word 
    if (strpos($data, ".jpg") !== false) {
      $extension = ".jpg";
    }
    if (strpos($data, ".png") !== false) {
      $extension = ".png";
    }
    if (strpos($data, ".jpeg") !== false) {
      $extension = ".jpeg";
    }
    return $extension;
  }

  function isPhotoPng($data)
  {
    $result = false;

    if (strpos($data, ".png") !== false) {
      $result = true;
    }
    return $result;
  }


  function guardarArchivosGeneral($filesArr)
  {

    $listaEvidencia = '';

    $uploadDir = 'public/file/';
    $allowTypes = array('pdf', 'doc', 'docx', 'xlsx', 'jpg', 'png', 'jpeg');

    $fileNames = array_filter($filesArr['name']);

    // Upload file 
    if (!empty($fileNames)) {
      foreach ($filesArr['name'] as $key => $val) {
        // File upload path  

        $fileName = basename($filesArr['name'][$key]);
        $targetFilePath = $uploadDir . $fileName;


        // Check whether file type is valid  
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        if (in_array($fileType, $allowTypes)) {
          // Upload file to server  
          if (move_uploaded_file($filesArr["tmp_name"][$key], $targetFilePath)) {

            $listaEvidencia .= $fileName . ',';
            //array_push($listaEvidencia, $fileName);
          } else {
            echo  'Sorry, there was an error uploading your file.';
          }
        } else {
          echo 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.';
        }
      }
    }

    return $listaEvidencia;
  }




  function saveFileExcel($filesArray)
  {

    $listaEvidencia = array();

    $uploadDir = 'public/file/';
    $allowTypes = array('pdf', 'doc', 'docx', 'xlsx', 'jpg', 'png', 'jpeg');

    $fileNames = array_filter($filesArray['name']);

    // Upload file 
    if (!empty($fileNames)) {
      foreach ($filesArray['name'] as $key => $val) {
        // File upload path  

        $fecha_image = new DateTime();

        $fileName = basename($filesArray['name'][$key]);
        $oficialName = $fecha_image->getTimestamp();
        $fileName =  $oficialName . '.xlsx';

        $targetFilePath = $uploadDir .  $oficialName . '.xlsx';




        // Check whether file type is valid  
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        if (in_array($fileType, $allowTypes)) {
          // Upload file to server  
          if (move_uploaded_file($filesArray["tmp_name"][$key], $targetFilePath)) {

            //$listaEvidencia .= $fileName . ',';
            array_push($listaEvidencia, $fileName);
            //array_push($listaEvidencia, $fileName);
          } else {
            echo  'Sorry, there was an error uploading your file.';
          }
        } else {
          echo 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.';
        }
      }
    }

    return $listaEvidencia;
  }
}