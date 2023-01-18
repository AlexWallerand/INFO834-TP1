<?php
include("config.php");
$connection = $_POST['connection'];

if(isset($connection)){
    $users = $db -> query('SELECT * FROM `utilisateur`');
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    while($user = $users -> fetch()){
        if($user['email'] == $email && $user['mdp'] == $mdp){
            session_start();
            echo 'Connected !';
            $cmd = `C:\Users\\walle\AppData\Local\Programs\Python\Python310\python.exe main.py`;
            $path = escapeshellcmd($cmd);
            $output = shell_exec($path);
            $_SESSION["connection"] = $output;
            header("Location: accueil.php"); 
        }
    }
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label><b>Email :</b></label>
        <input type="text" placeholder="Email" name="email" required>

        <label><b>Mot de passe :</b></label>
        <input type="password" placeholder="Mot de passe" name="mdp" required>

        <button name="connection" type="submit">Se connecter</button>
    </form>
    
</body>
</html>