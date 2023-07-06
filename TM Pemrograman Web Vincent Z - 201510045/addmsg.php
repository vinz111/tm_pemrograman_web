<?php
//addserver_page.php
include("data_class.php");


/* if(isset($_POST['branch']) || isset($_POST['bookprice'])){
  $branch=$_POST['branch'];
  $bookprice=$_POST['bookprice'];
} */
//$conn=new PDO('mysql:host=localhost; dbname=library_managment', 'root', '') or die(mysql_error());

$id=$_POST['id'];
$msg=$_POST['msg'];
$date=date("Y-m-d");

//$returnDate=Date('d/m/Y', strtotime('+'.$days.'days'));

$obj=new data();
$obj->setconnection();
$obj->addmsg($id,$msg,$date);
 

	
	