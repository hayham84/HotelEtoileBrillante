<?php   

    $identifiant_modifier = $_POST['identifiant'];
    $nom = $_POST['nom'];
    $personne = $_POST['personne'];
    $nbjour = $_POST['nbjour'];

    $fichier = fopen("donnee.txt", "r+");           
    $nouveau_contenu = array();
    
    while ($ligne = fgets($fichier)) 
    {
        $id = explode("|", $ligne);            
        if ($id[0] == $identifiant_modifier) 
        {
            $ligne = $identifiant_modifier . "|" . $nom . "|" . $personne . "|" . $nbjour . "\n";
        }               
        $nouveau_contenu[] = $ligne;
    }     
    fseek($fichier, 0);
    ftruncate($fichier, 0);
    foreach ($nouveau_contenu as $ligne) 
    {
        fwrite($fichier, $ligne);
    }      
    fclose($fichier);
    echo "<p class='w3-padding w3-text-green'>Votre réservation a bien été modifié</p>";
    echo "<div class='w3-padding'>";
    echo "<a href='index.php?page=init.php' class='w3-button w3-teal' style='margin-right: 10px;'>Page d'accueil</a>";
    echo "<a href='index.php?page=reservation.php' class='w3-button w3-teal'>Liste des réservations</a>";
    echo "</div>";
    

?>