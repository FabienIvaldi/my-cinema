<?php
try {
    $mycinema = new PDO("mysql:host=localhost;dbname=cinema;charset=utf8;port=3307", 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$result = $mycinema->query('SELECT movie.id, movie.title, movie.duration, room.name, movie_schedule.date_begin, room.floor FROM movie 
INNER JOIN movie_schedule 
ON movie.id = movie_schedule.id_movie 
INNER JOIN room 
ON movie_schedule.id_room = room.id ');




if ($result) {
    echo "<table border='1'>
            <tr>
                <th>Titre du film</th>
                <th>Durée du film</th>
                <th>Nom de la salle</th>
                <th>Date de projection</th>
                <th>Étage de la salle</th>
                <th>edit</th>

            </tr>";
}

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
    <td>{$row['title']}</td>" ?> <?php
                                if ($row['duration'] !== null) {
                                    echo "<td>{$row['duration']} min</td>";
                                } else {
                                    echo '<td>Inconnu</td>';
                                } ?>

<?php echo "
    <td>{$row['name']}</td>
    <td>{$row['date_begin']}</td>
    <td>{$row['floor']}</td>
    <td><a href='formulaireproj.php?id={$row['id']}' value='{$row['id']}'>modifier</a></td>
  </tr>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>