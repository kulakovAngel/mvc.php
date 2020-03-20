<?php

namespace App\Model;

class User extends \Core\Model {
    
//    public function getAll() {
//        $stmt = $this -> db -> prepare("SELECT * FROM {$this -> table}");
//        $stmt -> execute();
//        while($row = $stmt -> fetch()) {
//            print_r( $row );
//        }
//    }
    
    public function post( $fields ) {
        $stmt = $this -> db -> prepare("SELECT * FROM {$this -> table} WHERE name = :login");
        $stmt -> execute([
            'login' => $fields['login'],
        ]);
        $response = $stmt -> fetch();
        if ($response) return [
            'type' => 'error',
            'title' => 'Sign In Error',
            'content' => 'Such user is already exists',
        ];
        else {
            $stmt = $this -> db -> prepare("INSERT INTO {$this -> table} (name, password) VALUES (:login, :password)");
            $stmt -> execute($fields);
            return [
                'type' => 'success',
                'title' => 'Sign In Success',
                'content' => 'Now you can log in',
            ];
        }
    }
    
    public function verify( $fields ) {
        $stmt = $this -> db -> prepare("SELECT * FROM {$this -> table} WHERE name = :login AND password = :password");
        $stmt -> execute( $fields );
        
        $response = $stmt -> fetch();
        
        return $response;
    }
    
}