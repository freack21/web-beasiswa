<?php
class App
{
  protected $controller = 'BeasiswaController';
  protected $method = 'index';
  protected $params = [];

  public function __construct()
  {
    $url = $this->parseURL();

    require_once __DIR__ . '/../app/controllers/' . $this->controller . '.php';
    $this->controller = new $this->controller;

    if (isset($url[0])) {
      if (method_exists($this->controller, $url[0])) {
        $this->method = $url[0];
        unset($url[0]);
      }
    }

    $this->params = $url ? array_values($url) : [];

    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  public function parseURL()
  {
    if (isset($_GET['url'])) {
      return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
    }
  }
}
