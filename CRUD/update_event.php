<?php
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once 'db_connection.php';
    require_once '../Models/Event.php';
    require_once '../phpmailer/src/Exception.php';
    require_once '../phpmailer/src/PHPMailer.php';
    require_once '../phpmailer/src/SMTP.php';

    // Check id
    if (isset($_POST['event_id']) && is_numeric($_POST['event_id'])) {
        $eventID = $_POST['event_id'];
        $newEventName = $_POST['name_event'];
        $newDate = $_POST['date_event'];
        $newEmail = $_POST['mail_event'];

        // used sql code
        $stmt = $pdo->prepare("UPDATE eventi SET nome_evento = :newEventName, data_evento = :newDate, attendees = :newEmail WHERE id = :id");
        $stmt->bindParam(':newEventName', $newEventName, PDO::PARAM_STR);
        $stmt->bindParam(':newDate', $newDate, PDO::PARAM_STR);
        $stmt->bindParam(':newEmail', $newEmail, PDO::PARAM_STR);
        $stmt->bindParam(':id', $eventID, PDO::PARAM_INT);

        if ($stmt->execute()) {

            $mail_list = explode(',', $newEmail);
        
            $mail = new PHPMailer(true);
        
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'fanizzamassimiliano@gmail.com';
            $mail->Password = 'ejnr umnv eaxn iybp';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
        
            $mail->setFrom('fanizzamassimiliano@gmail.com');
        
            foreach ($mail_list as $user_mail) {
                //cycle for every mail
                $mail->addAddress(trim($user_mail));
                $mail->isHTML(true);  
                $mail->Subject = "Aggiornamento: Modifica evento";
                $mail->Body = "E' stato modificato un evento a cui partecipi";
            
                $mail->send();

                $mail->ClearAllRecipients();
    
            }
            

            require_once 'backend_controllers.php';
        } else {
            echo "Error updating event.";
        }
    } else {
        echo "Errore durante la modifica dell'evento.";
    }

?>
