<?php

    try {
        $sql = "SELECT ID,modele FROM modele";
        $result = $cnx->query($sql);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
    if(isset($_POST['voiture_submit'])) {
        try{ 
            if(allOk($_POST)) {
                $sql = "INSERT INTO voiture VALUES(NULL,'".valid_input($_POST['immatriculation'])."','".valid_input($_POST['couleur'])."','".valid_input($_POST['kilometrage'])."','".valid_input($_POST['modele'])."')";
                $cnx->query($sql);
                echo "<script> alert('La voiture ". valid_input($_POST['immatriculation']) ." est ajouté avec succés')</script>";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $cnx = null;
    }
?>

<h1 class="title"> Ajoute nouveau voiture</h1>
<fieldset>
    <legend>Nouveau voiture</legend>
    <form action="" method="post">
        <div>
            <label for="immatriculation">Immatriculation:</label>
            <input id="immatriculation" name="immatriculation" type="text">
        </div>
        <div>
            <label for="couleur">Couleur:</label>
            <input id="couleur" name="couleur" type="text">
        </div>
        <div>
            <label for="kilometrage">Kilometrage:</label>
            <input id="kilometrage" name="kilometrage" type="text" isNum="true">
        </div>
        <div>
            <label for="modele">Modele:</label>
            <select name="modele">
                <?php 
                    foreach($result as $item) {
                        echo "<option value=". $item['ID'] .">". $item['modele'] ."</option>";
                    }
                ?> 
            </select>
        </div>
        <div>
            <input type="submit" name="voiture_submit" value="Ajouter">
            <input type="reset" value="Annuler">
        </div>
    </form>
    <a href="/GestionVehicules/liste-voiture" style="float: right;"> Liste des voitures  >></a>
    <div class="wrapper_error-msg">
        <?php if(isset($_POST['voiture_submit'])) echo error_msg($_POST) ?>
    </div>
</fieldset>