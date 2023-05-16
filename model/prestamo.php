<?php

namespace Model;

include_once "conexion.php";

class Prestamos
{
    public $id;
    public $codigo;
    public $fechaRetiro;
    public $fechaEntrega;
    public $idLibro;
    public $idCliente;
    public $estado;
    public $con; //* Objeto conexion

    public function __construct()
    {
        $this->con = new \Conexion();
    }

    public function create()
    {
        try {
            $request = $this->con->getCon()->prepare("INSERT INTO Prestamo VALUES (null, :codigo, :fechaRegistro, :fechaEntrega)");
            $request->execute();
            return "creado";
        } catch (PDOExeption $err) {
            return "Error al crear" . $err->getMessage();
        }
    }
}