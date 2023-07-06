<?php
//addserver_page.php
include("data_class.php");

if(isset($_POST['id']))
{
    
$id=$_POST['id'];

$obj=new data();
$obj->setconnection();
$obj->deleteBook($id);
}else{
    header("Location:admin_service_dashboard.php?msg=id_not_provided");
}