<?php
    
    require_once 'db_connection.php';

    require_once '../Models/Event.php';

    // Check id
    if (isset($_GET['event_id']) && is_numeric($_GET['event_id'])) {
        $eventID = $_GET['event_id'];

        // SQL code
        $stmt = $pdo->prepare("DELETE FROM eventi WHERE id = :id");
        $stmt->bindParam(':id', $eventID, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            require_once 'backend_controllers.php';
        } else {
            echo "Error deleting event.";
        }
    } else {
        echo "Invalid event ID.";
    }