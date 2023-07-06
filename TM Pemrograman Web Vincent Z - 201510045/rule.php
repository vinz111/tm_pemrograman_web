<?php include 'head.php'; ?>
<title>Rules & Condition</title>
<link href="css/style.css" rel="stylesheet">
<style>
    .box{
        align-items: center;
        justify-content: center;

        width:60%;
        margin:auto;
        padding:10px;
        background-color:#EBEBEB;
        
        
    }
    .box h2{
        color: #fff;
        background: #03a9f4;
        padding: 10px 20px;
        font-size: 20px;
        font-weight: 700;
        border-top-left-radius: 10px;
        text-align: center;
        border-radius: 1rem;
    }
    li:hover{
        color: red;
        transform: scale(1.1);
        font-weight: bold;
    }
    ol{
        margin-top: 10px;
        font-size: 18px;
    }
</style>


<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
     <?php include 'nav.php'; ?>
    <!-- Navbar End -->
    
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Rules & Condition</h1>
                    
                    <!-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Courses</li>
                        </ol>
                    </nav> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div class="box">
        <h2 class="h1">Rules & Condition</h2>
       
        <ol>
            <li>Do not leave your personal belongings in front of the library or around the library. Please use the Cloakroom.</li>
            <li>No readers may enter any part of the library to which entry is forbidden.</li>
            <li>Visitors to the Library are required to obtain the permission of the Librarian to enter the library.</li>
            <li>No bags, cases, parcels, cellular phones, personal copies of books & printed materials, umbrellas etc. should be brought into the library.</li>
            <li>Seats in the Library may not be reserved or removed by the readers.</li>
            <li>The Library Staff will not hold themselves responsible for any losses.</li>
            <li>Consumption of food and drink, smoking and the use of matches or an open flame are forbidden in the library.</li>
            <li>Readers are not allowed to hold discussions in the library.</li>
            <li>It is requested that all readers should avoid wearing unsuitable clothes like shorts, caps etc. when they enter the library.</li>
            <li>Any disorderly or improper conduct or breach of regulations will render the reader or borrower concerned liable to suspension from using the library.</li>
            <li>SILENCE should be observed in all public reading areas</li>
            
            

        </ol>
    </div>
         

    
    
    


    
        

    <!-- Footer Start -->
     <?php include 'footer.php'; ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>