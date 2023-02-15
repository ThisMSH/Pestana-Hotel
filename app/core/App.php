<?php
class App {
    protected $controller = "HomeController";
    protected $method = "index";
    protected $parameters = [];

    public function __construct() {
        $this->prepareURL();
        $this->rend();
    }

    // extract the controller, the action or method, and the parameters
    // return void
    private function prepareURL() {
        if (isset($_GET["url"])) {
            $url = trim($_GET["url"], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);

            // define the controller
            $this->controller = isset($url[0]) ? ucwords($url[0]) . "Controller" : "HomeController";

            // define the action or method
            $this->method = isset($url[1]) ? $url[1] : "index";

            // unset first and second value of the array $url
            unset($url[0], $url[1]);

            $this->parameters = !empty($url) ? array_values($url) : [];
        }
    }

    private function rend() {
        if(class_exists($this->controller)) {
            $this->controller = new $this->controller;

            if(method_exists($this->controller, $this->method)) {
                call_user_func_array([$this->controller, $this->method], $this->parameters);
            }else {
                Controller::load("404");
            }
        }else {
            Controller::load("404");
        }
    }
}