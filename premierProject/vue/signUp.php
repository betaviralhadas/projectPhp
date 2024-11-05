<?php
//vai buscar a funçao signup quando clicado no botao do formulario
require_once '../modeles/user.php';
signUp();
?>

<h1>Create a new account</h1>
<h2>It’s quick and easy.</h2>

<form method='post'>
    <p>
        <label for="name">First Name:</label>
        <input type="text" name="name" placeholder="Enter your name">
    </p>
    <p>
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastName" placeholder="Enter your last name">
    </p>
    <p>
        <label for="birthday">Birthday Date:</label>
        <input type="text" name="birthday" placeholder="Enter your birthday date">
    </p>
    <p>
        <label for="email">Email:</label>
        <input type="text" name="email" placeholder="Enter your email">
    </p>
    <p>
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Enter your password">
    </p>
    <input type="submit" name="enter" value="entrer">
</form>