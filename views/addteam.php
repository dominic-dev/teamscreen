<?php require_once('../header.php');


    /* authors : Agung & Dominic
    22 March 2018 */

session_start();
if(isset($_SESSION['addSuccess'])) {
    $success = $_SESSION['addSuccess'];
}
else {
    $success ='';
}
unset($_SESSION['addSuccess']);



?>

    <title>Nieuw team</title>
</head>
<body>

<div id="general">

    <h1>Nieuw team</h1>

    <h2><?= $success ?> </h2>
    <form action="./add.php" method="post">
        <table>
            <tr>
                <td><label for="name">Team naam</label> </td>
                <td> <input type="text" name="name"/></td>
            </tr>
        </table>

        <br>
        <br>

        <button type="submit" name="addTeam">Maak team aan</button>

    </form>


</div>

</body>


</html>
