<?php

    session_start();
    $session_duration = 5;

    // Vérifier si un horodatage de session existe
    if (isset($_SESSION['last_activity'])) {
        // Vérifier si la session a expiré
        if (time() - $_SESSION['last_activity'] > $session_duration) {
            // La session a expiré, on la détruit
            session_unset();
            session_destroy();
            header('Location: /Connexion'); // Rediriger vers la page de login
            exit();
        }
    }
    $_SESSION['last_activity'] = time();
    class AuthMiddleware {
        public static function checkAuth() {
            if (!isset($_SESSION['user'])) {
                header('Location: /Connexion');
                exit();
            }
        }
}

