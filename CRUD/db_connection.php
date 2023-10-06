<?php
    
    //database connection
    $hostname = '127.0.0.1';
    $username = 'root';
    $password = 'root';
    $database = 'db_edusogno';

    try {
        $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connessione Fallita: " . $e->getMessage());
    }
?>