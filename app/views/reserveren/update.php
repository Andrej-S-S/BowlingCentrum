<?php var_dump($data) ?>

<?php require APPROOT . '/views/includes/navbar.php'; ?>
<!-- <h3 class="d-flex justify-content-center"><?= $data['title'] ?></h3> -->
<form class="form-group" action="<?= URLROOT; ?>/reserveren/update" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    Datum:
                </td>
                <td>
                    <input class="form-control" type="date" name="Datum" value="<?php echo $data['Datum'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Tijd:
                </td>
                <td>
                    <input class="form-control" type="time" name="BeginTijd" value="<?php echo $data['BeginTijd'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Aantal volwassenen:
                </td>
                <td>
                    <input class="form-control" type="text" name="Volwassenen" value="<?php echo $data['Volwassenen'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Aantal kinderen:
                </td>
                <td>
                    <input class="form-control" type="text" name="Kinderen" value="<?php echo $data['Kinderen'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Verstuur">
                </td>
            </tr>
        </tbody>
    </table>
</form>