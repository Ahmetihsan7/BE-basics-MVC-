<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?= $data['title']; ?></h3>
        </div>
    </div>

    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-6">
            <div class="alert alert-success"><?= $data['message']; ?></div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">
            <form action="<?= URLROOT; ?>/HorlogesController/create" method="post">
                <div class="mb-3">
                    <label class="form-label">Merk</label>
                    <input name="merk" type="text" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Model</label>
                    <input name="model" type="text" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Prijs</label>
                    <input name="prijs" type="number" step="0.01" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Materiaal</label>
                    <input name="materiaal" type="text" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gewicht</label>
                    <input name="gewicht" type="number" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Releasedatum</label>
                    <input name="releasedatum" type="date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Waterdichtheid</label>
                    <input name="waterdichtheid" type="number" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <input name="type" type="text" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Verstuur</button>
            </form>
            <a href="<?= URLROOT; ?>/HorlogesController/index" class="mt-3 d-block"><i class="bi bi-arrow-left"></i></a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>