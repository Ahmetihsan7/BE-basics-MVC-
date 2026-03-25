<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?= $data['title']; ?></h3>
        </div>
    </div>

    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-6">
            <div class="alert alert-info"><?= $data['message']; ?></div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">
            <form action="<?= URLROOT; ?>/SneakersController/update" method="post">
                <input type="hidden" name="id" value="<?= $data['sneaker']->Id; ?>">

                <div class="mb-3">
                    <label class="form-label">Merk</label>
                    <input name="merk" type="text" class="form-control" value="<?= $data['sneaker']->Merk; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Model</label>
                    <input name="model" type="text" class="form-control" value="<?= $data['sneaker']->Model; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <input name="type" type="text" class="form-control" value="<?= $data['sneaker']->Type; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Opmerking</label>
                    <input name="opmerking" type="text" class="form-control" value="<?= $data['sneaker']->Opmerking; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Is Actief (1=Ja, 0=Nee)</label>
                    <input name="is_actief" type="number" class="form-control" value="<?= $data['sneaker']->IsActief; ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Bijwerken</button>
            </form>

            <a href="<?= URLROOT; ?>/SneakersController/index" class="mt-3 d-block">
                <i class="bi bi-arrow-left"></i> Terug
            </a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>