<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- <link rel="stylesheet" href="style.css"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <style>
        label{
            width:100px;
            display: inline-block;
            text-align:left;
        }
        .innerright,label {
    color: rgb(0, 0, 0);
    font-weight:bold;
}
.container,
.row,
.imglogo {
   margin:auto;
}

.innerdiv {
    text-align: center;
    /* width: 500px; */
    margin: 100px;
}
input{
    margin-left:20px;
}
.leftinnerdiv {
    float: left;
    width: 20%;
}

.rightinnerdiv {
    float: right;
    width: 80%;
}

.innerright {
    background-color: rgb(10, 221, 105);
}
.sbtn{
    width: 160px;
    height: 40px;
    background: #00aaee;
    border: none;
    margin-bottom: 10px;
    margin-left: 20px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    transition: .4s ease;

}
.sbtn:hover{
    background-color: #fff;
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
    font-size: small;
    font-weight:bold;
}

th{
    background-color: orange;
    color: black;
    font-weight:bold;
}
td{
    background-color: #fed8b1;
    color: black;
}
td, a{
    color:black;
}
    </style>
    <body>

    <?php
include "data_class.php";

$msg = "";

if (!empty($_REQUEST['msg'])) {
    $msg = $_REQUEST['msg'];
}

if ($msg == "done") {
    echo "<div class='alert alert-success' role='alert'>Sucssefully Done</div>";
} elseif ($msg == "fail") {
    echo "<div class='alert alert-danger' role='alert'>Fail</div>";
}

?>



        <div class="container">
        <div class="innerdiv">
            <div class="row"><img class="imglogo" src="images/log.png"/></div>
            <div class="leftinnerdiv">
                <Button class="btn"> ADMIN</Button>
                <Button class="btn" onclick="openpart('addbook')" >B00K ACQUSITION</Button>
                <Button class="btn" onclick="openpart('bookreport')" > BOOK REPORT</Button>
                <Button class="btn" onclick="openpart('bookrequestapprove')"> BOOK REQUESTS</Button>
                <Button class="btn" onclick="openpart('addperson')"> MEMBER REGISTRATION</Button>
                <Button class="btn" onclick="openpart('studentrecord')"> MEMBER REPORT</Button>
                <Button class="btn"  onclick="openpart('issuebook')"> ISSUE BOOK</Button>
                <Button class="btn" onclick="openpart('issuebookreport')"> ISSUE BOOK REPORT</Button>
                <Button class="btn" onclick="openpart('downloadreport')"> DOWNLOAD REPORT</Button>
                <Button class="btn" onclick="openpart('add_pdf_book')"> PDF BOOK & NEWSLINE</Button>
                <a href="index.php"><Button class="logoutbtn" > LOGOUT</Button></a>
            </div>

            <div class="rightinnerdiv">
            <div id="bookrequestapprove" class="innerright portion" style="display:none">
            <Button class="btn" >BOOK REQUEST APPROVE</Button>

            <?php
$u = new data;
$u->setconnection();
$u->requestbookdata();
$recordset = $u->requestbookdata();

$table = "<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Person Name</th><th>person type</th><th>Book name</th><th>Days </th><th>Approve</th></tr>";
foreach ($recordset as $row) {
    $table .= "<tr>";
    "<td>$row[0]</td>";
    "<td>$row[1]</td>";
    "<td>$row[2]</td>";
//     id	0requestbook table
// isbnno	1
// bookid	2
// userid	3
// username	4
// usertype	5
// bookname	6
// issuedays 7	
// status	8

    $table .= "<td>$row[4]</td>";
    $table .= "<td>$row[5]</td>";
    $table .= "<td>$row[6]</td>";
    $table .= "<td>$row[7]</td>";
    // $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approved BOOK</button></a></td>";
    if ($row[8] == "pending") {
        $table .= "<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approve</button></a></td>";
    } else {
        $table .= "<td>$row[8]</td>";
    }
    // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
    $table .= "</tr>";
    // $table.=$row[0];
}
$table .= "</table>";

echo $table;
?>

            </div>
            </div>

            <div class="rightinnerdiv">
            <div id="addbook" class="innerright portion" style="<?php if (!empty($_REQUEST['viewid'])) {echo "display:none";} else {echo "";}?>">
            <Button class="btn" >B00K ACQUSITION FORM</Button><br><br>
            <form action="addbookserver_page.php" method="post" enctype="multipart/form-data">

            <!-- modify -->
            <label>ISBN No:</label><input type="text" name="isbnno"/>
            </br>
            <!-- modify -->

            <label>Book Name:</label><input type="text" name="bookname"/>
            </br>
            <label>Detail:</label><input  type="text" name="bookdetail"/></br>
            <label>Autor:</label><input type="text" name="bookaudor"/></br>
            <label>Publication</label><input type="text" name="bookpub"/></br>
            <div>DDC no:<input type="radio"  id="branch" value="000"/>000<input type="radio" name="branch" value="100"/>100<div style="margin-left:80px"><input type="radio" name="branch" value="200"/>200<input type="radio" name="branch" value="300"/>300<input type="radio" name="branch" value="400"/>400<input type="radio" name="branch" value="500"/>500</div></div>

            <!--<label>Price:</label><input  type="number" name="bookprice"/></br>-->
            <label>Quantity:</label><input type="number" name="bookquantity"/></br>
            <label>Book Photo</label><input  type="file" name="bookphoto"/></br>
            </br>

            <input type="submit" class="sbtn" value="SUBMIT"/>
            </br>
            </br>

            </form>
            </div>
            </div>

            <div class="rightinnerdiv">
            <div id="editbook" class="innerright portion" style="<?php if (!empty($_REQUEST['viewid'])) {echo "display:none";} else {echo "";}?>">
            <Button class="btn" >EDIT BOOK</Button><br><br>
            <form action="editbookserver.php" id="EditBookForm" method="post" enctype="multipart/form-data">

            <input type="text" id="id" name="id"/>
           <!-- <label>Accession No:</label><input type="text" id="Accessno" name="Accessno"/> -->

            <label>Title:</label><input type="text" id="bookname" name="bookname"/>
            </br>
            <label>Autor:</label><input type="text" id="bookaudor" name="bookaudor"/></br>

             <!-- <label>Year of Published:</label><input type="text" id="ypublished" name="ypublished"/> -->
             <!-- <label>Place of Published:</label><input type="text" id="ppublished" name="ppublished"/> -->
             <!-- <label>No Of Pages:</label><input type="text" id="pages" name="pages"/> -->

             <div>DDC no:<input type="radio"  id="branch" value="000"/>000<input type="radio" name="branch" value="100"/>100<div style="margin-left:80px"><input type="radio" name="branch" value="200"/>200<input type="radio" name="branch" value="300"/>300<input type="radio" name="branch" value="400"/>400<input type="radio" name="branch" value="500"/>500</div></div>
            <label>Price:</label><input  type="text" id="bookprice" name="bookprice"/></br>
            <label>Detail:</label><input  type="text" id="bookdetail" name="bookdetail"/></br>

            <label>Edition</label><input type="text" id="bookpub" name="bookpub"/></br>


            <!--<label>Cuttor No:</label><input  type="text" name="cuttorno"/></br>-->
            <label>Quantity:</label><input type="number" id="bookquantity" name="bookquantity"/></br>
            <label>Book Photo</label><input  type="file"  id="bookphoto" name="bookphoto"/></br>
            </br>

            <input type="submit" class="sbtn" value="SUBMIT"/>
            </br>
            </br>

            </form>
            </div>
            </div>


            <div class="rightinnerdiv">
            <div id="addperson" class="innerright portion" style="display:none">
            <Button class="btn" >Member Registration Form</Button>
            <form action="addpersonserver_page.php" method="post" enctype="multipart/form-data">

            <label>Member ID:</label><input type="text" name="addmid"/>
            </br>

            <label>Name:</label><input type="text" name="addname"/>
            </br>
            <label>Gender:</label><input type="text" name="addgen"/>
            </br>
            <label>Age:</label><input type="text" name="addage"/>
            </br>
            <label for="typw">Choose type:</label>
            <select name="type" >
                <option value="student">student</option>
                <option value="Kid">Kid</option>
                <option value="Elders">Elders</option>
                <option value="Staff Member">Staff Member</option>
            </select></br>
            <label>Occupation:</label><input type="text" name="addoccupation"/></br>
            <label>Contact:</label><input  type="text" name="contact"/></br>
            <label>Address:</label><input  type="text" name="address"/></br>
            <label>Email:</label><input  type="email" name="addmail"/></br>
            <label>Pasword:</label><input type="pasword" name="addpass"/>
            </br>



            <input type="submit" value="SUBMIT"/>
            </form>
            </div>
            </div>

            <div class="rightinnerdiv">
            <div id="studentrecord" class="innerright11 portion" style="display:none">
            <Button class="btn" >MEMBER RECORD</Button>
            <p align="right"><Button class="print" onclick="window.print(); return false;")> PRINT</Button>
            <?php
$u = new data;
$u->setconnection();
$u->userdata();
$recordset = $u->userdata();

/* $table = "<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
padding: 8px;'> Name</th><th>Email</th><th>Password</th><th>Type</th><th>Telephone</th><th>Address</th></tr>"; */

$table = "<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th>Member Id</th><th style='  border: 1px solid #ddd;
            padding: 8px;'> Name</th><th>Gender</th><th>Age</th><th>Type</th><th>Telephone</th><th>Address</th><th>Occupation</th><th>Email</th><th>Password</th></tr>";
/* foreach ($recordset as $row) {
$table .= "<tr>";
"<td>$row[0]</td>";
$table .= "<td>$row[1]</td>";
$table .= "<td>$row[2]</td>";
$table .= "<td>$row[3]</td>";

$table .= "<td>$row[4]</td>";
$table .= "<td>$row[5]</td>";
$table .= "<td>$row[6]</td>";
// $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'>Delete</a></td>";
$table .= "</tr>";
// $table.=$row[0];
} */

foreach ($recordset as $row) {
    $table .= "<tr>";
    "<td>$row[0]</td>";
    $table .= "<td>$row[7]</td>"; //mid
    $table .= "<td>$row[1]</td>"; //name
    $table .= "<td>$row[8]</td>"; //gen
    $table .= "<td>$row[9]</td>"; //age

    $table .= "<td>$row[4]</td>"; //type
    $table .= "<td>$row[5]</td>"; //tel
    $table .= "<td>$row[6]</td>"; //addres
    $table .= "<td>$row[10]</td>"; //occu
    $table .= "<td>$row[2]</td>"; //mail
    $table .= "<td>$row[3]</td>"; //pwd
    // $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'>Delete</a></td>";
    $table .= "</tr>";
    // $table.=$row[0];
}
$table .= "</table>";

echo $table;
?>

            </div>
            </div>

            <div class="rightinnerdiv">
            <div id="issuebookreport" class="innerright11 portion" style="display:none">
            <Button class="btn" >Issue Book Record</Button>
            <p align="right"><Button class="print" onclick="window.print(); return false;")> PRINT</Button></p>
            <?php
$u = new data;
$u->setconnection();
$u->issuereport();
$recordset = $u->issuereport();

$table = "<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Issue Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Issue Type</th></tr>";

foreach ($recordset as $row) {
    $table .= "<tr>";
    "<td>$row[0]</td>";
    $table .= "<td>$row[2]</td>";
    $table .= "<td>$row[3]</td>";
    $table .= "<td>$row[6]</td>";
    $table .= "<td>$row[7]</td>";
    $table .= "<td>$row[8]</td>";
    $table .= "<td>$row[4]</td>";
    // $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'>Return</a></td>";
    $table .= "</tr>";
    // $table.=$row[0];
}
$table .= "</table>";

echo $table;
?>

            </div>
            </div>

<!-- issue book -->
            <div class="rightinnerdiv">
            <div id="issuebook" class="innerright portion" style="display:none">
            <Button class="btn" >ISSUE BOOK</Button>
            <form action="issuebook_server.php" method="post" enctype="multipart/form-data">
            <br><br><label for="book">Book Name:</label>
            <input type="text" name="issuebook"/>

            <br><label for="Select Student">Member:</label>
            <input type="text" name="issuename"/>

            <br><label for="member id">Member ID:</label>
            <input type="text" name="memberid"/><br><br>
            
            
            Date:<input type="number" name="days"/>

            <input type="submit" value="SUBMIT"/>
            <br><br>
            </form>
            </div>
            </div>

            <div class="rightinnerdiv">
            <div id="bookdetail" class="innerright portion" style="<?php if (!empty($_REQUEST['viewid'])) {$viewid = $_REQUEST['viewid'];} else {echo "display:none";}?>">

            <Button class="btn" >BOOK DETAIL</Button>
</br>
<?php
$u = new data;
$u->setconnection();
$u->getbookdetail($viewid);
$recordset = $u->getbookdetail($viewid);
foreach ($recordset as $row) {

    $bookid       = $row[0];
    $isbnno       = $row[1];
    $bookimg      = $row[2];
    $bookname     = $row[3];
    $bookdetail   = $row[4];
    $bookauthour  = $row[5];
    $bookpub      = $row[6];
    $branch       = $row[7];
    $bookprice    = $row[8];
    $bookquantity = $row[9];
    $bookava      = $row[10];
    $bookrent     = $row[11];

}
?>

            <img width='150px' height='150px' style='border:1px solid #333333; float:left;margin-left:20px' src="uploads/<?php echo $bookimg ?> "/>
            </br>
            <p style="color:black" align="justify"><b>ISBN No:</b>  <?php echo $isbnno ?></p>
            <p style="color:black" align="justify"><b>Book Name:</b> <?php echo $bookname ?></p>
            <p style="color:black" align="justify"><b>Book Detail:</b> <?php echo $bookdetail ?></p>
            <p style="color:black" align="justify"><b>Book Authour:</b> <?php echo $bookauthour ?></p>
            <p style="color:black" align="justify"><b>Book Publisher:</b> <?php echo $bookpub ?></p>
            <p style="color:black" align="justify"><b>Book Branch:</b> <?php echo $branch ?></p>
            <p style="color:black" align="justify"><b>Book Price:</b> <?php echo $bookprice ?></p>
            <p style="color:black" align="justify"><b>Book Available:</b> <?php echo $bookava ?></p>
            <p style="color:black" align="justify"><b>Book Rent:</b> <?php echo $bookrent ?></p>


            </div>
            </div>



            <div class="rightinnerdiv">
            <div id="bookreport" class="innerright11 portion" style="display:none">
            <Button class="btn" >BOOK RECORD</Button>

            <lable align="right"><Button class="print" onclick="window.print(); return false;")> PRINT</Button>
            <?php
$u = new data;
$u->setconnection();
$u->getbook();
$recordset = $u->getbook();

$table = "<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>ISBN</th><th>Book Name</th><th>Author</th><th>Branch</th><th>Qnt</th><th>Available</th><th>Rent</th></th><th>Delete</th><th>Edit</th><th>View</th></tr>";
//<th>Price</th>
foreach ($recordset as $row) {
    $table .= "<tr>";
    "<td>$row[0]</td>";
    $table .= "<td>$row[1]</td>"; //isbn
    $table .= "<td>$row[3]</td>"; //name
    $table .= "<td>$row[5]</td>"; //author
    $table .= "<td>$row[7]</td>"; //brnch
    //$table .= "<td>$row[8]</td>";//price
    $table .= "<td>$row[9]</td>"; //qnt
    $table .= "<td>$row[10]</td>"; //avail
    $table .= "<td>$row[11]</td>"; //rent
    $table .= "<td><form method='POST' action='deleteBookServer.php'><input type='hidden' name='id' value='$row[0]'><button type='submit'><i class=\"fa-solid fa-trash-can text-danger\"></i></button></form></td>";
    $table .= "<td><input type='hidden' name='id' value='$row[0]'><button onclick=\"fillEditBookForm('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]',)\" type='button'><i class=\"fa-solid fa-pen-to-square text-primary\"></i></button></td>";

    $table .= "<td><a href='admin_service_dashboard.php?viewid=$row[0]'><i class=\"fa-solid fa-eye text-success\"></i></i></a></td>";
    // $table .= "<td></td>";
    // $table .= "<td><a href='admin_service_dashboard.php?viewid=$row[0]'><button type='button' class='btn btn-primary'>View BOOK</button></a></td>";
    // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
    $table .= "</tr>";
    // $table.=$row[0];
}
$table .= "</table>";

echo $table;
?>
<script>
    function fillEditBookForm(id,bookpic,bookname,bookdetail,bookaudor,bookpub,branch,bookprice,bookquantity,bookava,bookrent){
        console.log(bookaudor);
        openpart('editbook');

var EditBookForm = document.getElementById("EditBookForm").elements;

//EditBookForm['id'].value = entity.id;
       EditBookForm['id'].value = id;
       EditBookForm['bookname'].value = bookname;
       EditBookForm['bookprice'].value = bookprice;
       EditBookForm['bookdetail'].value = bookdetail;
       EditBookForm['bookaudor'].value = bookaudor;
       EditBookForm['bookpub'].value = bookpub;
       EditBookForm['branch'].value = branch;
       EditBookForm['bookquantity'].value = bookquantity;
       EditBookForm['bookphoto'].value = bookphoto;

    }
</script>
            </div>
            </div>




        <!-- DOWNLOAD REPORT downloadreport-->
        <div class="rightinnerdiv">
            <div id="downloadreport" class="innerright portion"
                style="<?php if (!empty($_REQUEST['viewid'])) {echo "display:none";} else {echo "";}?>">
                <Button class="btn">DOWNLOAD REPORT</Button><br><br>
                <select class="form-select" aria-label="Default select example" onchange="location = this.value;">
                    <option selected>Open this select menu</option>

                    <option value="urep.php">All customers</option>
                    <option value="rrep.php">Restaurant</option>
                    <option value="orep.php">Orders</option>
                    <option value="mrep.php">Menu item</option>
                </select>
            </div>
        </div>

        <!-- DOWNLOAD REPORT -->
        <div class="rightinnerdiv">
            <div id="add_pdf_book" class="innerright portion" style="display:none">
            <!-- add ebook -->
                <Button class="btn">ADD PDF BOOK </Button><br><br>
                <form action="addpdf.php" method="post" enctype="multipart/form-data" name="form">
                    
                    <label>BOOK ID:</label><input type="text" name="pid" />
                    </br>
                    <label>BOOK NAME:</label><input type="text" name="pname" />
                    </br>
                    <label>AUTHOR</label><input type="text" name="pauthor" />
                    </br>
                    <label>ADD PDF</label><input  type="file" name="bpdf" id="file"/></br>
                    </br>
                    
                    <input type="submit" name="submit" id="submit" value="Submit" /></br>

                </form></br></br>
                <!-- add msg -->
                <Button class="btn">ADD NEWSLINE</Button><br><br>
                <form action="addmsg.php" method="post" enctype="multipart/form-data" name="form">
                    
                    <label>MESSAGE</label><textarea id="tarea" name="msg"  cols="70"/>
                    </textarea>
                    </br>
                    <input type="submit" name="submit" id="submit" value="Submit" />

                </form>
                <!-- add iamges -->
                <Button class="btn">ADD IMAGES</Button><br><br>
                <form action="addpic.php" method="post" enctype="multipart/form-data" name="form">
                    
                    <label>IMAGES</label></br>
                    <input type="file" name="images[]" id="images" multiple>
                    </br>
                    <input type="submit" name="submit" id="submit" value="UPLOAD HERE" />

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
    </body>
</html>