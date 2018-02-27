<?php

namespace App\Core;

class Router
{
  /**
   * All registered $routes
   *
   * @var array
   */
  public $routes = [
    'GET' => [],
    'POST' => []
  ];

  /**
   * Load the routes file.
   *
   * @param  string $file
   */
  public static function load($file)
  {
    $router = new static;
    require $file;
    return $router;
  }

  /**
   * Register a GET route.
   *
   * @param  string $uri
   * @param  string $controller
   */
  public function get($uri, $controller)
  {
    $this->routes['GET'][$uri] = $controller;
  }

  /**
   * Register a POST route.
   *
   * @param  string $uri
   * @param  string $controller
   */
  public function post($uri, $controller)
  {
    $this->routes['POST'][$uri] = $controller;
  }

  /**
   * Load the request URI and controller method
   *
   * @param  string $uri
   * @param  string $requestType
   */
  public function direct($uri, $requestType)
  {
    if (array_key_exists($uri, $this->routes[$requestType])) {
      return $this->callAction(
        ...explode('@', $this->routes[$requestType][$uri])
      );
    }

    throw new Exception('No route defined for this uri');
  }

  /**
   * Load and call the controller action.
   *
   * @param  string $controller
   * @param  string $action
   */
  protected function callAction($controller, $action)
  {
    $controller = "App\\Controllers\\{$controller}";
    $controller = new $controller;

    if (! method_exists($controller, $action)) {
       throw new Expection("{$controller} does not respond to the {$action} action.");
    }

    return $controller->$action();
  }
}
