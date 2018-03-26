<h2>Kies een lid:</h2>

<ul id="members">
    <?php foreach($members as $member){ ?>
    <a href="edit.php?id=<?= $member-getId()?>"
        <li><?= $member->getName() ?></li>
    </a>
    <?php } ?>
</ul>