<?php
    try{
        $sql = "SELECT * FROM modele";
        $result = $cnx->query($sql);
        $cnx = null;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>
<h1 class="title">Liste des modeles</h1>
<fieldset>
    <legend>Les modeles : </legend>
    <table border="1">
        <tr>
            <th>Modéle</th>
            <th>Marque</th>
            <th>Puissance</th>
            <th>Carburant</th>
        </tr>

    <?php
        foreach ( $result as $row) {
            echo "<tr>";
            for ($i = 1 ;$i < count($row) /2; $i++) {
                    echo "<td>$row[$i]</td>";
            }
            echo "</tr>";
        }

        ?>

    </table>
</fieldset>