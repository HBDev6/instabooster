<?php

function registerUser($pdo, $errors){
    // var_dump($_POST);
    try{
        $req = $pdo->prepare(
            'INSERT INTO users(pseudo, email, firstname , lastname, password)
            VALUES(:pseudo, :email, :firstname, :lastname, :password)');
        $req->execute([
            'pseudo' => $_POST['pseudo'],
            'email' => $_POST['email'],
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'password' => md5($_POST['password'])
        ]);
    } catch (PDOException $exception){
        echo('<br>exception has been caught :');
        // var_dump($exception);
        var_dump($exception->getcode());

        if(($exception->getcode())==='23000'){
            $errors[] = 'email already use';
        }
        // echo('<br><strong>echo test return errors');
        // var_dump($errors);
        // return $errors;
    }
    echo('<br><strong>echo test return errors 2');
    var_dump($errors);
    return $errors;
    // echo('<hr> registration done :)');
    // var_dump($result);
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


