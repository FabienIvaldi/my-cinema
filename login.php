<?php
session_start();
if(isset($_POST['valider'])){
    if(!empty($_POST['pseudo']) and !empty($_POST['mdp'])){
        $id = "Bus Driver";
        $passW = "20012003";
 
        $identifiant = htmlspecialchars($_POST['pseudo']);
        $password = htmlspecialchars($_POST['mdp']);
 
        if($identifiant == $id and $password == $passW){
            $_SESSION['mdp'] = $password;
            header('Location: home.php');
        }else {
            echo "Votre Pseudo ou Mot de passe est incorrect.";
        }
 
    }else {
        echo "";
    }
};
 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>MY CINEMA</title>
</head>
<body>
    <header class="header">
            
    
    <div class="message">
        <h1>Login please</h1>
    </div>
    <div class="corps">
        <form  method="POST" action="">
            <div class="form">
            <input type="text" name="pseudo" autocomplete="off" placeholder="Identifiant" id="pseudo">
            <input type="password" name="mdp" placeholder="Password" id="mdp">
            <input type="submit" name="valider" id="valider" value="connect">
        </div>
            <br><br>
            <?php
 
            include('connexion.php');
 
            ?>
 
        </form>
    </div>
</header>
</body>
</html>