<?php require APPROOT . '/views/includes/head.php';
  echo $data["title"];
?>
<a href="<?=URLROOT;?>/countries/create">Nieuw record</a>
<table>
  <thead>
    <th>Naam</th>
    <th>Email</th>
    <th>Mobiel</th>
    <th>Volwassen</th>
    <th>Bewerken</th>
    <th>Verwijderen</th>
  </thead>
  <tbody>
    <?=$data['countries']?>
  </tbody>
</table>
<a href="<?=URLROOT;?>/homepages/index">terug</a>

