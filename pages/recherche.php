<?php
    $result = "";
    if(isset($_POST['recherche_submit'])) {
        $result = NULL;
        try{
            $sql = "SELECT v.couleur,v.kilometrage,m.modele,m.marque,m.puissance,m.carburant FROM voiture v, modele m, proprietaire p WHERE p.nom='". $_POST['nom']."' AND p.prenom='". $_POST['prenom']."' AND v.ID = p.id_voiture AND m.ID = v.id_modele";
            $result = $cnx->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $cnx = null;
    }

?>

<h1 class="title"> Recherche voiture par proprétaire </h1>
<fieldset>
    <legend>Recherche avancée</legend>
    <form action="" method="post">
        <div>
            <label for="nom">Nom:</label>
            <input id="nom" name="nom" type="text">
        </div>
        <div>
            <label for="prenom">Prénom:</label>
            <input id="prenom" name="prenom" type="text">
        </div>
        <div class="btns-form">
            <input type="submit" name="recherche_submit" value="Recherche">
            <input type="reset" value="Annuler">
        </div>
    </form>
    <?php
    if($result !="") {
        if($result != NULL && $result->rowCount() > 0) {
    ?>
        <table border="1">
            <tr>
                <th>Couleur</th>
                <th>Kilometrage</th>
                <th>Modele</th>
                <th>Marque</th>
                <th>Puissance</th>
                <th>Carburant</th>
            </tr>
    <?php foreach($result as $row) { ?>
            <tr>
                <td> <?php echo $row['couleur']?> </td>
                <td> <?php echo $row['kilometrage']?> </td>
                <td> <?php echo $row['modele']?> </td>
                <td> <?php echo $row['marque']?> </td>
                <td> <?php echo $row['puissance']?> </td>
                <td> <?php echo $row['carburant']?> </td>
            </tr>
    <?php } ?>
        </table>
    <?php
            }else {
                echo " <div class='wrapper_error-msg'><p class='error-msg'> Pas de resultat pour cette recherche !!</p></div>";
            }
        }
    ?>
        
</fieldset>

