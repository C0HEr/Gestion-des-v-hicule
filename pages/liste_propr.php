<?php
    try{
        $sql = "SELECT p.nom,p.prenom,p.adresse,p.code_postal,p.ville,p.tel,v.immatriculation FROM proprietaire p,voiture v WHERE p.id_voiture = v.id";
        $result = $cnx->query($sql);
        $cnx = null;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>
<h1 class="title">Liste des propriétaires</h1>
<fieldset>
    <legend>Les propriétaires : </legend>
    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>Code postal</th>
            <th>Ville</th>
            <th>N°Telephone</th>
            <th>Matricul</th>
        </tr>

    <?php
        foreach ( $result as $row) {
            echo "<tr>";
            for ($i = 0 ;$i < count($row) /2; $i++) {
                    echo "<td>$row[$i]</td>";
            }
            echo "</tr>";
        }

        ?>

    </table>
</fieldset>