<?php

namespace App\Controller;

class _404 extends \Core\Controller {
    
    public function __construct() {
        
    }
    
    public function index() {
        $message = [
            'type' => 'error',
            'title' => '404 Not Found',
            'content' => 'Such resourse isn\'t found',
        ];
        require_once './App/View/Index.php';
    }
    
}