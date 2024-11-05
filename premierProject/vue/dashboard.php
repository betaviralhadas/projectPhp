<?php
require_once '../modeles/addPictures.php';
addImages();
$AfficherImages = recupererImages(); //é melhor meter a funçao d recuperar as img numa variavel, para ser + facil de utilizar no boucle
?>

<html>

<head>
    <link rel="stylesheet" href="./styles/dashboard.css" type="text/css">
</head>

<body>
    <main>
        <a href="../index.php">logout</a>
        <p>welcome</p>

        <form method="post" enctype="multipart/form-data">
            <label>insert img</label>
            <input type="file" name="img">
            <label for="title">titre:</label>
            <input type="text" name="title" placeholder="Enter your title">
            <label for="description">description:</label>
            <input type="text" name="description" placeholder="Enter your description">
            <input type="submit" value="save" name="submit">
        </form>
        <div>
            <?php
            //para mostrar no navegador, as imagens inseridas 
            foreach ($AfficherImages as $element) { //a variavel element é criada para ser utilizada para ir buscar os elementos na BD
                echo "<div class=''>";
                echo "<img src='../images/$element[image]'>"; //o k tá no croche é como tá na BD
                echo "<h2> $element[title]</h2>";
                echo "<p> $element[description]</p>";
                echo "<a href='./modifier.php?id=$element[id]'>Modifier</a>";
                echo "</div>";
            }
            ?>
        </div>
    </main>
</body>

</html>