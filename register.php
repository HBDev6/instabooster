<?php
    require_once 'functions/user-functions.php';
    require_once 'pdo_connexion.php';

    if($_SERVER['REQUEST_METHOD']==='POST'){
        // analyzing form if method is POST
        // var_dump('$_POST');
        $errors = validateFormUser();


        if(count($errors)===0){
            registerUser($pdo);

        }else{
            // var_dump($errors);
            echo('<h4 style="color: red; text-decoration:underline;"> ERRORS have been found : </h4>');
            echo('<ul style="color: red">');
            foreach($errors as $error){
                echo('<li>'.$error.'</li>');
            }
            echo('</ul>');
        }
    }
?>

<h1>create an account</h1>



<form method="POST" action="register.php">
<!-- I don't put "required" attribute to test backend features, 
but we'll have to put them later -->
    <input type="text" placeholder="pseudo" name="pseudo" >
    <input type="text" placeholder="email" name="email">
    <input type="text" placeholder="first name" name="firstname">
    <input type="text" placeholder="last name" name="lastname">
    <input type="text" placeholder="password" name="password">
    <input type="submit">
</form>



<a href="login.php">already have an account ?</a>
