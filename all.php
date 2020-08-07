<!-- Header file include -->
<?php require_once("header.php"); ?>

<div class="container">

    <h2>ALl Details</h2>

    <table>
        <tr>
            <th>Name</th>
            <th>Player Count</th>
            <th>Indoor</th>
            <th>Referee Count</th>
            <th>Origin</th>
            <th>Action</th>
        </tr>
        <?php
        $record = $obj->getData("sport");
        if ($record) {

            foreach ($record as $row) {

        ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['player_count']; ?></td>
                    <td><?php echo $row['indoor']; ?></td>
                    <td><?php echo $row['referee_count']; ?></td>
                    <td><?php echo $row['origin']; ?></td>
                    <td><a href="update.php?sport_id=<?php echo $row["sport_id"] ?>"><button class="edit">Edit</button></a><a href="function.php?delete=<?php echo $row["sport_id"] ?>"><button class="delete">Delete</button></a></td>
                </tr>
        <?php

            }
        } else {
            echo "<h2>Record not found</h2>";
        } ?>
    </table>

</div>

</body>

</html>