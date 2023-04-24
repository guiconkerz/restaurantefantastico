<?php
class Conexao {
    private static $instance = null;

    private function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $serverName = "localhost";
            $databaseName = "minhabasededados";
            $username = "seuUsuario";
            $password = "suaSenha";

            try {
                self::$instance = new PDO("sqlsrv:Server=$serverName;Database=$databaseName", $username, $password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Erro ao conectar com o SQL Server: " . $e->getMessage();
            }
        }

        return self::$instance;
    }
}