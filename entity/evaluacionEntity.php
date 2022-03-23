<?php

class EvaluacionEntity
{
  public int $idGroup;
  public string $idUsuario;
  public string $nombre;
  public string $descripcion;
  public string $puestoObservado;
  public string $puestoEvaluado;
  public int $disponible;


  function __construct($idGroup, $idUsuario, $nombre, $descripcion, $puestoObservado, $puestoEvaluado)
  {
    $this->idGroup = $idGroup;
    $this->idUsuario = $idUsuario;
    $this->nombre = $nombre;
    $this->descripcion = $nombre;
    $this->puestoEvaluado = $puestoEvaluado;
    $this->puestoObservado = $puestoObservado;
    $this->descripcion = $descripcion;
  }
}