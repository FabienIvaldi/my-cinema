<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
	include 'fonctions.php';
	include 'fonctiontable.php';
	
	$id = $_GET["id"];
	if ($id == 0) {
		$user = newSub();
		$action = "CREATE";
		$libelle = "Creer";
	} else {
		$user = GetOneUser($id);
		$action = "UPDATE";
		$libelle = "Mettre a jour";
	}
	
	


?>

<html>
<header>
	<link rel="stylesheet" href="form.css">
</header>
<body>

		
	<form action="adduser.php" method="get">
	<p>	
		

        <input type="hidden" name="id" value="<?php echo isset($user['id']) ? $user['id'] : ''; ?>"/>
		<input type="hidden" name="action" value="<?php echo $action;  ?>"/>
        <div class="allform">
		 <div class="div">
         <a class="sub" href="showuser.php">Liste des Abonnements</a>
        	<label for="name">Name :</label>
            <input class="input"type="text" name="name" value="<?php echo isset($user['name']) ? $user['name'] : ''; ?>"/>
	    </div>
	    <div class="div">
	        <label  for="description">Description :</label>
            <input class="input"type="text" name="description" value="<?php echo isset($user['description']) ? $user['description'] : ''; ?>"/>
	    </div>
	    <div class="div">
	        <label for="price">Price :</label>
            <input class="input"type="text" name="price" value="<?php echo isset($user['price']) ? $user['price'] : ''; ?>"/>
	    </div>
	    <div class="div">
	        <label for="duration">duration :</label>
            <input class="input"type="text" name="duration" value="<?php echo isset($user['duration']) ? $user['duration'] : ''; ?>"/>
	    </div>
        <div class="div">
	        <label for="reduction">reduction :</label>
            <input class="input"type="text" name="reduction" value="<?php echo isset($user['reduction']) ? $user['reduction'] : ''; ?>"/>
	    </div>
        <div class="button">
			<button type="submit"><?php echo $libelle;  ?></button>
            
		
		
		</div>
    </div>
		
        
	</p>
	</form>
	<br>

	<?php if ($action!="CREATE") { ?>
	<form action="adduser.php" method="get">
		<input type="hidden" name="action" value="DELETE"/>
		<input type="hidden" name="id" value="<?php echo $user['id'];  ?>"/>
		<div class="button2">
			<button type="submit">DELETE</button>
		</div>
	</form>
	<?php } ?>

</body>
</html>