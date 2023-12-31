<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../phpmailer/src/Exception.php';
    require '../phpmailer/src/PHPMailer.php';
    require '../phpmailer/src/SMTP.php';

    try {

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["mail"])) {
            $userEmail = $_POST["mail"];
        
            $mail = new PHPMailer(true);
        
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            
            //change the email with your google mail
            $mail->Username = '******@gmail.com';
            //change password with you app Password from google
            $mail->Password = '**** **** **** ****';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            
            //change the email with your google mail
            $mail->setFrom('******@gmail.com');
        
            $mail->addAddress($userEmail);
        
            $mail->isHTML(true);
        
            $mail->Subject = "Password Reset";
            
            $mail->Body = "Per resettare la Passwrord, clicca sul seguente link: http://localhost/edusogno-esercizio/new_pass.php?mail=$userEmail";
        
            $mail->send();
        
            header("Location: ../index.php?mail_alert=true");
            
        } else {
            echo "<script>
                alert('Errore');
                document.location.href = '../reset_pass.php';
            </script>";
        }
    } catch (Exception $e) {
        
        echo "<script>
            alert('Errore: " . $e->getMessage() . "');
            document.location.href = '../reset_pass.php';
        </script>";
    }
