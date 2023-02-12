<?php
    if(isset($_POST['modele_submit'])) {
        try{
            if(allOk($_POST)) {
                $sql = "INSERT INTO modele VALUES(NULL,'".valid_input($_POST['modele'])."','".valid_input($_POST['marque'])."','".valid_input($_POST['puissance'])."','".valid_input($_POST['carburant'])."')";
                $cnx->exec($sql);
                echo "<script> alert('Bien ajouter !!')</script>";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $cnx = null;
    }
?>

<h1 class="title"> Ajoute nouveau modèle</h1>
<fieldset>
    <legend>Nouveau modèle</legend>
    <form action="" method="post">
        <div>
            <label for="modele">Modèle:</label>
            <input id="modele" name="modele" type="text">
        </div>
        <div>
            <label for="marque">Marque:</label>
            <input id="marque" name="marque" type="text">
        </div>
        <div>
            <label for="puissance">Puissance:</label>
            <input id="puissance" name="puissance" type="text">
        </div>
        <div>
            <label for="carburant">Carburant:</label>
            <input id="carburant" name="carburant" type="text">
        </div>
        <div>
            <input type="submit" name="modele_submit" value="Ajouter">
            <input type="reset" value="Annuler">
        </div>
        <a href="/GestionVehicules/liste-modele" style="float: right;"> Liste des modeles  >></a>
    </form>
    <div class="wrapper_error-msg">
        <?php if(isset($_POST['modele_submit'])) echo error_msg($_POST) ?>
    </div>
</fieldset>