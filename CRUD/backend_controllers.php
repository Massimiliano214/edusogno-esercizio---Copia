<?php
    
    require_once 'db_connection.php';

   
    $eventsQuery = "SELECT * FROM eventi";
    $eventsStmt = $pdo->prepare($eventsQuery);

    $eventsStmt->execute();

    $events = $eventsStmt->fetchAll(PDO::FETCH_ASSOC);

    if ($events) {
        // Encode events
        $eventsData = json_encode($events);
        $encodedEventsData = urlencode($eventsData);

        $redirectUrl = "../backend.php?events=" . $encodedEventsData;
        header("Location: $redirectUrl");
    } else {
        header("Location: ../backend.php");
    }
        
        
