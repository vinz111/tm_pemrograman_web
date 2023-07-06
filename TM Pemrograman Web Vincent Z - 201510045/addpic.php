<?php

    $con = mysqli_connect('localhost','root','','library_managment');
    if(!$con){
        die("Connection Failed: ". mysqli_connect_error());
    }

    foreach($_FILES['images']['name'] as $key => $name){
        $newFilename = time() . "_" . $name;
        move_uploaded_file($_FILES['images']['tmp_name'][$key], 'images/' . $newFilename);
        $location = 'images/' . $newFilename;

        mysqli_query($con,"insert into img (image) values ('$location')");
    }
    header("Location:admin_service_dashboard.php?msg=done");

















    // if(isset($_POST['submit'])){
    //     for ($i=0; $i < count($_FILES['images']['name']) ; $i++) { 
    //         $filename = $_FILES['images']['name'][$i];
    //         $tmp_name = $_FILES['images']['tmp_name'][$i];
    //         $extention = pathinfo($filename, PATHINFO_EXTENSION);
    //         $newFilename = uniqid("NKPL-", true);
    //         $uploadDir ="images/";
    //         $destinationPath = $uploadDir.$newFilename.".".$extention;
           
    //         if(move_uploaded_file($tmp_name,$destinationPath)){
    //             $query = "INSERT INTO img ('image') VALUES ('$destinationPath')";
    //             $result = mysqli_query($con,$query);
    //             if($result){
    //                 echo "Upload Successfully <br>";
    //             }else{
    //                 echo "Upload Fail to db..";
    //             }

    //         }else{
    //             echo "Upload Fail";
    //         }

    //     }
    // }

?>