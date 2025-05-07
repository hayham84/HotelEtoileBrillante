<body>
	<?php
	$tab_pages = array( 
		"Page de présentation" => "init.php",
		"Page de réservation" => "modifresa.php",
		"Liste de reservation" => "reservation.php"
		);
     ?>
	 <div class="w3-bar w3-theme">
        <?php foreach ($tab_pages as $nom => $url): ?>
            <a href="index.php?page=<?php echo $url; ?>" class="w3-bar-item w3-button"><?php echo $nom; ?></a>
        <?php endforeach; ?>
    </div>
</body>


