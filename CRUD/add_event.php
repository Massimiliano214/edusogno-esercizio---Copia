<?php 

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once 'db_connection.php';
    require_once '../Models/Event.php';
    require_once '../phpmailer/src/Exception.php';
    require_once '../phpmailer/src/PHPMailer.php';
    require_once '../phpmailer/src/SMTP.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // get data from form
        $nomeEvento = $_POST['name_event'];
        $dataEvento = $_POST['date_event'];
        $emailEvento = $_POST['mail_event'];
    
        $event = new Event(null, $nomeEvento, $dataEvento, $emailEvento);
        // SQL code
        $stmt = $pdo->prepare("INSERT INTO eventi (nome_evento, data_evento, attendees) VALUES (:nomeEvento, :dataEvento, :emailEvento)");
        $stmt->bindParam(':nomeEvento', $nomeEvento, PDO::PARAM_STR);
        $stmt->bindParam(':dataEvento', $dataEvento, PDO::PARAM_STR);
        $stmt->bindParam(':emailEvento', $emailEvento, PDO::PARAM_STR);
        
        if ($stmt->execute()) {

            $mail_list = explode(',', $emailEvento);
        
            $mail = new PHPMailer(true);
        
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'fanizzamassimiliano@gmail.com';
            $mail->Password = 'ejnr umnv eaxn iybp';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
        
            $mail->setFrom('fanizzamassimiliano@gmail.com');
            
            // send email for each attendees
            foreach ($mail_list as $user_mail) {

                $mail->addAddress(trim($user_mail));
                $mail->isHTML(true);  
                $mail->Subject = "Aggiornamento: Nuovo evento";
                $mail->Body = "Hai un nuovo evento in cui dovrai partecipare";
            
                $mail->send();
                
                $mail->ClearAllRecipients();
            }

            require_once 'backend_controllers.php';

        } else {

            echo "Errore durante l'aggiunta dell'evento.";

        }
    }

    