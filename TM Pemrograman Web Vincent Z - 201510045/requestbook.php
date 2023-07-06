<?php

include "data_class.php";

$userid = $_GET['userid'];
$bookid = $_GET['bookid'];

$obj = new data();
$obj->setconnection();
$obj->requestbook($userid, $bookid);

//$obj->deleterequest($userid, $bookid);




//include "db.php";
//error_reporting(0);
//session_start();

//mysqli_query("DELETE FROM requestbook WHERE userid = '".$_GET['req_del']."'");
//echo "done";
//header("location:all_users.php");  


