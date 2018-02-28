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

  public $controller = '';

  public $params = [];

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
    $this->match($uri, $requestType);

    if (array_key_exists($uri, $this->routes[$requestType])) {
      return $this->callAction(
        ...explode('@', $this->routes[$requestType][$uri])
      );
    }

    if ($this->controller !== '') {
      return $this->callAction(
        ...explode('@', $this->controller)
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

    return (!empty($this->params)) ? $controller->$action(array_values($this->params)[0]) : $controller->$action();
  }

  public function match($uri, $requestType)
  {
    foreach($this->routes[$requestType] as $route => $controller)
    {
      $uri = rtrim($uri, '/');
      $matches = explode('/', $uri);
      $route = rtrim($route, '/');

      if (preg_match_all('/{(.*?)}/', $route, $argument_keys)) {
        $argument_keys = $argument_keys[1];

        if(count($argument_keys) !== (count($matches) -1)) {
          continue;
        }

        $this->controller = $controller;

        foreach ($argument_keys as $key => $name) {
          if (isset($matches[$key+1])) {
            $this->params[$name] = $matches[$key+1];
          }
        }
      }
    }
  }
}
