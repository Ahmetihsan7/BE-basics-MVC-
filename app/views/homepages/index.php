<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">

    <div class="row mt-5 justify-content-center">

        <div class="col-8 text-center">
        <div class="container mt-3">

                <h2>Homepage</h2>

                <a href="<?= URLROOT; ?>/SmartphoneController/index">Overzicht smartphones</a> |
                <a href="<?= URLROOT; ?>/SneakersController/index">Mooiste Sneakers</a> |
                <a href="<?= URLROOT; ?>/HorlogesController/index">Duurste Horloges</a> |
                <a href="#">Rijkste zangeressen</a>

            </div>
        </div>

    </div>

</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>