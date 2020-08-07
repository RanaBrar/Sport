<!-- Header file include -->
<?php require_once("header.php"); ?>

<div class="container">

    <?php if (isset($_GET["sport_id"])) {
        $sport_id = $_GET["sport_id"];
        $where = array(
            "sport_id" => $sport_id,
        );
        $row = $obj->selectDataSingle("sport", $where);

        if ($row) {
    ?>

            <h2>Update Details</h2>

            <form name="myForm" onsubmit="return validate()" action="function.php" method="post">

                <input type="hidden" name="sport_id" value="<?php echo $row["sport_id"]; ?>">
                <div class="input_box">
                    <label>Player Name</label><br>
                    <input oninput="return validate()" class="input_style" type="text" name="name" id="" value="<?php echo $row["name"]; ?>"><br>
                    <span id="name" style="color:red"></span>
                </div>

                <div class="input_box">
                    <label>Player Count</label><br>
                    <input class="input_style" type="text" name="player_count" id="" value="<?php echo $row["player_count"]; ?>">
                </div>

                <div class="input_box">
                    <label>Indoor</label><br>
                    <input class="input_style" type="text" name="indoor" id="" value="<?php echo $row["indoor"]; ?>">
                </div>

                <div class="input_box">
                    <label>Referee Count</label><br>
                    <input class="input_style" type="text" name="referee_count" id="" value="<?php echo $row["referee_count"]; ?>">
                </div>

                <div class="input_box">
                    <label>Origin</label><br>
                    <input class="input_style" type="text" name="origin" id="" value="<?php echo $row["origin"]; ?>">
                </div>

                <div class="input_box">
                    <input class="submit_button" type="submit" name="update" value="update">
                </div>

            </form>
    <?php }
    } ?>
</div>

</body>

</html>