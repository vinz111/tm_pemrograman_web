<?php include 'head.php'; ?>
<title>Download Books</title>
<style>
    thead-light{
        font-size: 20px;
        font-weight: bold;
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
                    <h1 class="display-3 text-white animated slideInDown">E-Book servise</h1>
                    <!-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                        </ol>
                    </nav> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    
    <div class="container">
        
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">NAME</th>
                        <th scope="col">AUTHOR</th>
                        <th scope="col" class="text-center">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $conn = mysqli_connect('localhost', 'root', '', 'library_managment');

                       
                        $stmt = "SELECT * FROM pdf";
                        $run = mysqli_query($conn, $stmt);
                        $i=1;
                        while($row = mysqli_fetch_assoc($run)){

                    ?>
                    <tr>
                        <th scope="row"><?php echo $i++ ?></th>
                        <td><?php echo $row['pname']?></td>
                        <td><?php echo $row['pauthor']?></td>
                        <td class="text-center"><a href="download.php?file=<?php echo $row['bpdf'] ?>" class="btn btn-primary">download</a></td>
                        
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
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

    <script>
        function myfunction(){
            var dots = document.getElementById("dots");

            var moreText = document.getElementById("more");
            
            var btntext = document.getElementById("mybtn");

            if(dots.style.display === "none"){
                dots.style.display = "inline";
                btntext.innerHTML = "Read More";
                moreText.style.display ="none";

            }else{
                dots.style.display = "none";
                btntext.innerHTML = "Read less";
                moreText.style.display ="inline";
            }

        }
    </script>

</body>

</html>