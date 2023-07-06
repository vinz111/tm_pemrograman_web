<?php
if (!isset($_SESSION)) {
    session_start();
}

//echo $_SESSION['userid'];

$userloginid = "";
if (isset($_GET['userid'])) {
    $userloginid        = $_GET['userid']; // = $_GET['userlogid'];
    $_SESSION['userid'] = $userloginid;
}

if (isset($_SESSION['userid'])) {
    $userloginid = $_SESSION['userid']; // = $_GET['userlogid'];
} else {
    die;
}
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="style.css"> -->

    <style>
        .innerright,
        label {
            color: rgb(16, 170, 16);
            font-weight: bold;
        }

        .container,
        .row,
        .imglogo {
            margin: auto;
        }

        .innerdiv {
            text-align: center;
            /* width: 500px; */
            margin: 100px;
        }

        input {
            margin-left: 20px;
        }

        .leftinnerdiv {
            float: left;
            width: 25%;
        }

        .rightinnerdiv {
            float: right;
            width: 75%;
        }

        .innerright {
            background-color: rgb(105, 221, 105);
        }

        .btn {
            background-color: #ff7200;
            color: black;
            width: 95%;
            height: 40px;
            margin-top: 8px;
            border-radius: 10px;
            cursor: pointer;
        }
        .btn:hover{
            background-color: #fff;
        }

        .logoutbtn {
            background-color: #fd0e35;
            color: black;
            width: 95%;
            height: 40px;
            margin-top: 8px;
            border-radius: 10px;
            cursor: pointer;
        }
        .logoutbtn:hover{
            background-color: #fff;
        }

        .btn,
        a {
            text-decoration: none;
            color: black;
            font-size: large;
        }

        th {
            background-color: orange;
            color: black;
        }

        td {
            background-color: #fed8b1;
            color: black;
        }

        td,
        a {
            color: black;
        }
    </style>
</head>

<body>

    <?php
include "data_class.php";
?>

    <div class="container">
        <div class="innerdiv">
            <div class="row"><img class="imglogo" src="images/log.png" /></div>
            <div class="leftinnerdiv">
                <Button class="btn">Welcome</Button>
                <Button class="btn" onclick="openpart('myaccount')"> My Account</Button>
                <Button class="btn" onclick="openpart('book_listing')">Book Listing</Button>
                <Button class="btn" onclick="openpart('my_requests')"> My Requests</Button>
                <Button class="btn" onclick="openpart('issuereport')"> Book Report</Button>
                <a href="index.php"><Button class="logoutbtn"> LOGOUT</Button></a>
            </div>


            <div class="rightinnerdiv">
                <div id="myaccount" class="innerright portion"
                    style="<?php if (!empty($_REQUEST['returnid'])) {echo "display:none";} else {echo "";}?>">
                    <Button class="btn">My Account</Button>

                    <?php

$u = new data;
$u->setconnection();
$u->userdetail($userloginid);
$recordset = $u->userdetail($userloginid);
foreach ($recordset as $row) {

    $id        = $row[0];
    $memberid  = $row[7];
    $name      = $row[1];
    $email     = $row[2];
    $pass      = $row[3];
    $type      = $row[4];
    $telephone = $row[5];
    $address   = $row[6];
}
?>
                    <p style="color:black" ><t><b>Member ID:</b> &nbsp&nbsp<?php echo $memberid ?></p></t>
                    <p style="color:black"><t><b>Member Name:</b> &nbsp&nbsp<?php echo $name ?></p></t>
                    <p style="color:black"><t><b>Email:</b> &nbsp&nbsp<?php echo $email ?></p></t>
                    <p style="color:black"><t><b>Your Password:</b> &nbsp&nbsp<?php echo $pass ?></p></t>
                    <p style="color:black"><t><b>Telephone:</b> &nbsp&nbsp<?php echo $telephone ?></p></t>
                    <p style="color:black"><t><b>Address:</b> &nbsp&nbsp<?php echo $address ?></p></t>
                    <p style="color:black"><t><b>Account Type:</b> &nbsp&nbsp<?php echo $type ?></p></t>

                </div>
            </div>

            <div class="rightinnerdiv">
                <div id="issuereport" class="innerright portion"
                    style="<?php if (!empty($_REQUEST['returnid'])) {echo "display:none";} else {echo "display:none";}?>">
                    <Button class="btn">ISSUE RECORD</Button>

                    <?php

//$userloginid = $_SESSION["userid"] = $_GET['userlogid'];
$u = new data;
$u->setconnection();
$u->getissuebook($userloginid);
$recordset = $u->getissuebook($userloginid);

$table = "<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Return</th></tr>";

foreach ($recordset as $row) {
    $table .= "<tr>";
    "<td>$row[0]</td>";
    $table .= "<td>$row[2]</td>";
    $table .= "<td>$row[3]</td>";
    $table .= "<td>$row[6]</td>";
    $table .= "<td>$row[7]</td>";
    $table .= "<td>$row[8]</td>";
    $table .= "<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'><button type='button' class='btn btn-primary'>Return</button></a></td>";
    $table .= "</tr>";
    // $table.=$row[0];
}
$table .= "</table>";

echo $table;
?>

                </div>
            </div>


            <div class="rightinnerdiv">
                <div id="return" class="innerright portion"
                    style="<?php if (!empty($_REQUEST['returnid'])) {$returnid = $_REQUEST['returnid'];} else {echo "display:none";}?>">
                    <Button class="btn">Return Book</Button>

                    <?php
$u = new data;
$u->setconnection();
$u->returnbook($returnid);
$recordset = $u->returnbook($returnid);
?>

                </div>
            </div>

<!-- Book listing -->
            <div class="rightinnerdiv">
                <div id="my_requests" class="innerright portion"
                style="<?php if (!empty($_REQUEST['returnid'])) {$returnid = $_REQUEST['returnid'];
    echo "display:none";} else {echo "display:none";}?>">
                    <Button class="btn">Request Book</Button>

                    <?php
$u = new data;
$u->setconnection();
//$u->getRequestedBooks();
$recordset = $u->getRequestedBooks($userloginid);

$table = "<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr>";
//$table .= "<th>Image</th>";
$table .= "<th>ISBN No</th>";
$table .= "<th>Book Name</th>";
$table .= "<th>Status</th>";
$table .= "<th>Action</th>";
$table .= "</tr>";

foreach ($recordset as $row) {
    $table .= "<tr>";
    "<td>$row[0]</td>";
    //$table .= "<td><img src='uploads/$row[2]' width='100px' height='100px' style='border:1px solid #333333;'></td>";
    $table .= "<td>$row[1]</td>";
    $table .= "<td>$row[6]</td>";
    $table .= "<td>$row[8]</td>";
    $table .= "<td><a href='deletereq.php?bookid=$row[2]'><button type='button' class='btn btn-primary'>Cancel Request</button></a></td>";
    //&userid=$userloginid            $tbale .= "<td><a href='requestbook.php?req_del='.$rows[3].'><button type='button' class='btn btn-primary'>Cancel Request</button></a></td>";
    $table .= "</tr>";
    // $table.=$row[0];
}
$table .= "</table>";

echo $table;
?>

                </div>
            </div>

            <div class="rightinnerdiv">
                <div id="book_listing" class="innerright portion"
                style="<?php if (!empty($_REQUEST['returnid'])) {$returnid = $_REQUEST['returnid'];
    echo "display:none";} else {echo "display:none";}?>">

<?php
$search_key = "";
if (isset($_POST['search_key'])) {
    $search_key = $_POST['search_key'];
}
?>
        <form class="mt-3" action="./otheruser_dashboard.php" id="frm_search" name="frm_search" method="post">
            <label for="">Search Book here</label>
            <input type="hidden" name="userlogid" value="<?php echo $userloginid ?>">
            <div class="btn-group">
                <input type="text" name="search_key" value="<?php echo $search_key ?>" onchange="perform_search()" id="search_key" style="width:350px" placeholder="Search..." class="form-control">
                <button class="btn">Search</button>
            </div>

            <?php

$u = new data;
$u->setconnection();
$u->getBooks($search_key);
$recordset = $u->getBooks($search_key);

$table = "<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr>
            <th>ISBN No</th><th>Book Name</th><th>Book Authour</th><th>branch</th><th>Available Book</th></th><th>Request Book</th></tr>";

foreach ($recordset as $row) {
    $table .= "<tr>";
    $table .= "<td>" . $row[1] . "</td>";
    $table .= "<td>" . $row[3] . "</td>";
    //$table .= "<td><img src='uploads/" . $row[2] . " width='100px' height='100px' style='border:1px solid #333333;'></td>";
    $table .= "<td>" . $row[5] . "</td>";
    $table .= "<td>" . $row[7] . "</td>";
    $table .= "<td>" . $row[10] . "</td>";
    //$table .= "<td>" . $row[10] . "</td>";

    $u->setconnection();
    // isRequested -  0 = not requested 1 = already requested
    $isRequested = $u->isRequested($userloginid, $row[0]);

    if ($isRequested == 0) {
        $table .= "<td><a href='requestbook.php?bookid=" . $row[0] . "&userid=" . $userloginid . "'><button type='button' class='btn btn-primary'>Request Book</button></a></td>";
    } else {
        $table .= "<td class=\"text-success\">Requested</td>";
    }

    $table .= "</tr>";
    // $table.=$row[0];
}
$table .= "</table>";

echo $table;
?>

  </form>
                </div>
            </div>


        </div>
    </div>


    <script>

        function openpart(portion) {
            var i;
            var x = document.getElementsByClassName("portion");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(portion).style.display = "block";
        }
    </script>

    <script>
        function perform_search(){
            $('#frm_search').submit();
        }
    </script>
</body>

</html>