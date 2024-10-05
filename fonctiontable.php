<?php 
function ShowTable($rows, $headers){
    ?>
    <table border="1">
    <tr>
    <?php foreach ($headers as $header): ?>
        <th><?php echo $header; ?></th>
    <?php endforeach; ?>
    </tr>

    <?php foreach ($rows as $row): ?>
        <tr>
        <?php for ($k = 0; $k < count($headers); $k++): ?>
            <?php if ($k == 0){ ?>
                <td><?php echo '<a class="colonne" href=formulaire.php?id='.$row[$k].'>'.$row[$k].'</a>'; ?></td>
            <?php } elseif ($k == (count($headers) - 1)) { ?>
                <td><?php echo '<a class="colonne" href="listsub.php?id='.$row[0].'">Abonnés</a>'; ?></td>

            <?php } else { ?>
                <td><?php echo $row[$k]; ?></td>
            <?php } ?>
        <?php endfor; ?>
        </tr>
    <?php endforeach; ?>

</table>


<?php
}
function getheaderTable() {
    $headers = array();
    $headers[] = "id";
    $headers[] = "name";
    $headers[] = "description";
    $headers[] = "price";
    $headers[] = "duration";
    $headers[] = "reduction";
    $headers[] = "Abonnés";

    return $headers;
}
?>
