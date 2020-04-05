<?php

function registerUser(){

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


