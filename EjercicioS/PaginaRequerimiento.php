<?php
require_once 'ClaseDatosAspirante.php';


if ($_SERVER["REQUEST_METHOD"]=="POST"){

    $nombre=($_POST['nombre']);
    $apellido=($_POST['apellido']);
    $edad=($_POST['edad']);
    $documento=($_POST['documento']);
    $curso=($_POST['curso']);


    $aspirante=new aspirante($nombre,$apellido,$edad,$documento,$curso);
    $aspirante->imprimirvalores();

}


?>