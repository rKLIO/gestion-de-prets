<?php 
    require_once __DIR__ . "\..\models\UserModel.php";
    if (!isset($_SESSION)) {
        session_start();
    }


    class AuthController {
        

        public function loginPage() {
            require_once __DIR__ . "\../views/login.php";
            $this->login();
            
        }


        public function login() {
            echo "Demande de connexion";
            // $identifier = $_POST["identifier"];
            // $user_password = $_POST["password"];

            $identifier = "alice.dupont@email.com";
            $user_password = "admin";

            if (UserModel::checkCredentials($identifier, $user_password)) {

                $_SESSION['user'] = "LePtitBiscuit"; # A retirer plus tard
                header('Location: /Accueil');
                exit();
                echo "oui champion";

            } else {
                echo "malheuresement non";
            }


        }

        public function register() {
            echo "Demande d'inscription";       
        }

        public function logout() {
            echo "Déconnexion effectué";
        }


    }


?>