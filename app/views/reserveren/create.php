<?php require APPROOT . '/views/includes/navbar.php'; ?>
<h3><?= $data['title'] ?></h3>
<form class="form-group" action="<?= URLROOT; ?>contact/addContact" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    Voornaam:
                </td>
                <td>
                    <input class="form-control" type="text" name="Voornaam">
                </td>
            </tr>
            <tr>
                <td>
                    Tussenvoegsel:
                </td>
                <td>
                    <input class="form-control" type="text" name="Tussenvoegsel">
                </td>
            </tr>
            <tr>
                <td>
                    Achternaam:
                </td>
                <td>
                    <input class="form-control" type="text" name="Achternaam">
                </td>
            </tr>
            <tr>
                <td>
                    Telefoonnummer:
                </td>
                <td>
                    <input class="form-control" type="text" name="Mobiel">
                </td>
            </tr>
            <tr>
                <td>
                    Email:
                </td>
                <td>
                    <input class="form-control" type="email" name="Email">
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