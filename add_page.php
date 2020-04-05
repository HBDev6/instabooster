<?php
    session_start(); //not sure of necessity
    require_once 'functions/user-functions.php';
    $user = isUserConnected();
?>


<html>
<head>
    <?php include 'stylesheet.php' ?>
</head>
<body>
<?php include 'nav.php' ?>

    <h1>you can add a picture here <?php echo($user['pseudo'])?> </h1>

    <form method="POST" enctype="multipart/form-data">
        <label>PICTURE</label>
        <input class="form-control" type="file" name="filename"><br>
        <label>location by data</label>
        <input class="form-control" type="text" id="locationID" name="location" placeholder="location"><br>
        <input type="submit">




    </form>


</body>
<?php
    include 'javascript.php';
?>
<script src="assets/js/geolocator.js"></script>
</html>