<?php

use Classes\Controllers\MainPageController;
use Classes\Controllers\SecurityController;

class Router { 

  public static $routes;

  public static function get($url, $view) {
    self::$routes[$url] = $view;
  }

  public static function run ($url) {
    $action = explode("/", $url)[0];
    if (!array_key_exists($action, self::$routes)) {
      die("Wrong url!");
    }

    $controller = 'Classes\\Controllers\\'.self::$routes[$action];
    $object = new $controller;
    $action = $action ?: 'index';

    $object->$action();
  }
}