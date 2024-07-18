<?php

class Usuario {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function registrarUsuario($email, $password) {
        try {
            // Preparar la consulta SQL para insertar un nuevo usuario
            $sql = "INSERT INTO usuarios (email, password) VALUES (:email, :password)";
            $stmt = $this->db->prepare($sql);

            // Bind de los parámetros
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            // Ejecutar la consulta
            $stmt->execute();

            // Comprobar si se insertó correctamente (opcional)
            if ($stmt->rowCount() > 0) {
                return true; // Éxito
            } else {
                return false; // Falló la inserción
            }
        } catch (PDOException $e) {
            echo "Error al registrar usuario: " . $e->getMessage();
            return false;
        }
    }
}

?>
