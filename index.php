
<html>

<head>
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-Teal.css">
	<title>Hôtel Étoile Brillante</title>
	
</head>
<body>
		<DIV class="entete">
			<?php
				include('entete.php');
			?>
	    </DIV>
	    <div class="corps">
			<?php
			if (isset($_GET['page']))
			{
				include($_GET['page']);
			}
			else
			{
				include('init.php');
			}  
			?>
	    </div>
		<DIV class="pied">
		<?php
			include('php_pied.php');
		?>
		</DIV>
	
</body>

</html>


