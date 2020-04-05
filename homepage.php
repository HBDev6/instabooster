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

    <h1>well done :) and welcome to HOMEPAGE <?php echo($user['pseudo'])?> </h1>

</body>
</html>