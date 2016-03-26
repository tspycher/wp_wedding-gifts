<?php if($gift_notifications): ?>
    <?php foreach($gift_notifications as $notification): ?>
        <?php if($notification == 'thank_you'): ?>
            <div class="alert alert-success" role="alert">
                <strong>Vielen herzlichen Dank</strong> für deine Spende. Diese wurde erfolgreich registriert. Du wirst von uns eine Email als
                Bestätigung erhalten mit Angaben zum Konto welches von den Trauzeugen verwaltet wird.
            </div>
        <?php else: ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?= $notification ?>
            </div>

        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>

<div class="row">
    <?php foreach($data as $d): ?>
        <?= $d ?>
        <?php if((array_search($d, $data)+1) % 3 == 0): ?>
        </div>
        <div class="row">
        <?php endif; ?>
    <?php endforeach; ?>
</div>
