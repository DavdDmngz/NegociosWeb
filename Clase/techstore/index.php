<?php

    require_once "config/basedatos.php";

    if (!isset($_GET['c'])) {
        require_once "controladores/inicio.controlador.php";
        $controlador = new ControladorInicio();
        call_user_func(array($controlador, "Inicio"));
    } else {
        $controlador = $_GET['c'];
        $nombreClase = "Controlador" . ucfirst($controlador); // Construye el nombre de la clase del controlador
        require_once "controladores/$controlador.controlador.php"; // Asegúrate de que el nombre del archivo coincida
        $controlador = new $nombreClase();
        $accion = isset($_GET['a']) ? $_GET['a'] : "login"; // Acción por defecto (por ejemplo, login)
        call_user_func(array($controlador, $accion));
    }
    

    