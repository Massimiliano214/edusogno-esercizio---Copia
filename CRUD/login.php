<?php
    
    require_once 'db_connection.php';
    
    $mailSelected = $_POST['login_mail'];
    $passwSelected = $_POST['login_password'];

    $query = "SELECT * FROM utenti WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $mailSelected);
    $stmt->execute();

    // check if user is found 
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {

        $hashedPassword = $user['password'];

        if (password_verify($passwSelected, $hashedPassword)) {

            //get personal events
            
            $personalEmail = $user['email'];
        
            $eventsQuery = "SELECT * FROM eventi WHERE attendees LIKE :email";
            $eventsStmt = $pdo->prepare($eventsQuery);
            
            $emailPattern = "%" . $personalEmail . "%";
            $eventsStmt->bindParam(':email', $emailPattern, PDO::PARAM_STR);

            $eventsStmt->execute();
        
            $events = $eventsStmt->fetchAll(PDO::FETCH_ASSOC);
        
            $eventsData = json_encode($events);
        
            // Redirect to personal_page
            $my_name = urlencode($user['nome']);
            $redirectUrl = "../personal_page.php?name=" . $my_name . "&events=" . urlencode($eventsData);
            header("Location: $redirectUrl");
            exit;
        } else {
            // Password is incorrect
    
            echo '<script>alert("Credenziali errate"); window.location.href = "../index.php";</script>';
        }
    } else {
        // user not found

        echo '<script>alert("Credenziali errate"); window.location.href = "../index.php";</script>';
    }
    ?>

    