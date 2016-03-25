<p>das sind alle Donations</p>



<table class="widefat fixed" cellspacing="0">
    <thead>
    <tr>

        <th id="cb" class="manage-column column-cb check-column" scope="col">ID</th>
        <th id="columnname" class="manage-column column-columnname" scope="col"></th>
        <th id="columnname" class="manage-column column-columnname num" scope="col"></th>

    </tr>
    </thead>

    <tfoot/>

    <tbody>
    <?php foreach($data as $donation): ?>
        <tr class="alternate">
            <th class="check-column" scope="row"><?= $donation->getId() ?></th>
            <th class="check-column"><?= $donation->getGift()->getName() ?></th>
            <td class="column-columnname"><?= $donation->getWho()?></td>
            <td class="column-columnname"><?= $donation->getAmount()?></td>
            <td class="column-columnname"><?= $donation->getComment()?></td>
            <td class="column-columnname"><?= $donation->getDate()?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>