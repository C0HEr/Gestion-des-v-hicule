<?php 
    if(isset($_POST['logout_submit'])) {
        include 'logout.php';
    }
    
    try{
        $sql = "SELECT p.nom,p.prenom,v.immatriculation,m.modele,m.puissance,m.carburant,v.kilometrage FROM voiture v, modele m, proprietaire p WHERE v.ID = p.id_voiture AND m.ID = v.id_modele AND p.id_voiture = v.ID";
        $result = $cnx->query($sql);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $cnx = null;
    

?>
<h1 class="title">Bienvenu a projet web1</h1>
<fieldset>
    <form action="" method="post">
        <center>
            
            <button type="submit" name="logout_submit" value="Logout" id="logout_submit">
                Logout
                <span class="material-symbols-outlined">logout</span>
            </button>
            <button type="button" name="rapport-btn" value="Le rapport">
                Le rapport
                <span class="material-symbols-outlined">description</span>
            </button>
            <button type="button" name="source-btn" value="Code source">
                Code source
                <span class="material-symbols-outlined">data_object</span>
            </button>
        </center>
    </form>
    <h2> Liste globale : </h2>
    <?php     

            if($result != NULL && $result->rowCount() > 0) {
                ?>
                <table border="1">
                    <tr>
                        <th>Proprietaire</th>
                        <th>Immatriculation du voiture</th>
                        <th>Modele</th>
                        <th>Puissance</th>
                        <th>Carburant</th>
                        <th>Kilometrage</th>
                    </tr>
            <?php foreach($result as $row) { ?>
                    <tr>
                        <td> <?php echo $row['nom']." ". $row['prenom']?>  </td>
                        <td> <?php echo $row['immatriculation']?> </td>
                        <td> <?php echo $row['modele']?> </td>
                        <td> <?php echo $row['puissance']?> </td>
                        <td> <?php echo $row['carburant']?> </td>
                        <td> <?php echo $row['kilometrage']?> </td>
                    </tr>
            <?php } ?>
                </table>
            <?php
                }else {
                    echo " <div class='wrapper_error-msg'><p class='error-msg'> Pas de resultat pour cette recherche !!</p></div>";
                }
            ?> 
</fieldset>