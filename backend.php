<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edusogno</title>
    <link rel="stylesheet" type="text/css" href="./assets/styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link>
</head>

<body>
    <header>
        <div class="head_space">
            <img class="logo" src="assets/images/edusogno.jpg" alt="logo azienda">
        </div>
    </header>

    <main class="main_box">
        <div class="option">
            <h2>Ciao ADMIN ecco tutti gli eventi</h2> </br>

            <div class="add_events">
                <a href="new_event.php" class="login_bt my_a" id="green_bt">Aggiungi Evento</a>
            </div>
        </div>

        
            <?php
                if (isset($_GET['events'])) {
                    $eventsData = json_decode(urldecode($_GET['events']), true);
                    if ($eventsData) {
                        ?>
                        <div class="info_wrap">

                            

                            <?php
                                foreach ($eventsData as $event) {
                                    // Access event properties and display them
                                    $eventName = $event['nome_evento'];
                                    $eventDate = $event['data_evento'];
                                    $eventId = $event['id'];
                                    $eventAttendees = $event['attendees'];
                                    $mail_list = explode(',', $eventAttendees);
                                    ?>
                                    <div class="info_events">
                                        <h3 class="title"><?php echo $eventName; ?></h3>
                                        <h4 class="subtitle"><?php echo $eventDate; ?></h4>
                                        <h5 class="title">
                                            <?php 
                                                foreach ($mail_list as $user_mail) {
                                                    ?> <p> <?php
                                                    echo $user_mail; ?> 
                                                    </p></br> <?php
                                                }
                                            ?>
                                        </h5>

                                        <a href="edit_event.php?event_id=<?php echo $eventId ?>" class="login_bt edit_btn my_a">Modifica</a>
                                        <a href="CRUD/delete_event.php?event_id=<?php echo $eventId ?>" class="login_bt delete_btn my_a">Elimina</a>
                                    </div>
                                    <?php
                                }
                            ?>
                        </div>
                
                        <?php
                    } else {
                        echo 'Non partecipi a nessun evento';
                    }
                }
            ?>
        
    </main>
</body>

</html>