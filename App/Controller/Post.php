<?php

namespace App\Controller;

class Post extends \Core\Controller {
    
    public function get( $id = null ) {
        if ($id) $this -> getById( $id );
        else $this -> getAll();
    }
    
    private function getAll() {
        $posts = $this -> model -> getAll() ?? [];
        require_once './App/View/PostAll.php';
    }
    
    private function getById( $id ) {
        $post = $this -> model -> getById( $id ) ?? [];
        require_once './App/View/PostById.php';
    }
    
    public function create() {
        $verify = function( $ctx ) {
            [
                'CURRENT_ROLE' => $CURRENT_ROLE,
                'CURRENT_USER_ID' => $CURRENT_USER_ID,
            ] = $ctx;
            return ( in_array($CURRENT_ROLE, [1, 2]) );
        };
        
        $success = function( $ctx ) {
            $post = [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'user_id' => $ctx['CURRENT_USER_ID'],
            ];
            $message = $this -> model -> post( $post );
            require_once './App/View/PostAll.php';
        };
        
        Auth::width_rights($verify, $success);
    }
    
    public function update( $id ) {
        ['user_id' => $user_id] = $this -> model -> getById( $id );
        $user_id = (int)$user_id;
        
        
        $verify = function( $ctx ) use ($user_id) {
            [
                'CURRENT_ROLE' => $CURRENT_ROLE,
                'CURRENT_USER_ID' => $CURRENT_USER_ID,
            ] = $ctx;
            var_dump($CURRENT_USER_ID);
            var_dump($user_id);
            return ( ($CURRENT_ROLE === 2) || ($CURRENT_ROLE === 1 && $CURRENT_USER_ID === $user_id) );
        };
        
        $success = function( $ctx ) use ($id) {
            $post = [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'id' => $id,
            ];
            if (!$_POST['submit']) {
                $post = $this -> model -> getById( $id ) ?? [];
                require_once './App/View/PostUpdate.php';
            } else {
                $message = $this -> model -> update( $post );
                require_once './App/View/Index.php';
            }
            
        };
        
        Auth::width_rights($verify, $success);
    }
    
}