<?php
require "./modeles/user.php";

//indica que o ficheiro login.php é a 1ºpagina da app
if (isset($_POST["login"])) { //nome do botao do formulario do ficheiro login.php
    login(); //funçao do ficheiro user.php
} else {
    require "./vue/login.php";
}
?>