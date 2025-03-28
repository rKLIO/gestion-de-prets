<?php
// Charger le middleware et l'autoloader
require_once __DIR__ . '\..\Middlewares\AuthMiddleware.php';

// Définir les routes dans un tableau associatif
$routes = [
    '/Connexion' => 'AuthController@loginPage',
    '/Accueil'   => 'EquipmentsController@homePage',
    '/Mes-locations' => 'MyloansController@myloansPage',
];

// Vérifier si la route demandée existe
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Utilisation de parse_url pour obtenir la path sans la query string


// Si la route existe dans le tableau
if (array_key_exists($requestUri, $routes)) {

    if ($requestUri !== "/Connexion") {
        // Appliquer le middleware avant de continuer (vérifie si l'utilisateur est authentifié)
        AuthMiddleware::checkAuth();
    }

    // Diviser le contrôleur et la méthode pour la route
    list($controller, $method) = explode('@', $routes[$requestUri]);

    // Charger le fichier du contrôleur
    require_once __DIR__ ."\../Controllers/$controller.php";

    // Appeler la méthode du contrôleur
    (new $controller)->$method();

} else {
    // Si la route n'existe pas, afficher une erreur 404
    echo "404 - Page not found";
}
