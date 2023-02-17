<?php
    class Router {
        protected $routes=[
            "GET"=>[],
            "POST"=>[]
        ];
        
        public function register($routes) {
            $this->routes=$routes;
        }

        public function get($uri, $controller) {
            $this->routes["GET"][$uri]=$controller;
        }

        public function post($uri, $controller) {
            $this->routes["POST"][$uri]=$controller;
        }
        
        public static function load ($filename) {
            $router = new Router;
            require $filename;
            return $router;
        }

        public function direct($uri, $method) {
            
            // dd();

            if(array_key_exists($uri, $this->routes[$method])) {

                $explosion=explode("@", $this->routes[$method][$uri]);          
                // return dd($this->routes[$method][$uri]);
                // dd($explosion);
                $this->callAction($explosion[0], $explosion[1]);

            } else {
                die("404 not found.");
            }
            
        }

        public function callAction($class, $method) {
            // dd($method);
            $class = new $class;
            $class->$method();
        }

    }
    
?>