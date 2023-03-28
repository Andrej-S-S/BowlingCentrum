<?php require APPROOT . '/views/includes/navbar.php'; ?>
<h3 class="d-flex justify-content-center"><?= $data['title'] ?></h3>
<table class="table table-warning table-bordered">
    <thead>
        <th>Datum</th>
        <th>Tijd</th>
        <th>Aantal volwassenen en kinderen</th>
        <th>Update</th>
        <th>Delete</th>
    </thead>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
</table>