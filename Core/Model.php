<?php

namespace Core;

abstract class Model {
    
    protected $db;
    protected $table;
    
    public function __construct() {
        $host = 'localhost'; // адрес сервера
        $db_name = 'blog'; // имя базы данных
        $user = 'root'; // имя пользователя
        $password = ''; // пароль
        // получаем имя таблицы: namespace - (имя модели (User) + 's')
        $this -> table = mb_strtolower( array_pop( explode('\\', get_class($this) . 's') ) );
//        $this -> db = mysqli_connect($host, $user, $password, $database);
        $this -> db = new \PDO("mysql:host=$host;dbname=$db_name", $user, $password);
    }
    
    public function getAll() {
        $stmt = $this -> db -> prepare("SELECT * FROM {$this -> table}");
        $stmt -> execute();
        while($row = $stmt -> fetch()) {
            $response[] = $row;
        }
        return $response;
    }
    
    public function getById( $id ) {
//        $query = "SELECT * FROM users WHERE id = $id";
//        $result = mysqli_query($this -> db, $query);
//        while ($row = mysqli_fetch_assoc($result)) {
//            echo $row['name'];
//        }
        $stmt = $this -> db -> prepare("SELECT * FROM {$this -> table} WHERE id = :id");
        $stmt -> execute( ['id' => $id] );
        $response = $stmt -> fetch();
        return $response;
    }
    
//    public function post( $fields ) {
//        $stmt = $this -> db -> prepare("INSERT INTO {$this -> table} (name, password) VALUES (:login, :password)");
//        $stmt -> execute($fields);
//        
//        $stmt -> execute([
//            ':login' => $fields['login'],
//            ':password' => $fields['password'],
//        ]);
//        
//        return $stmt->rowCount();
//    }
}