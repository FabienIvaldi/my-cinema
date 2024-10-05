<?php
try {
    $mycinema = new PDO("mysql:host=localhost;dbname=cinema;charset=utf8;port=3307", 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$userId = $_GET['id'];
$movieID = $_GET['id'];
$query = 'SELECT user.firstname, user.lastname, user.email, user.birthdate,
       subscription.name, user.city, user.country, user.zipcode, user.address,
       membership.date_begin
FROM membership
RIGHT JOIN user ON  membership.id_user = user.id
INNER JOIN subscription ON subscription.id = membership.id_subscription
WHERE user.id = :userId
ORDER BY user.id ASC;
';

$statement = $mycinema->prepare($query);
$statement->bindParam(':userId', $userId, PDO::PARAM_INT);
$statement->execute();

$user = $statement->fetch(PDO::FETCH_ASSOC);


if ($user) {
    echo "<div class='footer'><div class='tableau2'>
    <table border='1'>
            <tr>
                <th>Addresse</th>
                <th>Ville</th>
                <th>Code Postale</th>
                <th>Pays</th>
                <th>Carte Bancaire</th>
            </tr>";
    echo "<tr>
            <td>{$user['address']}</td>
            <td>{$user['city']}</td>
            <td>{$user['zipcode']}</td>
            <td>{$user['country']}</td>
            <td>not found</td>
            </tr>";

    echo "</table>";
    echo "<div class='footer'><div class='tableau2'>
    <table border='1'>
            <tr>
                
                
                <th>Prénom</th>
                <th>Nom</th>
                <th>Abonnement souscrit</th>
                <th>Addresse Email</th>
                <th>Date de naissance</th>
                <th>Inscrit le :</th>

            </tr>";

    echo "<tr>
            
            
            <td>{$user['firstname']}</td>
            <td>{$user['lastname']}</td>
            <td>{$user['name']}</td>
            <td>{$user['email']}</td>
            <td>{$user['birthdate']}</td>

            <td>{$user['date_begin']}</td>
            </tr>";

    echo "</table>";
    
} else {
    echo "User not found for ID $userId";
}

$query2 = 'SELECT distinct  user.id, movie.title FROM membership 

inner JOIN user 
on membership.id_user= user.id

INNER JOIN membership_log
On membership.id = membership_log.id_membership
INNER JOIN movie_schedule
on membership_log.id_session = movie_schedule.id_movie
INNER JOIN movie
on movie_schedule.id_movie = movie.id  
where user.id = :userId
ORDER BY `user`.`id` ASC';

$statement2 = $mycinema->prepare($query2);
$statement2->bindParam(':userId', $userId, PDO::PARAM_INT);
$statement2->execute();

$user2 = $statement2->fetch(PDO::FETCH_ASSOC);

if($user2){
    echo "<div class='footer'><div class='tableau'>
    <table border='1'>
            <tr>
                <th>historique</th>
            </tr>";
            while ($user2 = $statement2->fetch(PDO::FETCH_ASSOC)) 
    echo "<tr>
            <td><a href='info.php?id={$userId['id']}'>{$user2['title']}</a></td>
            </tr>";
        
    echo "</table>";
} else {
    echo "Historic not found for ID $userId";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='style.css' rel="stylesheet">
    
    <title>Document</title>
</head>
<body>
    <form method="get" action="fonction.php">
        <div class="colonnne">
    <h1>Search Movies</h1>
    <div class="menu">
                <a class="member" href="home.php">Accueil</a>
                <a class="member" href="membre.php">Membres</a>
                <a class="movies" href="mycinema.php">Rechercher Films</a>
            </div>
            </div>
    </form>
</body>
</html>