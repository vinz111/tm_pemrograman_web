<?php
//addserver_page.php
include("data_class.php");


/* if(isset($_POST['branch']) || isset($_POST['bookprice'])){
  $branch=$_POST['branch'];
  $bookprice=$_POST['bookprice'];
} */
//$conn=new PDO('mysql:host=localhost; dbname=library_managment', 'root', '') or die(mysql_error());
$conn = mysqli_connect('localhost','root','','library_managment');
if(isset($_POST['submit'])){

  

  $fileName = $_FILES['bpdf']['name'];
  $fileTmpName = $_FILES['bpdf']['tmp_name'];
  $path = "uploads/".$fileName;

    //$id=$_POST['id'];
    $pid=$_POST['pid'];

    $pname=$_POST['pname'];
    $pauthor=$_POST['pauthor'];
// if (move_uploaded_file($_FILES["bpdf"]["tmp_name"],"uploads/pdf" . $_FILES["bpdf"]["name"])) {

//     $bpdf=$_FILES["bpdf"]["name"];

// $obj=new data();
// $obj->setconnection();
// $obj->addpdf($id, $pid,$pname,$pauthor,$bpdf);
// //$obj->addpdf($id,$pid,$pname,$pauthor,$bpdf);
//   } 
//   else {
//      echo "File not uploaded";
// }

$query = "INSERT INTO pdf(pid, pname, pauthor, bpdf) VALUES ('$pid', '$pname', '$pauthor', '$fileName')";
$run = mysqli_query($conn,$query);
        
  if($run){
    move_uploaded_file($fileTmpName,$path);
    header("Location:admin_service_dashboard.php?msg=done");
  }
  else{
   echo "error".mysqli_error($conn);
   header("Location:admin_service_dashboard.php?msg=fail");
  }
}
	
	