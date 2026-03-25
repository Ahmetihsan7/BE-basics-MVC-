<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h3><?= $data['title']; ?></h3>
        </div>
    </div>

    <div class="row mt-3 d-<?= $data['display']; ?>">
        <div class="col-12">
            <div class="alert alert-<?= $data['color'] ?? 'success'; ?>" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <a href="<?= URLROOT; ?>/SneakersController/create" class="btn btn-warning mb-3">Nieuwe Sneaker</a>
            
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Merk</th>
                        <th>Model</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Wijzig</th>
                        <th>Verwijder</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['sneakers'] as $sneaker) : ?>
                        <tr>
                            <td><?= $sneaker->Merk; ?></td>
                            <td><?= $sneaker->Model; ?></td>
                            <td><?= $sneaker->Type; ?></td>
                            <td>
                                <span class="badge bg-<?= ($sneaker->IsActief == 1) ? 'success' : 'secondary'; ?>">
                                    <?= ($sneaker->IsActief == 1) ? 'Actief' : 'Inactief'; ?>
                                </span>
                            </td>
                            
                            <td>
                                <a href="<?= URLROOT; ?>/SneakersController/update/<?= $sneaker->Id; ?>">
                                    <i class="bi bi-pencil-fill text-success"></i>
                                </a>
                            </td>
                            
                            <td>
                                <a href="<?= URLROOT; ?>/SneakersController/delete/<?= $sneaker->Id; ?>" 
                                   onclick="return confirm('Weet je zeker dat je deze sneaker wilt verwijderen?');">
                                    <i class="bi bi-trash-fill text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="mt-3">
                <a href="<?= URLROOT; ?>/homepages/index" class="text-decoration-none">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>