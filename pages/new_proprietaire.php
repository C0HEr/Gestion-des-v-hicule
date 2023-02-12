<?php

    try{
        $sql = "SELECT ID,immatriculation FROM voiture";
        $result = $cnx->query($sql);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    if(isset($_POST['proprietaire_submit'])) {
        try{
            if(allOk($_POST)) {
                $sql = "INSERT INTO proprietaire VALUES(NULL,'".valid_input($_POST['nom'])."','".valid_input($_POST['prenom'])."','".valid_input($_POST['adress'])."','".valid_input($_POST['codePostal'])."','".valid_input($_POST['ville'])."','".valid_input($_POST['tel'])."','".valid_input($_POST['immatriculation'])."')";
                $cnx->exec($sql);
                echo "<script> alert('Le propriétaire ".valid_input($_POST['nom'])." ".valid_input($_POST['prenom'])." est ajouté avec succés')</script>";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $cnx = null;
    }
?>

<h1 class="title"> Ajoute nouveau propriétaire</h1>
<fieldset>
    <legend>Nouveau propriétaire</legend>
    <form action="" method="post">
        <div>
            <label for="nom">Nom:</label>
            <input id="nom" name="nom" type="text">
        </div>
        <div>
            <label for="prenom">Prénom:</label>
            <input id="prenom" name="prenom" type="text">
        </div>
        <div>
            <label for="adress">Adress:</label>
            <input id="adress" name="adress" type="text">
        </div>
        <div>
            <label for="codePostal">Code Postal:</label>
            <input id="codePostal" name="codePostal" type="text" isNum="true">
        </div>
        <div>
            <label for="ville">Ville:</label>
            <input id="ville" name="ville" type="text">
        </div>
        <div>
            <label for="tel">Téléphone:</label>
            <input id="tel" name="tel" type="tel" isNum="true">
        </div>
        <div>
            <label fro="immatriculation">immatriculation : </label>
            <select name='immatriculation' id="immatriculation">
                <?php 
                    foreach($result as $item) {
                        echo "<option value=". $item['ID'] .">". $item['immatriculation'] ."</option>";
                    }
                ?> 
            </select>
        </div>
        <div>
            <input type="submit" name="proprietaire_submit" value="Ajouter">
            <input type="reset" value="Annuler">
        </div>
        <a href="/GestionVehicules/liste-propr" style="float: right;"> Liste des propriétaires  >></a>
    </form>
    <div class="wrapper_error-msg">
        <?php if(isset($_POST['proprietaire_submit'])) echo error_msg($_POST) ?>
    </div>
</fieldset>