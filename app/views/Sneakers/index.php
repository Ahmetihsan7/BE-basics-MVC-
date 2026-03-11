<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
<div class="row mt-3 d-flex justify-content-center">

<div class="col-10">

<h3><?= $data['title']; ?></h3>

<table class="table table-striped">

<thead>
<tr>
<th>Merk</th>
<th>Model</th>
<th>Type</th>
<th>Verwijder</th>
</tr>
</thead>

<tbody>

<?php foreach($data['result'] as $sneaker) : ?>

<tr>

<td><?= $sneaker->Merk; ?></td>
<td><?= $sneaker->Model; ?></td>
<td><?= $sneaker->Type; ?></td>

<td class="text-center">
<a href="<?= URLROOT; ?>/SneakersController/delete/<?= $sneaker->Id; ?>">
<i class="bi bi-trash3-fill text-danger"></i>
</a>
</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

<a href="<?= URLROOT; ?>/homepages/index">
<i class="bi bi-arrow-left"></i>
</a>

</div>
</div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>