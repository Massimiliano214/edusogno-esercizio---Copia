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
            <h2>Aggiungi evento</h2> </br>
        </div>
        
        <div class="info_user">

            <form action="CRUD/add_event.php" method="post" id="edit_events">
        
                <input type="hidden" name="event_id">

                <label for="name_event">
                    <h4 class="title">Nome Evento</h4>
                </label>
                <div class="text_style">
                    <input id="name_event" name="name_event" class="my_input" type="text" placeholder="Matematica">
                </div>

                <label for="date_event">
                    <h4 class="title">Data evento</h4>
                </label>
                <div class="text_style">
                    <input id="date_event" name="date_event" class="my_input" type="text" placeholder="2023-10-18 10:12">
                </div>

                <label for="mail_event">
                    <h4 class="title">inserisci l'e-mail dei partecipanti</h4>
                </label>
                <div class="text_style">
                    <input id="mail_event" name="mail_event" class="my_input" type="text" placeholder="name@example.com,name2@example.com">
                </div>

                <div class="my_login">
                    <button type="submit" class="login_bt">Aggiungi</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>