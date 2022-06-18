<?php

include "config.php";


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Meet page</title>
    <link rel="stylesheet" href="assets/index.css">
</head>
<body>
<div id="date_time" class="top">
</div>
<section>
    <h2>&#128515;Good Morning! Interns</h2>
    <table>
        <tr>
            <th>&#129299;Meeting Title</th>
            <th>⏰Time</th>
            <th>🔐Join</th>
        </tr>
        <tr>
            <td colspan="100%" class="border"></td>
        </tr>


        <?php

        $reference = "Meetings";


        $data = $database->getReference($reference)->getValue();
        $i = 0;
        foreach ($data as $key => $data1) {
            $i++;

            ?>
            <tr>
                <td><?php echo $data1['Meeeting_title']; ?></td>
                <td>⏰ <?php echo $data1['Meeting_time']; ?></td>
                <td>

                    <a href="join.php?id=<?php echo $key; ?>&meeting=<?php echo $data1['Meeeting_title']; ?>"
                       class="join">Join</a></td>
            </tr>
        <?php } ?>
    </table>
</section>
<script type="text/javascript">
    const c_date = new Date();

    var filterd_date = c_date.toLocaleDateString('hi-IN', options);
    var filterd_time = c_date.toLocaleTimeString('hi-IN', options);

    function startTime() {
        const today = new Date();
        let h = today.getHours();
        let m = today.getMinutes();
        let s = today.getSeconds();
        var ampm = h >= 12 ? ' PM' : ' AM';
        m = checkTime(m);
        s = checkTime(s);
        setTimeout(startTime, 1000);
        document.getElementById('date_time').innerHTML = "⏳"+ h + ":" + m + ":" + s + ampm+"  -  " +"📆" +filterd_date ;
    }

    startTime();

    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }


</script>
</body>
</html>
