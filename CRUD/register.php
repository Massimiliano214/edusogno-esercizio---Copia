<?php

    require_once 'db_connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // get user information from form
        $newName = $_POST['name_user'];
        $newSurname = $_POST['surname_user'];
        $newEmail = $_POST['register_mail'];
        $newPassword = $_POST['register_password'];
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        $emailExistsQuery = "SELECT COUNT(*) FROM utenti WHERE email = :email";
        $emailExistsStmt = $pdo->prepare($emailExistsQuery);
        $emailExistsStmt->bindParam(':email', $newEmail);
        $emailExistsStmt->execute();
        $emailExists = $emailExistsStmt->fetchColumn();

        // check email
        if ($emailExists) {
            echo "Email already exists. Please choose another one.";
        } elseif (empty($newEmail) && empty($newPassword)) {
            echo "<script>
                    alert('Registrazione Fallita');
                    document.location.href = '../registration.php';
                </script>";
        }else {
            // Insert the new user into the database
            $insertQuery = "INSERT INTO utenti (nome, cognome, email, password) VALUES (:name, :surname, :email, :password)";
            $insertStmt = $pdo->prepare($insertQuery);
            $insertStmt->bindParam(':name', $newName);
            $insertStmt->bindParam(':surname', $newSurname);
            $insertStmt->bindParam(':email', $newEmail);
            $insertStmt->bindParam(':password', $hashedPassword);

            if ($insertStmt->execute()) {
                header("Location: ../index.php?show_alert=true");
                exit;
            } else {
                echo "<script>
                    alert('Registrazione Fallita');
                    document.location.href = '../registration.php';
                </script>";
        }   }
    }
?>