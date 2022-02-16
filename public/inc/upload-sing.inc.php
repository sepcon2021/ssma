<?php
    require_once '../../config/config.php';

    session_start();

    if (array_key_exists('img',$_REQUEST)) {
  
        // convierte la imagen recibida en base64
        // Eliminamos los 22 primeros caracteres, que 
        // contienen el substring "data:image/png;base64,"


        $imgData = base64_decode(substr($_REQUEST['img'],22));


        $fecha = new DateTime();
        $fecha=$fecha->getTimestamp();
     
        $file = '../../firmas/'.$fecha.'.png';


        
        $url_bbdd = $fecha.'.png';


        // Path en donde se va a guardar la imagen
        // borrar primero la imagen si existía previamente
        if (file_exists($file)) { unlink($file); }

        // borrar primero la imagen si existía previamente
  


        // guarda en el fichero la imagen contenida en $imgData
        $fp = fopen($file, 'w');
        fwrite($fp, $imgData);
        fclose($fp);


        // guarda en el fichero la imagen contenida en $imgData
      


        echo  $url_bbdd;

    }
?>