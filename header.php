<?php require_once("function.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
    <title>Sport</title>
</head>

<body>
    <!-- Header Start -->
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="insert.php">Insert</a></li>
    </ul>
    <!-- Header End -->
<?php 
    if(isset($_GET["msg"])){
?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $_GET["msg"]; ?>
</div>
    <?php } ?>