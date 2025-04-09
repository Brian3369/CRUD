<?php
class Conexion {
    public function getPDO() {	    
        $servidor = "localhost";
        $usuario = "root";
        $contraseña = "3369";
        $baseName = "crub_php";

        try {
            $conexion = new PDO("mysql:host=$servidor;dbname=$baseName", $usuario, $contraseña);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }
    
}
?>