<div class="col-md-4">
    <h2><?= $data->getName() ?></h2>
    <a href="<?= $data->getUrl()?>" target="_blank">
        <img src="<?= $data->getPictureUrl() ?>" alt="<?= $data->getName() ?> Bild" class="img-thumbnail" width="200px">
    </a>
    <?php if($data->getPrice()): ?>
        <p class="lead">
            Wert des Geschenkes CHF <?= number_format($data->getPrice(),0,'.','\'') ?>.-
        </p>
    <?php endif; ?>
    <p>
        <?= $data->getDescription() ?>
    </p>

    <?php if($data->getPrice()): ?>
        <?php if(!$data->getFixprice()): ?>
        <p>Bereits geschenkt sind <?= number_format($data->getTotal(),0,'.','\'') ?>.-</p>
        <div class="progress">
            <div class="progress-bar" name="<?= $data->getId() ?>" id="<?= $data->getId() ?>" role="progressbar" aria-valuenow="<?= $data->getPercent() ?>" aria-valuemin="0" aria-valuemax="100"  style="width: <?= $data->getPercent() ?>%;">
                <?= $data->getPercent() ?>%
            </div>
        </div>
        <?php else: ?>
            <?php if($data->getDonations()): ?>
                <p>
                    Dieses Geschenk wurde bereits vergeben.
                </p>
            <?php endif; ?>
        <?php endif; ?>

        <?php if($data->isGiftable()): ?>
            <button href="#Foo_<?= $data->getId()?>" class="btn btn-default" data-toggle="collapse">schenken</button>
            </br>
            <div id="Foo_<?= $data->getId()?>" class="collapse">
                <div id="content">
                    <form method="post" action="">
                        <?php if($data->getFixprice()): ?>
                            <input type="hidden" name="_amount" value="<?= $data->getPrice()?>" />
                        <?php else: ?>
                            <div class="input-group">
                                <span class="input-group-addon" id="sizing-addon2">Betrag</span>
                                <input type="text" class="form-control" name="_amount" placeholder="0.0" aria-describedby="sizing-addon2">
                            </div>
                        <?php endif; ?>


                        <?php if(!$current_user->ID): ?>
                            <div class="input-group">
                                <span class="input-group-addon" id="sizing-addon2">Name</span>
                                <input type="text" class="form-control" name="_name" placeholder="Han Solo" aria-describedby="sizing-addon2">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="sizing-addon2">Email</span>
                                <input type="text" class="form-control" name="_email" placeholder="han.solo@starwars.com" aria-describedby="sizing-addon2">
                            </div>
                        <?php endif; ?>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">Kommentar</span>
                            <input type="text" class="form-control" name="_comment" aria-describedby="sizing-addon2">
                        </div>

                        <input type="submit" value="Jetzt schenken" />
                        <input type="hidden" name="gift_id" value="<?= $data->getId() ?>" />
                        <input type="hidden" name="wedding_gift_action" value="donate" />
                    </form>
                </div>
            </div>
        <?php endif; ?>

    <?php endif; ?>
</div>