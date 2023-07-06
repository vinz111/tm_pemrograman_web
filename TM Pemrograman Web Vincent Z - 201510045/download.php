<?php
// $conn = mysqli_connect('localhost', 'root', '', 'library_managment');
// if(!empty($_GET['file'])){
    

//     $fileName = basename($_GET['file']);

//     $filePath = 'uploads/'.$fileName;

//     if(!empty($fileName) && file_exists($filePath)){
//         header("Cache-Control: public");
//         header("Content-Description: File Transfer");
//         header("Content-Disposition: attachment; filename=" .basename($filePath));
//         header("Content-Type: application/pdf");
//         header("Content-Transfer-Encoding: binary");

//         readfile($filePath);
//         exit;

//     }
//     else{
//         echo"file not exit";
//     }


if(!empty($_GET['file'])){
    $fileName  = basename($_GET['file']);
    $filePath  = "uploads/".$fileName;
    
    if(!empty($fileName) && file_exists($filePath)){
        //define header
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        
        //read file 
        readfile($filePath);
        exit;
    }
    else{
        echo "file not exit";
    }
}
