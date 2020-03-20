<?php

namespace Core;

abstract class Controller {
    
    protected $model;
    
    public function __construct( $model = null ) {
        //название модели: или переданное, или по названию контроллера
        $model_name = 'App\\Model\\' . (
            $model ?? array_pop( explode('\\', get_class($this)) )
        );
        $this -> model = new $model_name();
    }
    
    public function index() {
        $message = [
            'type' => 'error',
            'title' => 'No such method',
            'content' => "Метод <b>INDEX</b> контроллера <b>" . get_class($this) . "</b> еще не реализован! Вызван get().",
        ];
        $this -> get();
        require_once './App/View/Index.php';
    }
    
    public function get() {
    }
    
    public function create() {
    }
    
    public function update( $id ) {
    }
    
    public function delete() {
    }
    
    public function __call($name, $params) {
        $message['type'] = 'error';
        $message['title'] = 'No such method';
        $message['content'] = "Контроллер <b>" . get_class($this) . "</b> не имеет метода <u><i>'$name'</i></u>!<br>(Вызван с параметрами: " . implode(', ', $params). ")";
        require_once './App/View/Index.php';
    }
}