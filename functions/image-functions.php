<?php
    function uploadImage(){
        $errors=[];
        if(isset($_FILES['image']) AND $_FILES['image']['error']==0){
            //test file size
            if($_FILES['image']['size']<=1000000){
                //test authorised extension
                // var_dump($_FILES); test worked
                $allowedExtension = ['jpg', 'jpeg', 'gif','png'];
                $fileInfo = pathinfo($_FILES['image']['name']);
                // var_dump($fileInfo); test worked 
                $extension_upload = $fileInfo['extension'];
                if(in_array($extension_upload, $allowedExtension)){
                    //file validation
                    // var_dump($_FILES); test worked 
                    $fileName = uniqid().'.'.explode('/', $_FILES['image']['type'])[1];
                    // var_dump($fileName); test worked 
                    move_uploaded_file($_FILES['image']['tmp_name'],'assets/uploads/library/'.$fileName);
                    // move_uploaded_file($_FILES['image']['tmp_name'],'uploads/'.uniqid().'.'.$extension_upload);
                    echo('file uploaded !');
                }else{
                    // echo('file not valid');
                    $errors[]='file not valid';
                }
            }else{
                // echo('file too big');
                $errors[]='file too big';
            }
        }
    }


?>