<?php

namespace App\Model;

class Post extends \Core\Model {
    
    public function getAll() {
        $stmt = $this -> db -> prepare(
            "SELECT posts.id, posts.title, posts.content, users.name
            FROM {$this -> table}
            INNER JOIN users
            ON posts.user_id = users.id"
        );
        $stmt -> execute();
        while($row = $stmt -> fetch()) {
            $response[] = $row;
        }
        return $response;
    }
    
    public function getById( $id ) {
        $stmt = $this -> db -> prepare(
            "SELECT posts.user_id, posts.id, posts.title, posts.content, users.name
            FROM {$this -> table}
            INNER JOIN users
            ON posts.user_id = users.id
            WHERE posts.id = :id"
        );
        $stmt -> execute( ['id' => $id] );
        $response = $stmt -> fetch();
        return $response;
    }
    
//CREATE TABLE posts (
//id INT PRIMARY KEY AUTO_INCREMENT,
//user_id INT UNSIGNED,
//title VARCHAR(256),
//content TEXT,
//FOREIGN KEY (user_id) REFERENCES users(id)
//);
    
    public function post( $fields ) {
        $stmt = $this -> db -> prepare("INSERT INTO {$this -> table} (title, content, user_id) VALUES (:title, :content, :user_id)");
        $stmt -> execute( $fields );
        return [
            'type' => 'success',
            'title' => 'Success',
            'content' => 'Post added successfully',
        ];
    }
    
    public function update( $fields ) {
        $stmt = $this -> db -> prepare("UPDATE {$this -> table} SET title = :title, content = :content WHERE id = :id");
        $stmt -> execute( $fields );
        return [
            'type' => 'success',
            'title' => 'Success',
            'content' => 'Post updated successfully',
        ];
    }
    
}