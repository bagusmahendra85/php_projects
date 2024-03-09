<?php 

class App {
  protected $controller = 'Home';
  protected $method = 'index';
  protected $params = [];

  public function __construct()
  {
    $url = $this -> parseURL();
    
  }

  public function parseURL()
  {
    if (isset($_GET["url"])) {
      // remove slash "/" from the end of URL
      $url = rtrim($_GET["url"], '/');
      // sanitize url from malicious input
      $url = filter_var($url, FILTER_SANITIZE_URL);
      // map url into array
      $url = explode('/', $url);
      return $url;
    }
  }
}