<?php

namespace App\Controller;

class User extends \Core\Controller {
    
    public function get( $id = null ) {
        if ($id) $this -> getById( $id );
        else $this -> getAll();
    }
    
    private function getAll() {
        $verify = function( $params ) use($id) {
            [
                'CURRENT_ROLE' => $CURRENT_ROLE,
                'CURRENT_USER_ID' => $CURRENT_USER_ID,
            ] = $params;
            return ( in_array($CURRENT_ROLE, [2]) );
        };
        
        Auth::width_rights($verify, function() {
            
            $users = $this -> model -> getAll();
            require_once './App/View/UserAll.php';
            
        });
    }
    
    private function getById( $id ) {
        $id = (int) $id;
        $verify = function( $params ) use($id) {
            [
                'CURRENT_ROLE' => $CURRENT_ROLE,
                'CURRENT_USER_ID' => $CURRENT_USER_ID,
            ] = $params;
            return ( ($CURRENT_ROLE === 2) || ($CURRENT_ROLE === 1 && $CURRENT_USER_ID === $id) );
        };
        
        $success = function() use($id) {
            $user = $this -> model -> getById( $id );
            require_once './App/View/UserById.php';
        };
        
        Auth::width_rights($verify, $success);
    }
    
}