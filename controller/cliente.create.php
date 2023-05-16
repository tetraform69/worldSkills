<?php
include_once ("../model/cliente.php");

$cliente = new Model\Cliente();

$cliente->nombre = $_POST['nombre'];
$cliente->apellido = $_POST['apellido'];
$cliente->telefono = $_POST['telefono'];
$cliente->correo = $_POST['correo'];
$cliente->direccion = $_POST['direccion'];

$result = $cliente->create();

echo json_encode($result);

unset($cliente);
unset($result);