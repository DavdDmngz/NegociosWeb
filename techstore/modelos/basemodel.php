<?php
require_once 'configuraciones/database.php';

class BaseModel {
    protected $db;

    public function __construct() {
        $this->db = BaseDatos::conectar();
    }
}
?>
