<?php
//set language to Dutch
setlocale(LC_TIME, 'nld_nld');
//return date
//echo strftime('%e %B %Y',time());
$date = strftime('%e %B %Y',time());
?>
<!DOCTYPE html>
<html>
<head>
    <script src="time.js">

    </script>

    <?php
    echo $date;
    ?>
<!--        // shows date-->
<!--        function startDate(){-->
<!--            var date = new Date();-->
<!--            var day = date.getDate(); // daynumber-->
<!--            var month = date.getMonth(); // monthnumber-->
<!--            var year = date.getFullYear();-->
<!---->
<!--            var months = new Array('januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus', 'september', 'oktober', 'november', 'december');-->
<!--            document.getElementById('date').innerHTML =-->
<!--                day+" "+months[month]+" "+year;-->
<!--            setTimeout(startDate, 3600000);-->
<!--        }-->


</head>

<body onload="startTime()">

<div id="clock"></div>
</body>

<script>


</script>
</html>

