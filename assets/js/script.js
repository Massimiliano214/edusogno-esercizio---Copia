const passwords = document.querySelectorAll(".toggle_password");
const toggles = document.querySelectorAll(".toggle_button");

function myToggle() {
    passwords.forEach((password) => {
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    });
}

toggles.forEach((toggle) => {
    toggle.addEventListener("click", myToggle);
});

window.onload = function () {
    const urlParams = new URLSearchParams(window.location.search);
    const showAlert = urlParams.get('show_alert');
    const mailAlert = urlParams.get('mail_alert');
    const passAlert = urlParams.get('pass_alert');

    if (showAlert === 'true') {

        console.log('showAlert:', showAlert);
        alert("Registrazione avvenuta con successo");

    }
    if (mailAlert === 'true') {

        console.log('mailAlert:', mailAlert);
        alert("eMail inviata con successo!");

    }

    if (passAlert === 'true') {

        console.log('passAlert:', passAlert);
        alert("Password resettata con successo!");

    }
};




