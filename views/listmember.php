<div id="general">
    <h2>Kies een lid:</h2>

    <table id="members">
        <?php foreach($members as $member){ ?>
            <tr>
                <td><a href="edit.php?id=<?= $member->getId() ?>"><?= $member->getName() ?></a></td>
                <td><a href="edit.php?id=<?= $member->getId() ?>">wijzig</a></td>
                <td><a>verlof</a></td>
            </tr>
        <?php } ?>
    </table>
</div>
