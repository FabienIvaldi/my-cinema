

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
         <a class="sub" href="projection_date.php">Séances</a>
        	<label for="name">Titre :</label>
            <input class="input"type="text" name="name" value="<?php echo isset($user['title']) ? $user['title'] : ''; ?>"/>
	    </div>
	    <div class="div">
	        <label  for="description">Durée</label>
            <input class="input"type="text" name="description" value="<?php echo isset($user['duration']) ? $user['duration'] : ''; ?>"/>
	    </div>
	    <div class="div">
	        <label for="price">Salle</label>
            <input class="input"type="text" name="price" value="<?php echo isset($user['name']) ? $user['name'] : ''; ?>"/>
	    </div>
	    <div class="div">
	        <label for="duration">date de projection</label>
            <input class="input"type="text" name="duration" value="<?php echo isset($user['date_begin']) ? $user['date_begin'] : ''; ?>"/>
	    </div>
        <div class="div">
	        <label for="reduction">Etage de la salle</label>
            <input class="input"type="text" name="reduction" value="<?php echo isset($user['floor']) ? $user['floor'] : ''; ?>"/>
	    </div>
        <div class="button">
			<button type="submit">UPDATE</button>
            
		
		
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