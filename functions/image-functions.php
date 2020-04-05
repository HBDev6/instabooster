<?php

    function addImageDB($pdo, $fileName){
        $dateNow = new DateTime();
        // var_dump($_SESSION);
        $userName=$_SESSION['user']['firstname'].' '.$_SESSION['user']['lastname'].' {'.$_SESSION['user']['pseudo'].'}';
        // var_dump($userName);
        $location = $_POST['location'];
        var_dump($location);
        
        try{
            $req = $pdo->prepare(
                'INSERT INTO library(filename, location, date , pseudo)
                VALUES(:filename, :location, NOW(), :pseudo)');
            $req->execute([
                'filename' => $fileName,
                'location' => $location,
                // 'date' => $dateNow->format('d/m/y'),
                'pseudo' => $userName
            ]);
        } catch (PDOException $exception){
            var_dump($exception);
            die();
        }
        // return $errors;

    }   

    function uploadImage(){
        $errors=[];
        // if(isset($_FILES['image']) AND $_FILES['image']['error']==0){
            //test file size
            if($_FILES['image']['size']===0){
                $errors[]='empty upload';
            }else if($_FILES['image']['size']<=1000000){
                //test authorised extension
                $allowedExtension = ['jpg', 'jpeg', 'gif','png'];
                $fileInfo = pathinfo($_FILES['image']['name']);
                $extension_upload = $fileInfo['extension'];
                if(in_array($extension_upload, $allowedExtension)){
                    //file validation
                    $fileName = uniqid().'.'.explode('/', $_FILES['image']['type'])[1];
                    move_uploaded_file($_FILES['image']['tmp_name'],'assets/uploads/library/'.$fileName);
                    echo('file uploaded !');
                }else{
                    // echo('file not valid');
                    $errors[]='file not valid';
                }
            }else{
                // echo('file too big');
                $errors[]='file too big';
            }
            // var_dump($errors);
            // return $errors;
            return ['errors'=>$errors, 'fileName'=>$fileName];
        }
    // }


?>