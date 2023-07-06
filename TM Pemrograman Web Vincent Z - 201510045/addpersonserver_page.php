<?php

include("data_class.php");

            /* addmid
            addname
            addgen
            addage
            type 
           addoccupation
            contact
            address
          addemail
           addpass */
           
           $memberid= $_POST['addmid'];
           $addnames=$_POST['addname'];
           $gender= $_POST['addgen'];
           $age= $_POST['addage'];
           $type= $_POST['type'];
           $occupation= $_POST['addoccupation'];
           $contact= $_POST['contact'];
           $address= $_POST['address'];
           $addmail= $_POST['addmail'];
           $addpass= $_POST['addpass'];

           


/* $addnames=$_POST['addname'];
$addpass= $_POST['addpass'];
$addemail= $_POST['addemail'];
$contact= $_POST['contact'];
$address= $_POST['address'];
$type= $_POST['type'];

$memberid= $_POST['addmid'];
$gender= $_POST['addgen'];
$age= $_POST['addage'];
$occupation= $_POST['addoccupation'];
 */

$obj=new data();
$obj->setconnection();
$obj->addnewuser($memberid, $addnames, $gender, $age, $type, $occupation, $contact, $address, $addmail, $addpass);
