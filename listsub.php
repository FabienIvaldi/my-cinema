<?php
try {
    $mycinema = new PDO("mysql:host=localhost;dbname=cinema;charset=utf8;port=3307", 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sub'])) {
    $newsub = $_POST['sub'];
    $userId = $_POST['user_id'];
    $subquery = 'UPDATE membership SET id_subscription = :sub WHERE id_user = :ID_user';
    $request = $mycinema->prepare($subquery);
    $request->bindValue(':sub', $newsub, PDO::PARAM_INT);
    $request->bindValue(':ID_user', $userId, PDO::PARAM_INT);
    if ($request->execute()) {
        echo " ";
    } else {
        echo " ";
    }
}

$subId = $_GET['id'];
$query = "SELECT subscription.name, user.firstname, user.lastname, user.id
          FROM subscription
          INNER JOIN membership ON subscription.id = membership.id_subscription
          INNER JOIN user ON membership.id_user = user.id 
          WHERE subscription.id = :subId";

$statement = $mycinema->prepare($query);
$statement->bindParam(':subId', $subId, PDO::PARAM_INT);
$statement->execute();

$sub = $statement->fetchAll(PDO::FETCH_ASSOC);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($sub) {
    echo " </div><div class='footer'><div class='tableau'>
<h1>Change Member Subscription</h1>
    <div class='menu'>
    
                    <a class='member' href='home.php'>Acceuil</a>
                    <a class='member' href='showuser.php'>Abonnements</a>
                    
        </div>
        
   
        
          <table border='1'>
          <tr>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Subscription</th>
              <th>Edit</th>
          </tr>";

    foreach ($sub as $i => $subs) {
        echo "
                <tr>
                    <td>{$subs['firstname']}</td>
                    <td>{$subs['lastname']}</td>
                    <td>{$subs['name']}</td>
                    <td>
                        <form method='post' action=''>
                            <input type='hidden' name='user_id' value='{$subs['id']}' />
                            <select name='sub' id='sub'>
                                <option value='0'>Change subscription</option>";
        $Squery = 'SELECT id, name FROM subscription ORDER BY id ASC';
        $Sresult = $mycinema->query($Squery);
        while ($option = $Sresult->fetch(PDO::FETCH_ASSOC)) {
            echo "<option class='opt'value='{$option['id']}'>{$option['name']}</option>";
        }
        echo            "</select>
                            <input class='submit'type='submit' name='submit' value='Update' />
                        </form>
                    </td>
                </tr>";
    }
}

//  var_dump($_POST['sub']);
//  var_dump($_POST['user_id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='style2.css' rel="stylesheet">

    <title>Document</title>
</head>

<body>

</body>

</html>