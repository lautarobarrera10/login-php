<?php

class Database {
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host = 'localhost';
        $this->db = 'compras';
        $this->user = 'root';
        $this->password = 'PLautykpo12!n';
        $this->charset = 'utf8mb4';
    }

    function connect(){
        try {
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            $pdo = new PDO($connection, $this->user, $this->password, $options);
            return $pdo;  // Añadir esta línea para devolver la conexión PDO
        } catch (PDOException $e) {
            print_r('Error connection: ' . $e->getMessage());
        }
    }
}