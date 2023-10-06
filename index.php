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
            <h2>Hai già un account?</h2> </br>
        </div>

        <div class="info_user">
            <form action="CRUD/login.php" method="post" id="login_site">

                <label for="login_mail">
                    <h4 class="title">inserisci l'e-mail</h4>
                </label>

                <div class="text_style">
                    <input id="login_mail" name="login_mail" class="my_input" type="text" placeholder="name@example.com">
                </div>

                <label for="login_password">
                    <h4 class="title">inserisci la password</h4>
                </label>

                <div class="text_style my_flex">
                    <input name="login_password" class="my_input toggle_password" type="password" placeholder="Scrivila qui">
                    <i class="fa-solid fa-eye my_eye toggle_button"></i>
                </div>

                <div class="my_login">
                    <button type="submit" class="login_bt">Accedi</button>
                </div>
            </form>


            <h5 class="register_path">Non hai un profilo? <a class="my_link" href="registration.php">Registrati</a></h5>
            <h5 class="register_path reset_pass">Hai dimenticato la password? <a class="my_link" href="reset_pass.php">Recuperala</a></h5>
            
            <form action="CRUD/backend_controllers.php" method="POST">

                <h5 class="register_path reset_pass">Entra in modalità admin! <button type="submit" class="my_link">Entra</button></h5>

                
            </form>
            
        </div>
    </main>
    <script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>