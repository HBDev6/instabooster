<?php

function registerUser($pdo){
    var_dump($_POST);

    $req = $pdo->prepare(
        'INSERT INTO users(pseudo, email, firstname , lastname, password)
        VALUES(:pseudo, :email, :firstname, :lastname, :password)');
    $req->execute([
        'pseudo' => $_POST['pseudo'],
        'email' => $_POST['email'],
        'firstname' => $_POST['firstname'],
        'lastname' => $_POST['lastname'],
        'password' => $_POST['password'],
    ]);
    echo('<hr> registration done :)');
    // die();

}



function validateFormUser(){
    $errors = [];
    if(empty($_POST['pseudo'])){
        $errors[]='pseudo : no input';
    }
    if(empty($_POST['email'])){
        $errors[]='email : no input';
    }
    if(empty($_POST['firstname'])){
        $errors[]='firstname : no input';
    }
    if(empty($_POST['lastname'])){
        $errors[]='lastname : no input';
    }
    if(empty($_POST['password'])){
        $errors[]='password : no input';
    }
    return $errors;
}
?>


