<?php
require_once './vendor/autoload.php';
$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'MainPageController');
Router::get('logout', 'MainPageController');

Router::get('login', 'SecurityController');
Router::get('register', 'SecurityController');

Router::get('profile', 'UserController');

Router::get('quiz', 'QuizController');
Router::get('quizes', 'QuizController');
Router::get('newquiz', 'QuizController');

Router::get('makeroom', 'GameController');
Router::get('room', 'GameController');

Router::post('profileEdit', 'UserController');
Router::post('getQuestions', "QuizController");
Router::post('addQuiz', "QuizController");
Router::post('getQuizes', "QuizController");

Router::run($path);
