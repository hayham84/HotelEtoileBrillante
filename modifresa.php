<body>
    <?php
    $nom = isset($_POST['name']) ? $_POST['name'] : "";
    $nbjour = isset($_POST['nbjour']) ? $_POST['nbjour'] : "";
    $personne = isset($_POST['personne']) ? $_POST['personne'] : "";
    echo "<p><span class='w3-text-teal w3-padding w3-show-block'>Ajout d'un nouveau identifiant </span>";
    ?>
    <main class="w3-container w3-content">
        <section class="w3-card-4 w3-display-container w3-margin">
            <div class="w3-container w3-teal">
                <h2>Formulaire de réservation</h2>
            </div>
            <form method="POST" onsubmit="return verif()"  action="index.php?page=verif_form.php" class="w3-container">
                <p>
                    <label for="nom" class="w3-text-teal">Nom</label>
                    <input type="text" name="nom" id="nom" value="<?php echo $nom ?>" class="w3-input" />
                </p>
               <p>
                <span class="w3-text-teal w3-show-block">Nombre de personnes</span>
                    <span class="w3-show-block">
                        <input type="radio" id="personne" name="personne" value=1 <?php if ( $personne == 1 ) echo 'checked'; ?>  class="w3-radio" />
                        <label for="une">1</label>
                    </span>
                    <span class="w3-show-block">
                        <input type="radio" id="personne" name="personne" value=2 <?php if ( $personne == 2 ) echo 'checked'; ?>  class="w3-radio" />
                        <label for="deux">2</label>
                    </span>
                    <span class="w3-show-block">
                        <input type="radio" id="personne" name="personne" value=3 <?php if ( $personne == 3 ) echo 'checked'; ?> class="w3-radio" />
                        <label for="trois">3</label>
                    </span>
                    <span class="w3-show-block">
                        <input type="radio" id="personne" name="personne" value=4 <?php if ( $personne == 4 ) echo 'checked'; ?> class="w3-radio" />
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
                    <button type="reset" name='reset' class="w3-btn w3-teal">Recommencer</button>
                </p>
            </form>
        </section>
    </main>


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



</body>
