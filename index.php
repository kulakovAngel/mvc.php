<?php
declare(strict_types=1);
//session_name('ses');
session_start(); // сессия всегда должна присутствовать, поэтому объявляем ее в самом начале в точке входа

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});


class FrontController {
//  
//  private $controller;
//  private $method;
//  private $params;
    
    public function __construct() {
        
        $route = mb_strtolower($_SERVER['REQUEST_URI']);
        $route_arr = explode('/', $route);
        
        if (!$route_arr[0]) array_shift($route_arr);
        if (!$route_arr[ count($route_arr) - 1 ]) array_pop($route_arr);
        
        if (!$route_arr) {
            
            $controllerName = 'App\\Controller\\' . 'Index';
            $methodName = 'index';
            $params = [];
            
        } elseif (!$route_arr[0]) {
            
            $controllerName = 'App\\Controller\\' . '_404';
            $methodName = 'index';
            $params = [];
            
        } else {
            
            if ( in_array($route_arr[0], ['auth']) ) {
                $controllerName = 'App\\Controller\\' . ucfirst($route_arr[0]);
            } else {
                $controllerName = 'App\\Controller\\' . mb_substr( ucfirst($route_arr[0]), 0, -1 );
            }
            
            $methodName = $route_arr[1] ?? 'index';
            $params = $route_arr[2];
            
        }
        
        if (!file_exists($controllerName.'.php')) {
            $controllerName = 'App\\Controller\\' . '_404';
            $methodName = 'index';
            $params = [];
        }
        
        $controller = new $controllerName();
        
        $controller -> $methodName( $params );//$methodName();
    }
}



$f = new FrontController();