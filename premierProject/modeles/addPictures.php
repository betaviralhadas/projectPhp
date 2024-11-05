<?php
require_once '../modeles/user.php';//importar o ficheiro user, para poder reutilizar as funçoes

function addImages()
{
    if (isset($_POST["submit"])) {
        $conexion = connexion();//funçao do ficheiro user
        $img = $_FILES["img"];//name do input do formulario
        $title = $_POST["title"];
        $description = $_POST["description"];
        $idUser = $_GET["id"];
        //a requete vejo na BD, no sql e escolher o tipo de requete, e meter a requete entre aspas
        $requete = "INSERT INTO `pictures`(`userId`,`image`, `title`, `description`) VALUES (?,?,?,?)";
        $prepare = $conexion->prepare($requete);
        //meter pela ordem da bd
        $prepare->bindParam(1, $idUser);
        $prepare->bindParam(2, $img["name"]);
        $prepare->bindParam(3, $title);
        $prepare->bindParam(4, $description);
        $prepare->execute();
        move_uploaded_file($img["tmp_name"], "../images/" . $img["name"]); //registar a img no dossier loocal do projeto'images'
    }
}

function recupererImages()
{
    $conexion = connexion();
    $requete = "SELECT * FROM `pictures`";
    $execution = $conexion->query($requete);
    return $execution;
}
