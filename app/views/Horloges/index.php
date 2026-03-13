<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">

            <h3><?= $data['title']; ?></h3>

            <a href="<?= URLROOT; ?>/HorlogesController/create" class="btn btn-warning mb-3">
                Nieuwe Horloge
            </a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Merk</th>
                        <th>Model</th>
                        <th>Prijs</th>
                        <th>Materiaal</th>
                        <th>Gewicht</th>
                        <th>Releasedatum</th>
                        <th>Waterdichtheid</th>
                        <th>Type</th>
                        <th>Verwijder</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($data['result'] as $horloge) : ?>
                        <tr>
                            <td><?= $horloge->Merk; ?></td>
                            <td><?= $horloge->Model; ?></td>
                            <td><?= $horloge->Prijs; ?></td>
                            <td><?= $horloge->Materiaal; ?></td>
                            <td><?= $horloge->Gewicht; ?></td>
                            <td><?= $horloge->Releasedatum; ?></td>
                            <td><?= $horloge->Waterdichtheid; ?></td>
                            <td><?= $horloge->Type; ?></td>

                            <td class="text-center">
                                <a href="<?= URLROOT; ?>/HorlogesController/delete/<?= $horloge->Id; ?>">
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