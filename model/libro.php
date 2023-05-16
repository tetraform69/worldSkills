<?php

namespace Model;

include_once "conexion.php";

class Libro
{
    public $id;
    public $titulo;
    public $autor;
    public $isbn;
    public $genero = "novela";
    public $añoPublicacion;
    public $con; //* Objeto conexion

    public function __construct()
    {
        $this->con = new \Conexion();
    }

    public function create()
    {
        try {
            $request = $this->con->getCon()->prepare("INSERT INTO libros (titulo, isbn, genero, yearpublicacion) VALUES (:titulo, :isbn, :genero, :añoPublicacion)");
            $request->bindParam(':titulo', $this->titulo);
            $request->bindParam(':isbn', $this->isbn);
            $request->bindParam(':genero', $this->genero);
            $request->bindParam(':añoPublicacion', $this->añoPublicacion);
            $request->execute();
            return "creado";
        } catch (PDOExeption $err) {
            return "Error al crear" . $err->getMessage();
        }
    }

    
}