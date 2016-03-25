<?= $data->getName() ?>
<?= $data->getTotal() ?>
</br>
<?= $data->getPercent() ?>

<div id="content">
    <form method="post" action="">
        Amount <input type="text" name="_amount"/>
        <?php if(!$current_user->ID): ?>
            Name <input type="text" name="_name"/>
        <?php endif; ?>
        Comment <input type="text" name="_comment"/>

        <input type="submit" value="Donate" />
        <input type="hidden" name="gift_id" value="<?= $data->getId() ?>" />
        <input type="hidden" name="wedding_gift_action" value="donate" />
    </form>
</div>