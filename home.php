<?php 
session_start();
if(isset($_POST['valider'])){
    header('Location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Home</title>
</head>

<body>
    <div class="all">
        <h1>Welcome to the admin panel</h1>

        <div class="allcont">
            <div class="cont1">
                <a href="mycinema.php">Liste de film</a>
            </div>
            <div class="cont2">
                <a href="membre.php">Liste de membre</a>
            </div>
            <div class="cont3">
                <a href="showuser.php">Gérer les abonnement</a>
            </div>
        </div>
        <div class="allcont">
            <div class="cont4">
                <a href="projection_date.php">Gérer les séances</a>
            </div>
            
        </div>
    </div>
    <div class="bout">
        <form method="post" action="logout.php">
            <input type="submit" name="Logout"  class="out" value="Logout">
        </form>
    </div>
    </div>
</body>

</html>