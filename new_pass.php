<?php

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["mail"])) {

        $resetMail = $_GET["mail"];
    } else {
        echo "Parametri invalidi.";
        exit;
    }

?>

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
            <h2>Crea nuova Password</h2> </br>
        </div>


        <div class="info_user">
            <form action="CRUD/new_pass.php" method="POST">

            <input type="hidden" name="token" value="<?php echo $resetMail; ?>">

                <label for="new_pass">
                    <h4 class="title">Inserisci la nuova password</h4>
                </label>

                <div class="text_style">
                    <input id="new_pass" name="new_pass" class="my_input" type="passw" placeholder="*****">
                </div>

                <div class="my_login">
                    <button type="submit" class="login_bt">Cambia Password</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>