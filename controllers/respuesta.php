<?php

class Respuesta{

    function enviarRespuesta($insert){

        $return["state"] = false;
        $return["message"] = "Problemas en nuestros servicios";

        if ($insert) {
            $return["state"] = true;
            $return["message"] = "Envio exitoso";
        }

        header('Content-Type: application/json');
        // tell browser that its a json data
        return json_encode($return);
    }

    function enviarRespuestaLista($lista){

        $return["state"] = "false";
        $return["result"] = [];

        if (count($lista) > 0) {
            $return["state"] = "true";
            $return["result"] = $lista;
        }

        header('Content-Type: application/json');
        // tell browser that its a json data
        return json_encode($return);
    }

    function enviarRespuestaExcel($data){

        $return["state"] = "false";
        $return["result"] = [];

        if (strlen($data) > 0) {
            $return["state"] = "true";
            $return["result"] = $data;
        }

        header('Content-Type: application/json');
        // tell browser that its a json data
        return json_encode($return);
    }
}
?>