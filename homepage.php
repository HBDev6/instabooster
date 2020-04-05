<?php
    session_start(); //not sure of necessity
    require_once 'functions/user-functions.php';
    require_once 'pdo_connexion.php';
    $user = isUserConnected();
?>


<html>
<head>
    <?php include 'stylesheet.php' ?>
</head>
<body>
<?php include 'nav.php' ?>

    <h1>well done :) and welcome to HOMEPAGE <?php echo($user['pseudo'])?> </h1>
    <h2>you can see here your library</h2>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">filename</th>
                <th scope="col">location</th>
                <th scope="col">date</th>
                <th scope="col">user</th>
                <th scope="col">image</th>
            </tr>
        </thead>
        <tbody>
<?php
    $res = $pdo->query('SELECT * FROM library');
    while ($data = $res->fetch())
    {
?>  
            <tr>
                <th scope="row"><?php echo($data['id']); ?></th>
                <td><?php echo($data['filename']); ?></td>
                <td><?php echo($data['location']); ?></td>
                <td><?php echo($data['date']); ?></td>
                <td><?php echo($data['pseudo']); ?></td>
                <td>
                    <img style="max-width: 140px;" src="<?php echo('assets/uploads/library/'.$data['filename']); ?>"
                    alt="image <?php echo($data['filename']); ?>"/>
                </td>
            </tr>
<?php
    }
    $res->closeCursor();
?>
        </tbody>
    </table>




</body>
</html>