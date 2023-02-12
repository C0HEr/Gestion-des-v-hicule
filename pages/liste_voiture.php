<?php
    try{
        $sql = "SELECT v.immatriculation, v.couleur, v.kilometrage,m.modele FROM voiture v,modele m WHERE v.id_modele = m.id";
        $result = $cnx->query($sql);
        $cnx = null;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>
<h1 class="title">Liste des voitures</h1>
<fieldset>
    <legend>Les voitures : </legend>
    <table border="1">
        <tr>
            <th>Immatriculation</th>
            <th>Couleur</th>
            <th>Kilometrage</th>
            <th>Modele</th>
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