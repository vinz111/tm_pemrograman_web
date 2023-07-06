<!DOCTYPE html>
<?php include 'head.php'; ?>
<title>Gallery</title>
    <style>
        .image{
            display: inline-block;
            width: 33.33%;
            float: left;
        }
        figure{
            overflow: hidden;
            margin: 0 10px;
            padding: 15px;
        }
        .image img{
            display: block;
            width: 100%;
            height: auto;
            cursor: pointer;
        }
        .image #zoom-In img{
            transform: scale(1);
            transition: 0.3s ease-in-out;
        }
        .image #zoom-In:hover img{
            transform: scale(1.5);

        }
    </style>

</head>

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
                    <h1 class="display-3 text-white animated slideInDown">Gallery</h1>
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


    <!-- Categories Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Gallery</h6>
                <h1 class="mb-5">Library Functions</h1>
            </div>
        </div>
    </div>
   

    
    <div class="row">
        <?php
            $con = mysqli_connect('localhost','root','','library_managment');
            $query=mysqli_query($con,"select * from img");

            $check = mysqli_num_rows($query) > 0;
            if($check){
                while($row=mysqli_fetch_array($query)){
                    ?>
                    <div class="image">
                        <div id="zoom-In">
                            <figure>
                            <img class="img-fluid" src="<?php echo $row['image']; ?> " alt="">
                            </figure>
                        </div>
                    </div>
                    <?php
                }
            }else{
                echo"Not Image found"; 
            }
        ?>
     <div>
<!-- Categories End -->       

    
    
    


    
        

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