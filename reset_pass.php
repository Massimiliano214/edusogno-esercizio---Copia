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
            <h2>Recupero Password</h2> </br>
        </div>


        <div class="info_user">
            <form action="CRUD/reset_pass.php" method="POST">

                <label for="mail">
                    <h4 class="title">inserisci l'e-mail</h4>
                </label>

                <div class="text_style">
                    <input id="mail" name="mail" class="my_input" type="text" placeholder="name@example.com">
                </div>

                <div class="my_login">
                    <button type="submit" class="login_bt">Recupera</button>
                </div>
            </form>
        </div>
    </main>
    <script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>