<?php

    function filtre()
    {
        echo "<div class='w3-container'>";
            echo "<p><span class='w3-text-teal w3-show-block'>Filtre :</span>";               
                echo "<div class='w3-row-padding w3-half w3-section'>";
                    echo "<div class='w3-half'>";
                    echo "<input type='checkbox' name='taille[]' value='1' id='un' class='w3-check' />";
                    echo "<label for='un'>1 chambre</label>";
                    echo "</div>";
                    echo "<input type='checkbox' name='taille[]' value='2' id='deux' class='w3-check' />";
                    echo "<label for='deux'>2 chambres</label>";
                echo "</div>"; 
                echo "<div class='w3-row-padding w3-half w3-section'>";
                    echo "<div class='w3-half'>";
                    echo "<input type='checkbox' name='taille[]' value='3' id='trois' class='w3-check' />";
                    echo "<label for='trois'>3 chambres</label>";
                    echo "</div>";
                    echo "<input type='checkbox' name='taille[]' value='4' id='quatre' class='w3-check' />";
                    echo "<label for='quatre'>4 chambres</label>";           
                echo "</div>";
                echo "<button onclick='fonctionfiltre()' id='filtre' class='w3-button w3-teal'>Filtrer</button>";
            echo "</p>";
        echo "</div>";     
    }

    function afficher()
    {
        echo "<div id='resultat' class='w3-container'>";
            $fichier = fopen("donnee.txt", "r");
            while ($ligne = fgets($fichier)) 
            {
                list($identifiant ,$nom ,$nbpersonne ,$duree) = explode("|", $ligne);
                echo "<div class='w3-panel w3-card-2 w3-teal w3-half w3-padding'>";
                    echo "<table class='w3-table-all'>";
                        echo "<tr>";
                            echo "<th>Identifiant :</th>";
                            echo "<td>".$identifiant."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<th>Nom :</th>";
                            echo "<td>".$nom."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<th>Taille de la chambre :</th>";
                            echo "<td>".$nbpersonne."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<th>Nombres de jours :</th>";
                            echo "<td>".$duree."</td>";
                        echo "</tr>";
                    echo "</table>";
                    echo "<div class='w3-center w3-padding w3-container'>";
                    echo "<form method='post'>";
                        echo "<button type='submit' name='supp' class='w3-button w3-teal'>Supprimer</button>";
                        echo "<button type='submit' name='mod' class='w3-button w3-teal'>Modifier</button>";
                        echo "<input type='hidden' name='identifiant' value='".$identifiant."'>";
                    echo "</form>";
                    echo "</div>";
                echo "</div>"; 
            }
            fclose($fichier);
        echo "</div>";
    }

    function supprimer()
    { 
        $identifiant_supp = $_POST['identifiant'];
        $fichier = fopen("donnee.txt", "r+");
    
        $nouveau_contenu = array();
    
        while ($ligne = fgets($fichier)) 
        {
            $id = explode("|", $ligne);
            if ($id[0] != $identifiant_supp) 
            {
                $nouveau_contenu[] = $ligne;
            }
        }
        fseek($fichier, 0);
        ftruncate($fichier, 0);
        foreach ( $nouveau_contenu as $ligne )
        {
            fwrite($fichier, $ligne);
        }
        fclose($fichier);
    }


    if (!isset($_POST['supp']) && !isset($_POST['mod'])) 
    {
     echo filtre();
     echo afficher();  
    }

    if (isset($_POST['supp']))
    {
        echo supprimer();
        echo filtre();
        echo afficher();
    }

    if (isset($_POST['mod']))
    {
        $identifiant_modifier = $_POST['identifiant'];
        $nom = "";
        $personne = "";
        $nbjour = "";

        $fichier = fopen("donnee.txt", "r");
    
        while ($ligne = fgets($fichier)) 
        {
            $id = explode("|", $ligne);
            if ($id[0] == $identifiant_modifier) 
            {
                $nom = $id[1];
                $personne = $id[2];
                $nbjour = $id[3];
                break;
            }
        }
        fclose($fichier);               
        echo "<p><span class='w3-text-teal w3-padding w3-show-block'>Modification de l'identifiant : ".$identifiant_modifier."</span>";




?>

<main class="w3-container w3-content">
        <section class="w3-card-4 w3-display-container w3-margin">
            <div class="w3-container w3-teal">
                <h2>Formulaire de réservation</h2>
            </div>
            <form method="POST" onsubmit="return verif()" action='index.php?page=verif_form_for_mod.php' class="w3-container">
                <p>
                    <label for="nom" class="w3-text-teal">Nom</label>
                    <input type="text" name="nom" id="nom" value="<?php echo $nom ?>" class="w3-input" />
                </p>
               <p>
                <span class="w3-text-teal w3-show-block">Nombre de personnes</span>
                    <span class="w3-show-block">
                        <input type="radio" id="unepersonne" name="personne" value=1 <?php if ( $personne == 1 ) echo 'checked'; ?>  class="w3-radio" />
                        <label for="une">1</label>
                    </span>
                    <span class="w3-show-block">
                        <input type="radio" id="deuxpersonne" name="personne" value=2 <?php if ( $personne == 2 ) echo 'checked'; ?>  class="w3-radio" />
                        <label for="deux">2</label>
                    </span>
                    <span class="w3-show-block">
                        <input type="radio" id="troispersonne" name="personne" value=3 <?php if ( $personne == 3 ) echo 'checked'; ?> class="w3-radio" />
                        <label for="trois">3</label>
                    </span>
                    <span class="w3-show-block">
                        <input type="radio" id="quatrepersonne" name="personne" value=4 <?php if ( $personne == 4 ) echo 'checked'; ?> class="w3-radio" />
                        <label for="quatre">4</label>
                    </span>
                    
                </p>
				<p>
                    <label for="nbjour" class="w3-text-teal">Durée du séjour</label><br><br>
                    <select name="nbjour" id="nbjour" class="w3-select">
                        <option value=1  <?php if ( $nbjour == 1 ) echo 'selected'; ?> >1 jour</option>
                        <option value=2  <?php if ( $nbjour == 2 ) echo 'selected'; ?>>2 jours</option>
                        <option value=3 <?php if ( $nbjour == 3 ) echo 'selected'; ?>>3 jours</option>
                        <option value=4 <?php if ( $nbjour == 4 ) echo 'selected'; ?>>4 jours</option>
                        <option value=5  <?php if ( $nbjour == 5 ) echo 'selected'; ?>>5 jours</option>
                        <option value=6 <?php if ( $nbjour == 6 ) echo 'selected'; ?>>6 jours</option>
                        <option value=7 <?php if ( $nbjour == 7 ) echo 'selected'; ?>>7 jours</option>
                        <option value=8 <?php if ( $nbjour == 8 ) echo 'selected'; ?>>8 jours</option>
                        <option value=9 <?php if ( $nbjour == 9 ) echo 'selected'; ?>>9 jours</option>
                        <option value=10 <?php if ( $nbjour == 10 ) echo 'selected'; ?>>10 jours</option>
                        <option value=11 <?php if ( $nbjour == 11 ) echo 'selected'; ?>>11 jours</option>
                        <option value=12 <?php if ( $nbjour == 12 ) echo 'selected'; ?>>12 jours</option>
                        <option value=13 <?php if ( $nbjour == 13 ) echo 'selected'; ?>>13 jours</option>
                        <option value=14 <?php if ( $nbjour == 14 ) echo 'selected'; ?>>14 jours</option>
                        <option value=15 <?php if ( $nbjour == 15 ) echo 'selected'; ?>>15 jours</option>        
                    </select>
                </p>
                <p>
                    <button type="submit" name='submit' class="w3-btn w3-teal">Soumettre</button>
                    <input type='hidden' name='identifiant' value='<?php echo $identifiant_modifier; ?>'>
                    <button type="reset" name='reset' class="w3-btn w3-teal">Recommencer</button>
                </p>
            </form>
        </section>
    </main>

    <?php 
    }
?>

<script>
    function verif() 
    {
    var nom = document.getElementById("nom").value;
    if (nom == '') 
    {
        alert("Veuillez saisir votre nom");
        return false;
    }

    var personne = document.querySelector('input[name="personne"]:checked');
    if ( !personne ) 
    {
        alert("Veuillez saisir le nombre de personne");
        return false;
    }

    var nbjour = document.getElementById("nbjour").value;
    if (nbjour == 0) 
    {
        alert("Veuillez saisir le nombre de jour");
        return false;
    }
    return true;
}
</script>




<script>

    function fonctionfiltre() 
    {  
            var checkboxes = document.getElementsByName('taille[]');
            var valeursSelectionnees = [];
            var card = document.getElementById('resultat').getElementsByClassName('w3-panel');

            var auMoinsUneCaseCochee = false;

            for (var i = 0; i < checkboxes.length; i++) 
            {
                if (checkboxes[i].checked) 
                {
                    auMoinsUneCaseCochee = true;
                    valeursSelectionnees.push(checkboxes[i].value);
                }
            }

            if ( auMoinsUneCaseCochee == true )
            {
                for (var j = 0; j < card.length; j++) 
                {
                    var tailleChambre = card[j].getElementsByTagName('td')[2].innerText;

                    if (valeursSelectionnees.includes(tailleChambre)) 
                    {
                        card[j].style.display = 'block';
                    } 
                    else 
                    {
                        card[j].style.display = 'none';
                    }
                }
            }
            else
            {
                for (var k = 0; k < card.length; k++) 
                {
                    card[k].style.display = 'block';
                }

            }

        
    }
</script>
