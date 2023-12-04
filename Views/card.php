<div class="col-12 col-md-4 col-lg-3 mb-3">
    <div class="card">
        <img src="<?= $image ?>" class="card-img-top my-ratio" alt="<?= $title ?>">
        <div class="card-body">
            <h5 class="card-title">
                <?= $title ?>
            </h5>
            <p class="card-text">
                <?= $overview ?>
            </p>
            <small>
                <?= $genre ?>
            </small>
            <div class="d-flex justify-content-between align-items-flex-start">
                <small>
                    <?= $vote ?>
                </small>

                <div style="width: 40px">
                    <img src="<?php echo $flag ?>" alt="language" class="w-100">
                </div>
            </div>

        </div>
    </div>
</div>