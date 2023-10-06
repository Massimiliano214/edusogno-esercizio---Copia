<?php

    // code to create tables of the database
    // link to use:
    // http://localhost/edusogno-esercizio/assets/migrations/migration.php
    require_once '../../CRUD/db_connection.php';
    
    $sqlFilePath = '../db/Migrations.sql';

    try {
        $sqlQueries = file_get_contents($sqlFilePath);

        $pdo->exec($sqlQueries);
        header("Location: ../../index.php");
    } catch (PDOException $e) {
        header("Location: ../../index.php");
    }
?>