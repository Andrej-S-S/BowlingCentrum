<?php var_dump($data) ?>

<?php require APPROOT . '/views/includes/navbar.php';?>


<form action="<?php URLROOT ?>/ContactInformation/update" method="post">
<h3><?= $data["Voornaam"], $data["Tussenvoegsel"], $data["Achternaam"] ; ?></h3>
<input type="text" name="Email" id="Email" value="<?= $data["Email"]; ?>">
<input type="number" name="Mobiel" id="Mobiel" value="<?= $data["Mobiel"]; ?>">
<h4> <?= $data["IsVolwassen"]; ?> </h4>
<button>klik</button>
</form>