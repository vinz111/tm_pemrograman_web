<?php include "db.php";
if (!isset($_SESSION)) {
    session_start();
}
class data extends db
{
    private $isbnno;
    private $bookpic;
    private $bookname;
    private $bookdetail;
    private $bookaudor;
    private $bookpub;
    private $branch;
    private $bookprice;
    private $bookquantity;
    private $type;

    private $book;
    private $userselect;
    private $days;
    private $getdate;
    private $returnDate;

    public function __construct()
    {
        // echo " constructor ";
        echo "</br></br>";
    }

    public function addnewuser($memberid, $addnames, $gender, $age, $type, $occupation, $contact, $address, $addmail, $addpass)
    {

        $this->memberid   = $memberid;
        $this->name       = $addnames;
        $this->gender     = $gender;
        $this->age        = $age;
        $this->type       = $type;
        $this->occupation = $occupation;
        $this->contact    = $contact;
        $this->address    = $address;
        $this->email      = $addmail;
        $this->pasword    = $addpass;

        $q = "INSERT INTO userdata(id,name,email,pass,type,telephone,address,memberid,gender,age,occupation)VALUES('', '$addnames', '$addmail', '$addpass', '$type', '$contact', '$address', '$memberid', '$gender', '$age', '$occupation')";
        if ($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=New Add done");
        } else {
            header("Location:admin_service_dashboard.php?msg=Register Fail");

        }

    }

    public function userLogin($t1, $t2)
    {
        $q         = "SELECT * FROM userdata where email='$t1' and pass='$t2'";
        $recordSet = $this->connection->query($q);
        $result    = $recordSet->rowCount();
        //  $_SESSION['userid'] = 1;
        if ($result > 0) {

            foreach ($recordSet->fetchAll() as $row) {
                $logid              = $row['id'];
                $_SESSION['userid'] = $logid;
                header("location: otheruser_dashboard.php?userlogid=$logid");
            }
        } else {
            header("location: index.php?msg=Invalid Credentials");
        }

    }

    public function adminLogin($t1, $t2)
    {

        $q         = "SELECT * FROM admin where email='$t1' and pass='$t2'";
        $recordSet = $this->connection->query($q);
        $result    = $recordSet->rowCount();

        if ($result > 0) {

            foreach ($recordSet->fetchAll() as $row) {
                $logid              = $row['id'];
                $_SESSION["userid"] = $logid;
                header("location: admin_service_dashboard.php?logid=$logid");
            }
        } else {
            header("location: index.php?msg=Invalid Credentials");
        }

    }

    public function addbook($isbnno, $bookpic, $bookname, $bookdetail, $bookaudor, $bookpub, $branch, $bookprice, $bookquantity)
    {
        $this->$bookpic     = $bookpic;
        $this->bookname     = $bookname;
        $this->bookdetail   = $bookdetail;
        $this->bookaudor    = $bookaudor;
        $this->bookpub      = $bookpub;
        $this->branch       = $branch;
        $this->bookprice    = $bookprice;
        $this->bookquantity = $bookquantity;

        $this->$isbnno = $isbnno;

        $q = "INSERT INTO book2 (id, isbnno, bookpic, bookname, bookdetail, bookaudor, bookpub, branch, bookprice, bookquantity, bookava, bookrent)VALUES('', '$isbnno', '$bookpic', '$bookname', '$bookdetail', '$bookaudor', '$bookpub', '$branch', '$bookprice', '$bookquantity','$bookquantity',0)";

        if ($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=done");
        } else {
            header("Location:admin_service_dashboard.php?msg=fail");
        }

    }

    public function editbook($id, $isbnno, $bookpic, $bookname, $bookdetail, $bookaudor, $bookpub, $branch, $bookprice, $bookquantity)
    {
        $this->$id          = $id;
        $this->$isbnno      = $isbnno;
        $this->$bookpic     = $bookpic;
        $this->bookname     = $bookname;
        $this->bookdetail   = $bookdetail;
        $this->bookaudor    = $bookaudor;
        $this->bookpub      = $bookpub;
        $this->branch       = $branch;
        $this->bookprice    = $bookprice;
        $this->bookquantity = $bookquantity;

        $q = "UPDATE book2 SET bookpic='$bookpic',bookname = '$bookname', bookdetail='$bookdetail', bookaudor='$bookaudor', bookpub= '$bookpub', branch='$branch', bookprice='$bookprice',bookquantity='$bookquantity',bookava='$bookava',bookrent='$bookrent' WHERE isbnno=$isbnno LIMIT 1";

        if ($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=done");
        } else {
            header("Location:admin_service_dashboard.php?msg=fail");
        }

    }

    public function deleteBook($id)
    {
        $this->$id = $id;

        $q = "DELETE FROM book2 WHERE id= $id";

        if ($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=done");
        } else {
            header("Location:admin_service_dashboard.php?msg=fail");
        }

    }

    public function getBookJSON($id)
    {
        $this->$id = $id;

        $q      = "SELECT * FROM book2 WHERE id= $id ";
        $result = $this->connection->query($q);
        if ($rs) {
            //  $arr     = $this->rs->fetch_assoc();
            //  $arr=    mysql_fetch_assoc($rs);

            foreach ($result->fetchAll() as $row) {
                $id           = $row['id'];
                $isbnno       = $row['isbnno'];
                $bookpic      = $row['bookpic'];
                $bookname     = $row['bookname'];
                $bookdetail   = $row['bookdetail'];
                $bookaudor    = $row['bookaudor'];
                $bookpub      = $row['bookpub'];
                $branch       = $row['branch'];
                $bookprice    = $row['bookprice'];
                $bookquantity = $row['bookquantity'];
                $bookava      = $row['bookava'];
                $bookrent     = $row['bookrent'];

            }
            //   return $arr;

            // id
            // isbnno
            // bookpic
            // bookname
            // bookdetail
            // bookaudor
            // bookpub
            // branch
            // bookprice
            // bookquantity
            // bookava
            // bookrent
            $jsonRes = '{ ';
            $jsonRes .= '"id":"' . $id . '",';
            $jsonRes .= '"isbnno":"' . $isbnno . '",';
            $jsonRes .= '"bookpic":"' . $bookpic . '",';
            $jsonRes .= '"bookname":"' . $bookname . '",';
            $jsonRes .= '"bookdetail":"' . $bookdetail . '",';
            $jsonRes .= '"bookaudor":"' . $bookaudor . '",';
            $jsonRes .= '"bookpub":"' . $bookpub . '",';
            $jsonRes .= '"branch":"' . $branch . '",';
            $jsonRes .= '"bookprice":"' . $bookprice . '",';
            $jsonRes .= '"bookquantity":"' . $bookquantity . '",';
            $jsonRes .= '"bookava":"' . $bookava . '",';
            $jsonRes .= '"bookrent":"' . $bookrent . '"';
            $jsonRes .= ' }';
            return $jsonRes;

        } else {
            header("Location:admin_service_dashboard.php?msg=fail");
        }

    }

    private $id;

    public function getissuebook($userloginid)
    {

        $newfine     = "";
        $issuereturn = "";

        $q           = "SELECT * FROM issuebook where userid='$userloginid'";
        $recordSetss = $this->connection->query($q);

        foreach ($recordSetss->fetchAll() as $row) {
            $issuereturn = $row['issuereturn'];
            $fine        = $row['fine'];
            $newfine     = $fine;

            //  $newbookrent=$row['bookrent']+1;
        }

        $getdate = date("d/m/Y");
        if ($issuereturn < $getdate) {
            $q = "UPDATE issuebook SET fine='$newfine' where userid='$userloginid'";

            if ($this->connection->exec($q)) {
                $q    = "SELECT * FROM issuebook where userid='$userloginid' ";
                $data = $this->connection->query($q);
                return $data;
            } else {
                $q    = "SELECT * FROM issuebook where userid='$userloginid' ";
                $data = $this->connection->query($q);
                return $data;
            }

        } else {
            $q    = "SELECT * FROM issuebook where userid='$userloginid'";
            $data = $this->connection->query($q);
            return $data;

        }

    }

    public function getbook()
    {
        $q    = "SELECT * FROM book2 ";
        $data = $this->connection->query($q);
        return $data;
    }
    public function getbookissue()
    {
        $q    = "SELECT * FROM book2  ";
        $data = $this->connection->query($q);
        return $data;
    }

    public function getBooks($search_key)
    {
        $q = "";
        if ($search_key != "") {
            $q = "SELECT * FROM book2 where bookname LIKE '%{$search_key}%'";
        } else {
            $q = "SELECT * FROM book2";
        }
        $data = $this->connection->query($q);
        return $data;
    }

    public function userdata()
    {
        $q    = "SELECT * FROM userdata ";
        $data = $this->connection->query($q);
        return $data;
    }

    public function getbookdetail($id)
    {
        $q    = "SELECT * FROM book2 where id ='$id'";
        $data = $this->connection->query($q);
        return $data;
    }

    public function userdetail($id)
    {
        $q    = "SELECT * FROM userdata where id ='$id'";
        $data = $this->connection->query($q);
        return $data;
    }

    public function deleterequest($bookid){
        $q           = "DELETE FROM requestbook WHERE bookid=$bookid";
        $recordSetss = $this->connection->query($q);

        if ($this->connection->exec($q)) {

            header("Location:otheruser_dashboard.php?msg=done");
        } else {
            header("Location:otheruser_dashboard.php?msg=fail");
        }
    }

    public function requestbook($userid, $bookid)
    {

        $q           = "SELECT * FROM book2 where id=$bookid";
        $recordSetss = $this->connection->query($q);

        $q         = "SELECT * FROM userdata where id=$userid";
        $recordSet = $this->connection->query($q);

        foreach ($recordSet->fetchAll() as $row) {
            $username = $row['name'];
            $usertype = $row['type'];
        }

        foreach ($recordSetss->fetchAll() as $row) {
            $bookname = $row['bookname'];
            $isbnno   = $row['isbnno'];
        }

        $days = 0;
        if ($usertype == "student") {
            $days = 7;
        }
        if ($usertype == "kid") {
            $days = 7;
        }
        if ($usertype == "elders") {
            $days = 7;
        }
        if ($usertype == "staff" || $usertype == "Staff Member") {
            $days = 7;
        }

// isbnno
        // bookid
        // user_id
        // username
        // usertype
        // bookname
        // issuedays
        // status

        $q = "INSERT INTO requestbook (isbnno,bookid,userid,username,usertype,bookname,issuedays,status)";
        $q .= "VALUES ( '{$isbnno}',$bookid, $userid, '{$username}', '{$usertype}', '{$bookname}', '{$days}', 'pending' )";

        if ($this->connection->exec($q)) {
            header("Location:otheruser_dashboard.php?userlogid=$userid");
        } else {
            header("Location:otheruser_dashboard.php?msg=fail");
        }

    }

    public function isRequested($userid, $bookid)
    {
        $q         = "SELECT * FROM requestbook where userid=$userid AND bookid = $bookid AND status='pending' ";
        $recordSet = $this->connection->query($q);
        $c         = 0;
        foreach ($recordSet->fetchAll() as $row) {
            $c++;
        }

        return $c;
    }

    public function getRequestedBooks($userid)
    {
        $q         = "SELECT * FROM requestbook where userid=$userid";
        $recordSet = $this->connection->query($q);
        return $recordSet;
    }

    public function returnbook($id)
    {
        $fine       = "";
        $bookava    = "";
        $issuebook  = "";
        $bookrentel = "";

        $q         = "SELECT * FROM issuebook where id='$id'";
        $recordSet = $this->connection->query($q);

        foreach ($recordSet->fetchAll() as $row) {
            $userid    = $row['userid'];
            $issuebook = $row['issuebook'];
            $fine      = $row['fine'];

        }
        if ($fine == 0) {

            $q         = "SELECT * FROM book where bookname='$issuebook'";
            $recordSet = $this->connection->query($q);

            foreach ($recordSet->fetchAll() as $row) {
                $bookava    = $row['bookava'] + 1;
                $bookrentel = $row['bookrent'] - 1;
            }
            $q = "UPDATE book SET bookava='$bookava', bookrent='$bookrentel' where bookname='$issuebook'";
            $this->connection->exec($q);

            $q = "DELETE from issuebook where id=$id and issuebook='$issuebook' and fine='0' ";
            if ($this->connection->exec($q)) {

                header("Location:otheruser_dashboard.php?userlogid=$userid");
            }
            //  else{
            //     header("Location:otheruser_dashboard.php?msg=fail");
            //  }
        }
        // if($fine!=0){
        //     header("Location:otheruser_dashboard.php?userlogid=$userid&msg=fine");
        // }

    }

    public function delteuserdata($id)
    {
        $q = "DELETE from userdata where id='$id'";
        if ($this->connection->exec($q)) {

            header("Location:admin_service_dashboard.php?msg=done");
        } else {
            header("Location:admin_service_dashboard.php?msg=fail");
        }
    }

    public function issuereport()
    {
        $q    = "SELECT * FROM issuebook ";
        $data = $this->connection->query($q);
        return $data;

    }

    public function requestbookdata()
    {
        $q    = "SELECT * FROM requestbook ";
        $data = $this->connection->query($q);
        return $data;
    }

    // issue issuebookapprove
    public function issuebookapprove($book, $userselect, $days, $getdate, $returnDate, $redid)
    {
        $this->$book       = $book;
        $this->$userselect = $userselect;
        $this->$days       = $days;
        $this->$getdate    = $getdate;
        $this->$returnDate = $returnDate;

        $q           = "SELECT * FROM book2 where isbnno='$book'";
        $recordSetss = $this->connection->query($q);

        $q         = "SELECT * FROM userdata where memberid='$userselect'";
        $recordSet = $this->connection->query($q);
        $result    = $recordSet->rowCount();

        if ($result > 0) {

            foreach ($recordSet->fetchAll() as $row) {
                $issueid   = $row['memberid'];
                $issuetype = $row['type'];

                // header("location: admin_service_dashboard.php?logid=$logid");
            }
            foreach ($recordSetss->fetchAll() as $row) {
                $bookid   = $row['isbnno'];
                $bookname = $row['bookname'];

                $newbookava  = $row['bookava'] - 1;
                $newbookrent = $row['bookrent'] + 1;
            }

            $q = "UPDATE book SET bookava='$newbookava', bookrent='$newbookrent' where id='$bookid'";
            if ($this->connection->exec($q)) {

                $q = "INSERT INTO issuebook (userid,issuename,issuebook,issuetype,issuedays,issuedate,issuereturn,fine)VALUES('$issueid','$userselect','$book','$issuetype','$days','$getdate','$returnDate','0')";

                if ($this->connection->exec($q)) {

                    $q = "DELETE from requestbook where id='$redid'";
                    $this->connection->exec($q);
                    header("Location:admin_service_dashboard.php?msg=done");
                } else {
                    header("Location:admin_service_dashboard.php?msg=fail");
                }
            } else {
                header("Location:admin_service_dashboard.php?msg=fail");
            }

        } else {
            header("location: index.php?msg=Invalid Credentials");
        }

    }

    // issue book
    public function issuebook($book, $userselect, $days, $getdate, $returnDate)
    {
        $this->$book       = $book;
        $this->$userselect = $userselect;
        $this->$days       = $days;
        $this->$getdate    = $getdate;
        $this->$returnDate = $returnDate;

        $q           = "SELECT * FROM book2 where isbnno='$book'";
        $recordSetss = $this->connection->query($q);

        $q         = "SELECT * FROM userdata where memberid='$userselect'";
        $recordSet = $this->connection->query($q);
        $result    = $recordSet->rowCount();

        if ($result > 0) {

            foreach ($recordSet->fetchAll() as $row) {
                $issueid   = $row['memberid'];
                $issuetype = $row['type'];

                // header("location: admin_service_dashboard.php?logid=$logid");
            }
            foreach ($recordSetss->fetchAll() as $row) {
                $bookid   = $row['isbnno'];
                $bookname = $row['bookname'];

                $newbookava  = $row['bookava'] - 1;
                $newbookrent = $row['bookrent'] + 1;
            }

            $q = "UPDATE book2 SET bookava='$newbookava', bookrent='$newbookrent' where isbnno='$bookid'";
            if ($this->connection->exec($q)) {

                $q = "INSERT INTO issuebook (userid,issuename,issuebook,issuetype,issuedays,issuedate,issuereturn,fine)VALUES('$issueid','$userselect','$book','$issuetype','$days','$getdate','$returnDate','0')";

                if ($this->connection->exec($q)) {
                    header("Location:admin_service_dashboard.php?msg=done");
                } else {
                    header("Location:admin_service_dashboard.php?msg=fail");
                }
            } else {
                header("Location:admin_service_dashboard.php?msg=fail");
            }

        } else {
            header("location: index.php?msg=Invalid Credentials");
        }

    }

    public function addpdf($id, $pid, $pname, $pauthor, $bpdf)
    {
        $this->id     = $id;
        $this->pid     = $pid;
        $this->pname   = $pname;
        $this->pauthor = $pauthor;
        $this->bpdf    = $bpdf;

        $q = "INSERT INTO pdf (id, pid, pname, pauthor, bpdf)VALUES('', '$pid', '$pname', '$pauthor', '$bpdf')";

        if ($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=done");
        } else {
            header("Location:admin_service_dashboard.php?msg=fail");
        }

    }

    public function addmsg($id, $msg, $date)
    {
        $this->id   = $id;
        $this->msg  = $msg;
        $this->date = $date;

        $q = "INSERT INTO msg (id,msg,date)VALUES('', '$msg', '$date')";

        if ($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=done");
        } else {
            header("Location:admin_service_dashboard.php?msg=fail");
        }

    }
}
