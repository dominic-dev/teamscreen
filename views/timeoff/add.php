<?php include('../header.php'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../../assets/jquery.datetimepicker.full.js"></script>
<link rel="stylesheet" type="text/css" href="../../assets/jquery.datetimepicker.min.css"/ >

<div id="general">
    <h2>Voeg vrije tijd toe voor:</h2>
    <h3><?= $member->getName() ?></h3>

    <form action="add.php" method="post">
        <input type="hidden" name="id" id="id" value="<?= $_GET['id'] ?>" />
        <div>
            <label for="start">Startmoment:</label>
            <input class="datetimepicker" type="text" id="start" name="start" readonly/>
        </div>

        <div>
            <label for="end">Eindmoment:</label>
            <input class="datetimepicker" type="text" id="end" name="end" readonly/>
        </div>

        <button name="addTimeOffButton" type="submit">Voeg toe</button>
    </form>
</div>

<script>
    jQuery('.datetimepicker').datetimepicker({
        format: 'Y-m-d H:m:s'
    });
</script>