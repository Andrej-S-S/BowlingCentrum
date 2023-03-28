<?php require APPROOT . '/views/includes/navbar.php';?>

<h3 class="d-flex justify-content-center"><?= $data['title'] ?></h3>
<table class='table'>
<thead>
    <th>Naam</th>
    <th>Email</th>
    <th>Mobiel</th>
    <th>Volwassen</th>
    <th>Bewerken</th>
    <th>Verwijderen</th>
  </thead>
  <tbody>
    <?=$data['rows']?>
  </tbody>
</table>