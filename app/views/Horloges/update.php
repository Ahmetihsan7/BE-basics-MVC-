<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?= $data['title']; ?></h3>
        </div>
    </div>

    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-6">
            <div class="alert alert-<?= $data['color'] ?? 'success'; ?>" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">
            <form action="<?= URLROOT; ?>/HorlogesController/update" method="post">
                <input type="hidden" name="id" value="<?= $data['horloge']->Id; ?>">

                <div class="mb-3">
                    <label class="form-label">Merk</label>
                    <input name="merk" type="text" class="form-control" value="<?= $data['horloge']->Merk; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Model</label>
                    <input name="model" type="text" class="form-control" value="<?= $data['horloge']->Model; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Prijs</label>
                    <input name="prijs" type="number" step="0.01" class="form-control" value="<?= $data['horloge']->Prijs; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Materiaal</label>
                    <input name="materiaal" type="text" class="form-control" value="<?= $data['horloge']->Materiaal; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gewicht (gr)</label>
                    <input name="gewicht" type="number" class="form-control" value="<?= $data['horloge']->Gewicht; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Releasedatum</label>
                    <input name="releasedatum" type="date" class="form-control" value="<?= $data['horloge']->Releasedatum; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Waterdichtheid (ATM)</label>
                    <input name="waterdichtheid" type="number" class="form-control" value="<?= $data['horloge']->Waterdichtheid; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <input name="type" type="text" class="form-control" value="<?= $data['horloge']->Type; ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Bijwerken</button>
            </form>
            <a href="<?= URLROOT; ?>/HorlogesController/index" class="btn btn-link mt-3 p-0">
                <i class="bi bi-arrow-left"></i> Terug
            </a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>