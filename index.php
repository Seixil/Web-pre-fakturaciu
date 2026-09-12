<?php
/**
 * Hlavný vstupný bod aplikácie
 */

session_start();

// Autoload tried
require_once __DIR__ . '/config/autoload.php';
require_once __DIR__ . '/config/database.php';

// Router
$request = $_SERVER['REQUEST_URI'];
$request = parse_url($request, PHP_URL_PATH);
$request = str_replace('/Web-pre-fakturaciu', '', $request);
$request = trim($request, '/');

if (empty($request)) {
    $request = 'home';
}

// Prevzatie požiadavky
$parts = explode('/', $request);
$controller = isset($parts[0]) ? $parts[0] : 'home';
$action = isset($parts[1]) ? $parts[1] : 'index';

// Kontrola prihlásenia
$auth = new \App\Core\Auth();
$isLoggedIn = $auth->isLoggedIn();

// Verejné stránky
$publicPages = ['home', 'login', 'register', 'contact'];

if (!$isLoggedIn && !in_array($controller, $publicPages)) {
    header('Location: /Web-pre-fakturaciu/login');
    exit;
}

// Routing
try {
    $controllerPath = "App\\Controllers\\" . ucfirst($controller) . "Controller";
    
    if (class_exists($controllerPath)) {
        $controllerObj = new $controllerPath();
        $method = $action . 'Action';
        
        if (method_exists($controllerObj, $method)) {
            $controllerObj->$method();
        } else {
            http_response_code(404);
            echo "Action not found: " . $action;
        }
    } else {
        http_response_code(404);
        echo "Controller not found: " . $controller;
    }
} catch (Exception $e) {
    http_response_code(500);
    echo "Error: " . $e->getMessage();
}
?>
