<?php
    session_start(); //not sure of necessity
    require_once 'pdo_connexion.php';
    require_once 'functions/user-functions.php';
    require_once 'functions/image-functions.php';
    $errors=[];
    $errorAndLink=[];
    $user = isUserConnected();

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $errorAndLink = uploadImage();
        if($errorAndLink['fileName']){
            addImageDB($pdo, $errorAndLink['fileName']); //instead of "$fileName"
            header('Location: homepage.php');
        } else {
            $errors = $errorAndLink['errors'];
        }
    }
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
        <input class="form-control" type="file" name="image"><br>
        <label>location by data</label>
        <input class="form-control" type="text" id="locationInput" name="location" placeholder="location"><br>
        <input type="submit">
    </form>

<?php 
        // var_dump($errorAndLink);
        if(!empty($errorAndLink['errors'])){
            echo('<h4 style="color: red; text-decoration:underline;"> ERRORS have been found : </h4>');
            echo('<ul style="color: red">');
            foreach($errorAndLink['errors'] as $error){
                echo('<li>'.$error.'</li>');
            }
            echo('</ul>');
        }
        // } else if($errorAndLink === null){
        //     echo('empty input, please browse a valid file to upload');
        // }
?>

</body>
<?php
    include 'javascript.php';
?>
<script src="assets/js/geolocator.js"></script>
</html>