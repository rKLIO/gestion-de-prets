<?php 

    class Database {
        private static $pdo = null;

        public static function getConnection () {
            require_once __DIR__ . "\..\../config/database.php";

            if (self::$pdo === null) {
                try {
                    self::$pdo = new PDO('mysql:host='.$hostname .';port=3307; dbname='.$dbname, $user, $password);
                    self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    die("Erreur de connexion : " . $e->getMessage());
                }
                
            }

            return self::$pdo;
        }

        public static function closeConnection () {
            self::$pdo = null;

        }

    }

?>

