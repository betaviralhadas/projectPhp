<?php
require_once '../modeles/user.php';//importar o ficheiro user, para poder reutilizar as funçoes

function modifierImages()
{
    if (isset($_POST["submit"])) {
        $conexion = connexion();//funçao do ficheiro user
        $img = $_FILES["img"];//name do input do formulario
        $title = $_POST["title"];
        $description = $_POST["description"];
        $idImg = $_GET["id"];
        //a requete vejo na BD, no sql e escolher o tipo de requete, e meter a requete entre aspas
        $requete = "UPDATE `pictures` SET `image`=?,`title`=?,`description`=? WHERE id=?";
        $prepare = $conexion->prepare($requete);
        //meter pela ordem da bd
        $prepare->bindParam(1, $img["name"]);
        $prepare->bindParam(2, $title);      
        $prepare->bindParam(3, $description);
        $prepare->bindParam(4, $idImg);
        $prepare->execute();
        move_uploaded_file($img["tmp_name"], "../images/" . $img["name"]); //registar a img no dossier loocal do projeto'images'
    }
}