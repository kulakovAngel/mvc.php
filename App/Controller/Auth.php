<?php

namespace App\Controller;

class Auth extends \Core\Controller {
    
    
    public const ROLES = ['NO' => 0, 'USER' => 1, 'ADMIN' => 2];
    
    
    public function __construct() {
        parent::__construct('user');
    }
    
    
    public function index() {
        require_once './App/View/Auth.php';
    }
    
    
    public function signin() {
        $user['login'] = $_POST['login'];
        $user['password'] = $_POST['password'];
        $message = $this -> model -> post( $user );
//        header('Location: /users/getAll'); //перенаправление
        require_once './App/View/Auth.php';
    }
    
    
    public function login() {
        $user['login'] = $_POST['login'];
        $user['password'] = $_POST['password'];
        
        $user = $this -> model -> verify( $user );
        
        if ( $user ) {
            $_SESSION['user'] = $user;
            
            $message = [
                'type' => 'success',
                'title' => 'Logged in successfully',
                'content' => 'Hello, ' . $user['name'],
            ];
        } else {
            $_SESSION['user'] = null;
            
            $message = [
                'type' => 'error',
                'title' => 'Authorization failure',
                'content' => 'Login or password is invalid',
            ];
        }
        require_once './App/View/Auth.php';
    }
    
    
    public function logout() {
        $_SESSION['user'] = null;
        require_once './App/View/Auth.php';
//        $users = $this -> model -> getAll();
//        require_once './App/View/UserAll.php';
    }
    
    
    public static function width_rights( callable $verify, callable $success, callable $fail = null ) {
        
        if ( !$fail ) $fail = function() {
            $message = [
                'type' => 'error',
                'title' => '403 Forbidden',
                'content' => 'Not enough rights',
            ];
            require_once './App/View/Index.php';
        };
        
        $CURRENT_ROLE = (int) $_SESSION['user']['rights'];
        $CURRENT_USER_ID = (int) $_SESSION['user']['id'];
        
        $ctx = [
            'CURRENT_ROLE' => $CURRENT_ROLE,
            'CURRENT_USER_ID' => $CURRENT_USER_ID,
        ];
        
        if ( $verify($ctx) ) $success($ctx);
        else $fail($ctx);
    }
}


//$verify = function( $params ) {
//            [
//                'CURRENT_ROLE' => $CURRENT_ROLE,
//                'ROLES' => $ROLES,
//                'CURRENT_USER_ID' => $CURRENT_USER_ID,
//                'ID' => $ID,
//            ] = $params;
//            return ( in_array($CURRENT_ROLE, $ROLES) && ($CURRENT_USER_ID === $ID) );
//        };