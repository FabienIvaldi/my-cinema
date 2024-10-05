<?php
	include 'fonctions.php';
	include 'fonctiontable.php';
	$action = $_GET["action"];

	if ($action == "DELETE") {
		$id = $_GET["id"];
	} else {
		$id = $_GET["id"];
		$name = $_GET["name"];
		$description = $_GET["description"];
		$price = $_GET["price"];
		$duration = $_GET["duration"];
        $reduction = $_GET["reduction"];

	}
	

	if ($action == "CREATE") {
		createUser($name, $description, $price, $duration, $reduction);

		echo "user cree <br>";
		echo "<a href='showuser.php'>Liste des utilisateurs</a>";
		
	}
	
	if ($action == "UPDATE") {
		updateUser($id,$name, $description, $price, $duration, $reduction);
		echo "user update <br>";
		echo "<a href='showuser.php'>Liste des utilisateurs</a>";
	}
	if ($action == "DELETE") {
		deleteUser($id);
		echo "user delete <br>";
		echo "<a href='showuser.php'>Liste des utilisateurs</a>";
	}
	

	
?>