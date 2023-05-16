<?php
include_once ("../model/libro.php");

$libro = new Model\Libro();

$libro->titulo = $_POST['titulo'];
$libro->isbn = $_POST['ISBN'];
$libro->genero = $_POST['genero'];
$libro->añoPublicacion = $_POST['añoPublicacion'];

$result = $libro->create();

echo json_encode($result);

unset($libro);
unset($result);