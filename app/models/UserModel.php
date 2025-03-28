<?php 
    require __DIR__ . "\..\core\Database.php";

    class UserModel {

        private static $db;

        public static function checkCredentials($identifier, $password) {

            self::$db = Database::getConnection();
            $stmt = self::$db->prepare("SELECT * FROM users WHERE email = :identifier");
            $stmt-> bindValue(':identifier', $identifier);
            $stmt->execute();
            $user = $stmt->fetch();

            # Si l'utilisateur existe et que le mot de passe est correct
            if ($user && password_verify($password, $user['password'])) {
                return $user; # Renvoie l'utilisateur trouvé
            }
    
            return null; # Aucune correspondance
            
        }

        public function addUser() {
            
        }
        
        public function addToCart() {
            
        }

        public function changeUserInfo() {
            
        }
    }

?>