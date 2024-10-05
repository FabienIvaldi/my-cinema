<?php

try {
    $mycinema = new PDO("mysql:host=localhost;dbname=cinema;charset=utf8;port=3307", 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$movie = $mycinema->query('SELECT id,title FROM movie ORDER BY title ASC');



//recherche par genre
if(isset($_GET['genre'])and !empty($_GET['genre'])){
    $query3 = htmlspecialchars($_GET['genre']);
    $movie = $mycinema->query('SELECT movie.id, movie.title FROM `movie` 
    INNER JOIN movie_genre ON movie_genre.id_movie = movie.id 
    INNER JOIN genre ON movie_genre.id_genre = genre.id 
    WHERE genre.name ="' .$query3.'" ORDER BY title ASC');
}
//recherche par directeur de prod
if(isset($_GET['director'])and !empty($_GET['director'])){
    $query4 = htmlspecialchars($_GET['director']);
    $movie = $mycinema->query('select movie.id,movie.title from movie where director = "'.$query4.'"');
}
//recherche par date de projection
if(isset($_GET['date'])and !empty($_GET['date'])){
    $query5 = htmlspecialchars($_GET['date']);
    $movie = $mycinema->query('SELECT movie.id,movie.title, movie_schedule.date_begin FROM `movie`INNER JOIN movie_schedule 
    ON movie.id = movie_schedule.id_movie WHERE DATE(movie_schedule.date_begin) = "'.$query5.'"');
}
//recherche par film 
if (isset($_GET['search']) and !empty($_GET['search'])) {
    $query = htmlspecialchars($_GET['search']);
    $movie = $mycinema->query('SELECT movie.id,movie.title FROM movie WHERE title LIKE "%' . $query . '%" ORDER BY title ASC');
}



//recherche par distributeur
if (isset($_GET['search2']) and !empty($_GET['search2'])) {
    $query2 = htmlspecialchars($_GET['search2']);
    $movie = $mycinema->query('SELECT movie.id,movie.title FROM movie 
    INNER JOIN distributor ON movie.id_distributor = distributor.id 
    WHERE distributor.name LIKE "%' . $query2 . '%" ORDER BY title ASC');
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href='style.css' rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie list</title>
</head>

<body>
    <div class="inter">
        <div class="footer">
            <h1>Search Movies</h1>
            <div class="menu">
                <a class="member" href="home.php">Accueil</a>
                <a class="member" href="membre.php">Membres</a>
                <a class="member" href="mycinema.php">Rechercher Films</a>
            </div>
            <form method="get" action="mycinema.php">
                <div class="input">
                    <input type="text" name="search" class='search' placeholder="Search movies">
                    <input type="text" name="search2" class='search' placeholder="Search by Distributor">
                    <input type="text" name="director"class='search'placeholder='Search by Director'>
                    <input type="date" name="date"class='search'placeholder='Search by Screening Date' min="2018-01-01" max="2018-12-31">
                    <select id="query" name="genre">
                        <option value="all">Genre :</option>
                        <option value="action" action="action.php">Action</option>
                        <option value="adventure">Adventure</option>
                        <option value="animation">Animation</option>
                        <option value="biography">Biography</option>
                        <option value="comedy">Comedy</option>
                        <option value="crime">Crime</option>
                        <option value="drama">Drama</option>
                        <option value="family">Family</option>
                        <option value="fantasy">Fantasy</option>
                        <option value="horror">Horror</option>
                        <option value="mystery">Mystery</option>
                        <option value="romance">Romance</option>
                        <option value="sci-fi">Sci-Fi</option>
                        <option value="thriller">Thriller</option>
                    </select>
                    <input type="submit">
                    <div id="result"></div>
                </div>
            </form>
            
        </div>

        <?php
        echo '<ul id="content">';
        while ($m = $movie->fetch(PDO::FETCH_ASSOC)) {
            echo "<li><a href='info.php?id={$m['id']}'>" . htmlspecialchars($m['title']) . "</a></li>";
        }
        echo '</ul>';
        ?>

        <div class="bqck">
            <div class="scroll">
                <ul id="pagination" class="pagination"></ul>
            </div>
        </div>
    </div>
    <script src="pagination.js"></script>
</body>

</html>
