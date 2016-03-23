<?php if($gift_notifications): ?>
    <?php foreach($gift_notifications as $notification): ?>
        <?php if($notification == 'thank_you'): ?>
            <p>Vielen Dank für deine Spende. Diese wurde erfolgreich registriert</p>
        <?php else: ?>
            <?= $notification ?>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>

<div>
    <?= $data ?>
</div>