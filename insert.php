<!-- Header file include -->
<?php require_once("header.php"); ?>

<div class="container">

    <h2>Insert Details</h2>

    <form name="myForm" onsubmit="return validate()" action="function.php" method="post">

        <div class="input_box">
            <label>Player Name</label><br>
            <input oninput="return validate()" class="input_style" type="text" name="name" id=""><br>
            <span id="name" style="color:red"></span>
        </div>

        <div class="input_box">
            <label>Player Count</label><br>
            <input class="input_style" type="text" name="player_count" id="">
        </div>

        <div class="input_box">
            <label>Indoor</label><br>
            <input class="input_style" type="text" name="indoor" id="">
        </div>

        <div class="input_box">
            <label>Referee Count</label><br>
            <input class="input_style" type="text" name="referee_count" id="">
        </div>

        <div class="input_box">
            <label>Origin</label><br>
            <input class="input_style" type="text" name="origin" id="">
        </div>

        <div class="input_box">
            <input class="submit_button" type="submit" name="insert" value="insert">
        </div>

    </form>

</div>

</body>

</html>