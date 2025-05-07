<?php
    $nom = isset($_POST['nom'])?$_POST['nom']:"";
    $personne = isset($_POST['personne'])?$_POST['personne']:"";
    $nbjour = isset($_POST['nbjour'])?$_POST['nbjour']:"";

    echo "<p class='w3-padding w3-text-green'>Votre réservation a bien été prise en compte</p>";
    $fichier = fopen("donnee.txt", "a");
    $identifiant = rand(00001, 99999);
    $ligne = $identifiant."|".$nom."|".$personne ."|".$nbjour."\n";
    fwrite($fichier, $ligne);
    fclose($fichier);
    $nom = "";
    $personne = 0;
    $nbjour = 0;
    echo "<div class='w3-padding'>";
    echo "<a href='index.php?page=init.php' class='w3-button w3-teal' style='margin-right: 10px;'>Page d'accueil</a>";
    echo "<a href='index.php?page=reservation.php' class='w3-button w3-teal'>Liste des réservations</a>";
    echo "</div>";      


?>