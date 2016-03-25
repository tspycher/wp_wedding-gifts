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
    <?php foreach($data as $gift): ?>
        <tr class="alternate">
            <th class="check-column" scope="row"><?= $gift->getId() ?></th>
            <th class="check-column"><?= $gift->getName() ?></th>
            <td class="column-columnname"><?= $gift->getDescription()?></td>
            <td class="column-columnname"><?= $gift->getTotal()?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>