<?php
include("data_class.php");

if(isset($_REQUEST['id']))
{
    $id = $_REQUEST["id"];  

$obj=new data();
$obj->setconnection();
$data =$obj->getBookJSON($id);
// echo json_encode($data);
echo $data;
}else{
    header("Location:admin_service_dashboard.php?msg=id_not_provided");
}
