<?php

namespace Model;

include_once "conexion.php";

class Cliente
{
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $correo;
    public $direccion;
    public $con; //* Objeto conexion

    public function __construct()
    {
        $this->con = new \Conexion();
    }

    public function create()
    {
        try {
            $request = $this->con->getCon()->prepare("INSERT INTO clientes VALUES (null, :nombre, :apellido, :telefono, :correo, :direccion)");
            $request->bindParam(':nombre', $this->nombre);
            $request->bindParam(':apellido', $this->apellido);
            $request->bindParam(':telefono', $this->telefono);
            $request->bindParam(':correo', $this->correo);
            $request->bindParam(':direccion', $this->telefono);
            $request->execute();
            return "creado";
        } catch (PDOExeption $err) {
            return "Error al crear" . $err->getMessage();
        }
    }
}