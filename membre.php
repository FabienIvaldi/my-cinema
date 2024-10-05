<?php

try {
    $mycinema = new PDO("mysql:host=localhost;dbname=cinema;charset=utf8;port=3307", 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$user = $mycinema->query('SELECT membership.id_user,user.firstname,user.lastname FROM membership
inner join user
on membership.id_user = user.id');


if(isset($_GET['firstname'])and !empty($_GET['firstname'])){
    $firstname = htmlspecialchars($_GET['firstname']);
    $user = $mycinema->query('SELECT membership.id_user,user.firstname,user.lastname FROM `membership` 
    inner join user
    on membership.id_user = user.id where user.firstname = "'.$firstname.'" LIMIT 149');
}

if(isset($_GET['lastname'])and !empty($_GET['lastname'])){
    $lastname = htmlspecialchars($_GET['lastname']);
    $user = $mycinema->query('SELECT membership.id_user,user.firstname,user.lastname FROM `membership` 
    inner join user
    on membership.id_user = user.id where user.lastname = "'.$lastname.'"LIMIT 149');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='style.css' rel="stylesheet">
    <title>Member List</title>
</head>

<body>
    <div class="footer">
        <h1>Search User</h1>
        <div class="menu">

        </div>
        <div class="menu">
        <a class="member" href="home.php">Acceuil</a>
            <a class="member" href="membre.php">Membres<a>
                    <a class="movies" href="mycinema.php">Rechercher Films<a>
        </div>
        <form method="get" action="">
            <label for=search></label>
            <div class="input">
                <input type="text" name="firstname" class='search' placeholder="firstname">
                <input type="text" name="lastname" class='search' placeholder="lastname">
                <input type="submit" placeholder="submit">
            </div>
        </form>
    </div>
    
    <?php echo '<ul id="content">';
        while ($m = $user->fetch(PDO::FETCH_ASSOC)) {
            echo "<li><a href='info_user.php?id={$m['id_user']}'>" . htmlspecialchars($m['firstname'] ." ".$m['lastname']) . "</a></li>";}
        echo '</ul>';
        ?>
        <div class="bqck">
            <div class="scroll">
                <ul id="pagination" class="pagination"></ul>
            </div>
        </div>
    <script src="pagination.js"></script>

    </body>

    </html>