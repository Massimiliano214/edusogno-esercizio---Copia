<?php
    require_once 'db_connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["token"]) && isset($_POST["new_pass"])) {
        
        $resetMail = $_POST["token"];
        $newPassword = $_POST["new_pass"];

        $newPasswordHash = password_hash($newPassword, PASSWORD_BCRYPT);

        $stmt = $pdo->prepare("UPDATE utenti SET password = ? WHERE email = ?");

        if ($stmt) {
            $stmt->bindParam(1, $newPasswordHash);
            $stmt->bindParam(2, $resetMail);

            if ($stmt->execute()) {

                header("Location: ../index.php?pass_alert=true");

            } else {

                echo "<script>
                    alert('Errore');
                    document.location.href = '../index.php';
                </script>";

            }
        } else {

            echo "<script>
                    alert('Errore');
                    document.location.href = '../index.php';
                </script>";

        }

        // Close the PDO connection
        $pdo = null;
    } else {
        echo "Invalid request.";
    }
