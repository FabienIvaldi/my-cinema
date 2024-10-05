<?php
try {
    $mycinema = new PDO("mysql:host=localhost;dbname=cinema;charset=utf8;port=3307", 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$movieId = $_GET['id'];

$query = 'SELECT movie.title, genre.name as "genre", movie.duration,DATE_FORMAT(movie.release_date, "%D %b %Y"), distributor.name as "distributor", movie.rating, movie.director
          FROM `movie`
          INNER JOIN movie_genre ON movie_genre.id_movie = movie.id
          INNER JOIN genre ON movie_genre.id_genre = genre.id
          LEFT JOIN distributor ON movie.id = distributor.id
          WHERE movie.id = :movieId';

$statement = $mycinema->prepare($query);
$statement->bindParam(':movieId', $movieId, PDO::PARAM_INT);
$statement->execute();

$movie = $statement->fetch(PDO::FETCH_ASSOC);

if ($movie) {
    echo " <div class='footer'><div class='tableau'>
    <table border='1'>
            <tr>
                <th>Titre</th>
                <th>Genre</th>
                <th>Durée</th>
                <th>Date de Sortie</th>
                <th>Distributeur</th>
                <th>Rating</th>
                <th>Director</th>
                
            </tr>";

    echo "<tr>
            <td>{$movie['title']}</td>
            <td>{$movie['genre']}</td>";

    if ($movie['duration'] !== null) {
        echo "<td>{$movie['duration']} min</td>";
    } else {
        echo '<td>non renseigné</td>';
    }
    echo "<td>{$movie['DATE_FORMAT(movie.release_date, "%D %b %Y")']}</td>";

     if ($movie['distributor'] !== null) {
        echo "<td>{$movie['distributor']}</td>";
    } else {
        echo '<td>non renseigné</td>';
    } echo "
          <td>{$movie['rating']}</td>
          <td>{$movie['director']}</td>
          
          </tr>";

    echo "</table>";
} else {
    echo "Movie not found for ID $movieId";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='style.css' rel="stylesheet">
    <title>info</title>
</head>

<body>

    <div class="menu">
        <a class="member" href="home.php">Accueil</a>
        <a class="member" href="membre.php">Membres</a>
        <a class="movies" href="mycinema.php">Rechercher Films</a>
    </div>
    <h1>Search Movies</h1>
    </div>
    </div>
</body>

</html>