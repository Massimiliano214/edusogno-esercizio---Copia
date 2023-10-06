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
            <h2>Ciao

            <!-- php code -->
            <?php 
                if (isset($_GET['name'])) {
                    $userName = $_GET['name'];
                    echo htmlspecialchars($userName);
                } else {
                    echo 'Utente';
                }
            ?>

            ecco i tuoi eventi</h2> </br>
        </div>

        
            <?php
                if (isset($_GET['events'])) {
                    $eventsData = json_decode(urldecode($_GET['events']), true);
                    if ($eventsData) {
                        ?>
                        <div class="info_wrap">

                            <?php
                                foreach ($eventsData as $event) {
                                    
                                    // get event informations
                                    $eventName = $event['nome_evento'];
                                    $eventDate = $event['data_evento'];
                                    ?>
                                    <div class="info_events">
                                        <h3 class="title"><?php echo $eventName; ?></h3>
                                        <h4 class="subtitle"><?php echo $eventDate; ?></h4>
                                        
                                        <button type="submit" class="login_bt">Join</button>
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