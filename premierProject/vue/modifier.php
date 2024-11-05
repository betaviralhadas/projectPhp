<?php
require_once '../modeles/modifierImg.php';
modifierImages();
?>

<form method="post" enctype="multipart/form-data">
            <label>modifier img</label>
            <input type="file" name="img">
            <label for="title">titre:</label>
            <input type="text" name="title" placeholder="Enter your title">
            <label for="description">description:</label>
            <input type="text" name="description" placeholder="Enter your description">
            <input type="submit" value="save" name="submit">
        </form>