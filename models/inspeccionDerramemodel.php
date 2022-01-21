<?php

class InspeccionDerrameModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($object){

        try {


            $conexion_bbdd = $this->db->connect();

            $query = $conexion_bbdd->prepare('INSERT INTO inspeccion_derrame (
            sede,
            id_area,
            dni_inspeccionado,
            dni_responsable,
            observacion,
            equipo_otros_uno,
            cantidad_otros_uno,
            equipo_otros_dos,
            cantidad_otros_dos,
            equipo_otros_tres,
            cantidad_otros_tres,
            equipo_otros_cuatro,
            cantidad_otros_cuatro,
            fecha
            )
            VALUES (
            :sede,
            :id_area,
            :dni_inspeccionado,
            :dni_responsable,
            :observacion,
            :equipo_otros_uno,
            :cantidad_otros_uno,
            :equipo_otros_dos,
            :cantidad_otros_dos,
            :equipo_otros_tres,
            :cantidad_otros_tres,
            :equipo_otros_cuatro,
            :cantidad_otros_cuatro,
            :fecha
            )');
            
            $query->execute([
                'sede' => $object['sede'],
                'id_area' => $object['id_area'],
                'dni_inspeccionado' => $object['dni_inspeccionado'],
                'dni_responsable' => $object['dni_responsable'],
                'observacion' => $object['observacion'],

                'equipo_otros_uno' => $object['equipo_otros_uno'],
                'cantidad_otros_uno' => $object['cantidad_otros_uno'],

                'equipo_otros_dos' => $object['equipo_otros_dos'],
                'cantidad_otros_dos' => $object['cantidad_otros_dos'],
                
                'equipo_otros_tres' => $object['equipo_otros_tres'],
                'cantidad_otros_tres' => $object['cantidad_otros_tres'],

                'equipo_otros_cuatro' => $object['equipo_otros_cuatro'],
                'cantidad_otros_cuatro' => $object['cantidad_otros_cuatro'],


                'fecha' => $object['fecha'],
            ]);
            
            $last_insert_id = $conexion_bbdd->lastInsertId();

            return $last_insert_id;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }


    public function insertDetalle($listaDetalle,$id)
    {
        try {

            $conexion_bbdd = $this->db->connect();

            $query = $conexion_bbdd->prepare('INSERT INTO inspeccion_derrame_detalle(
                    id_inspeccion_derrame ,
                    equipo,
                    bandeja_contencion ,
                    panos_absorventes ,
                    trapo_industrial,
                    bolsa_plastica,
                    pala,
                    pico,
                    salchicha_absorvente,
                    bolsa_propileno,
                    guantes_nitrilo,
                    respirador_media,
                    otros_uno ,
                    otros_dos ,
                    otros_tres ,
                    otros_cuatro 
                    )
            VALUES (
    :id_inspeccion_derrame ,
    :equipo,
    :bandeja_contencion ,
    :panos_absorventes ,
    :trapo_industrial,
    :bolsa_plastica,
    :pala,
    :pico,
    :salchicha_absorvente,
    :bolsa_propileno,
    :guantes_nitrilo,
    :respirador_media,
    :otros_uno ,
    :otros_dos ,
    :otros_tres ,
    :otros_cuatro 
                )');

            foreach($listaDetalle as $detalle) {
                
                $query->bindParam(':id_inspeccion_derrame', $id , PDO::PARAM_INT);
                $query->bindParam( ':equipo' , $detalle['equipo'], PDO::PARAM_STR); 
                $query->bindParam( ':bandeja_contencion' ,$detalle['bandeja_contencion'], PDO::PARAM_STR); 
                $query->bindParam( ':panos_absorventes' , $detalle['panos_absorventes'], PDO::PARAM_STR); 
                $query->bindParam( ':trapo_industrial',  $detalle['trapo_industrial'], PDO::PARAM_STR); 
                $query->bindParam( ':bolsa_plastica' , $detalle['bolsa_plastica'], PDO::PARAM_STR); 
                $query->bindParam( ':pala', $detalle['pala'], PDO::PARAM_STR); 
                $query->bindParam( ':pico', $detalle['pico'], PDO::PARAM_STR); 
                $query->bindParam( ':salchicha_absorvente', $detalle['salchicha_absorvente'], PDO::PARAM_STR); 
                $query->bindParam( ':bolsa_propileno', $detalle['bolsa_propileno'], PDO::PARAM_STR); 
                $query->bindParam( ':guantes_nitrilo', $detalle['guantes_nitrilo'], PDO::PARAM_STR); 
                $query->bindParam( ':respirador_media', $detalle['respirador_media'], PDO::PARAM_STR); 
                $query->bindParam( ':otros_uno',$detalle['otros_uno'], PDO::PARAM_STR); 
                $query->bindParam( ':otros_dos' , $detalle['otros_dos'], PDO::PARAM_STR); 
                $query->bindParam( ':otros_tres' , $detalle['otros_tres'], PDO::PARAM_STR); 
                $query->bindParam( ':otros_cuatro' , $detalle['otros_cuatro'], PDO::PARAM_STR);  
               
               
                $query->execute();
            }

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function insertDetalleMovil($listaDetalle,$id)
    {
        try {

            $conexion_bbdd = $this->db->connect();

            $query = $conexion_bbdd->prepare('INSERT INTO inspeccion_derrame_detalle(
                    id_inspeccion_derrame ,
                    equipo,
                    bandeja_contencion ,
                    panos_absorventes ,
                    trapo_industrial,
                    bolsa_plastica,
                    pala,
                    pico,
                    salchicha_absorvente,
                    bolsa_propileno,
                    guantes_nitrilo,
                    respirador_media,
                    otros_uno ,
                    otros_dos ,
                    otros_tres ,
                    otros_cuatro 
                    )
            VALUES (
    :id_inspeccion_derrame ,
    :equipo,
    :bandeja_contencion ,
    :panos_absorventes ,
    :trapo_industrial,
    :bolsa_plastica,
    :pala,
    :pico,
    :salchicha_absorvente,
    :bolsa_propileno,
    :guantes_nitrilo,
    :respirador_media,
    :otros_uno ,
    :otros_dos ,
    :otros_tres ,
    :otros_cuatro 
                )');

            foreach(json_decode($listaDetalle) as $detalle) {
                

                $query->bindParam(':id_inspeccion_derrame', $id , PDO::PARAM_INT);
                $query->bindParam( ':equipo' , $detalle->equipo, PDO::PARAM_STR); 
                $query->bindParam( ':bandeja_contencion' ,$detalle->bandeja_contencion, PDO::PARAM_STR); 
                $query->bindParam( ':panos_absorventes' , $detalle->panos_absorventes, PDO::PARAM_STR); 
                $query->bindParam( ':trapo_industrial',  $detalle->trapo_industrial, PDO::PARAM_STR); 
                $query->bindParam( ':bolsa_plastica' , $detalle->bolsa_plastica, PDO::PARAM_STR); 
                $query->bindParam( ':pala', $detalle->pala, PDO::PARAM_STR); 
                $query->bindParam( ':pico', $detalle->pico, PDO::PARAM_STR); 
                $query->bindParam( ':salchicha_absorvente', $detalle->salchicha_absorvente, PDO::PARAM_STR); 
                $query->bindParam( ':bolsa_propileno', $detalle->bolsa_propileno, PDO::PARAM_STR); 
                $query->bindParam( ':guantes_nitrilo', $detalle->guantes_nitrilo, PDO::PARAM_STR); 
                $query->bindParam( ':respirador_media', $detalle->respirador_media, PDO::PARAM_STR); 
                $query->bindParam( ':otros_uno',$detalle->otros_uno, PDO::PARAM_STR); 
                $query->bindParam( ':otros_dos' , $detalle->otros_dos, PDO::PARAM_STR); 
                $query->bindParam( ':otros_tres' , $detalle->otros_tres, PDO::PARAM_STR); 
                $query->bindParam( ':otros_cuatro' , $detalle->otros_cuatro, PDO::PARAM_STR);  
               
               
                $query->execute();
            }

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}