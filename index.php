<?php
    require_once './vendor/autoload.php';
    require 'Router.php';

    $path = trim($_SERVER['REQUEST_URI'], '/');
    $path = parse_url( $path, PHP_URL_PATH);
    
    Router::get('', 'MainPageController');
    Router::get('login', 'SecurityController');
    Router::get('register', 'SecurityController');
    Router::get('profile', 'UserController');
    
    Router::run($path);  