<?php

class EvaluacionEntity
{
  public int $idGroup;
  public string $idUsuario;
  public string $nombre;
  public string $descripcion;
  public string $puestoEvaluador;
  public string $puestoEvaluado;
  public int $disponible;


  function __construct($idGroup, $idUsuario, $nombre, $descripcion, $puestoEvaluador, $puestoEvaluado)
  {
    $this->idGroup = $idGroup;
    $this->idUsuario = $idUsuario;
    $this->nombre = $nombre;
    $this->descripcion = $nombre;
    $this->puestoEvaluado = $puestoEvaluado;
    $this->puestoEvaluador = $puestoEvaluador;
    $this->descripcion = $descripcion;
  }
}