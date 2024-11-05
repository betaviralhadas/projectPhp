<?php

function connexion()
{ //funçao de conexao. dbname é o nome da base de dados a utilizar
    $conexion = new PDO('mysql:host=localhost;dbname=project', 'root', "");
    return $conexion;
}

function login()
{
    if (isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $conexion = connexion();
        $requete = "SELECT * FROM `names` WHERE email=? and password=?"; //name e password- buscar na base de dados
        $execution = $conexion->prepare($requete);
        $execution->execute(array($email, $password));
        /*if ($execution->fetch()) {
            echo "utilisateur existent";
        } else {
            echo "utilisateur inexistent";
        }*/
        $executionFetch = $execution->fetch();
        if ($executionFetch) {
            header("Location:./vue/dashboard.php?id=" . $executionFetch["id"] . "&name=" . $executionFetch["firstName"]); //id da tabela names- para mostrar o id da pexoa. e no caminho adicionar ?id= |e mostra a id e o nome na barra de navegaçao
        } else {
            echo "utilisateur inexistent";
            header("Location:./vue/signUp.php"); //dirige para a pg de inscriçao
        }
    }
}

function signUp()
{
    if (isset($_POST["enter"])) {
        $firstName = $_POST["name"];
        $lastName = $_POST["lastName"];
        $birthday = $_POST["birthday"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $conexion = connexion();
        $requete = "INSERT INTO `names`(`email`, `firstName`, `lastName`, `birthday`, `password`) VALUES (?,?,?,?,?)";
        $execution = $conexion->prepare($requete);
        //a execuçao tem de tar na ordem da BD
        $execution->bindParam(1, $email);
        $execution->bindParam(2, $firstName);
        $execution->bindParam(3, $lastName);
        $execution->bindParam(4, $birthday);
        $execution->bindParam(5, $password);
        $execution->execute();
        //para derecionar o novo utilizador ao dashboard, senao o novo utilizador tinha k fazer login para entrar 
        $requete2 = "SELECT * FROM `names` WHERE email=? and password=?";
        $execution2 = $conexion->prepare($requete2);
        $execution2->execute(array($email, $password));
        $executionFetch = $execution2->fetch();
        if ($executionFetch) {
            header("Location:./dashboard.php?id=" . $executionFetch["id"]); //id da tabela names- para mostrar o id da pexoa. e no caminho adicionar ?id=
        } else {
            echo "remplissez toutes les champs";
        }
    }
}
