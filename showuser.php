<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="crud.css">
    <title>Gérer les abonnements</title>
</head>

<body>
    <div class="all">
        <?php
        include 'fonctions.php';
        include 'fonctiontable.php';
        $rows = GetAllUser();
        ShowTable($rows, getheaderTable()); ?>
        <div class="menu">
            <a class="a"href='formulaire.php?id=0'>Nouvel Abonnement</a>
            <a class="a"href='home.php'>Accueil</a>
        </div>
    </div>
</body>

</html>