<?php
class BaseDatos {
    private static $host = 'localhost';
    private static $db = 'techstore';
    private static $usuario = 'root';
    private static $contrasena = '1234';
    private static $caracteres = 'utf8';

    public static function conectar(){
        try{
            $conexion = 'mysql:host=' . self::$host . ";port=3308;dbname=". self::$db . ";charset=" . self::$caracteres;
            $opciones = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,   //PDO es una interfaz de datos de php, puede conectarse con diferentes tipos de base de datos
                PDO::ATTR_EMULATE_PREPARES => FALSE,
            ];
            $pdo = new PDO($conexion, self::$usuario, self::$contrasena, $opciones); 
            return $pdo;
        }catch (PDOException $e){
            print_r('Error de conexion: ' . $e->getMessage());
        }
    }
}
?>
