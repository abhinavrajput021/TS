@if(session('admin'))


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">


    <style>
        .form-body{
            background-color: #191C24;
            color: #6C7293;
        }
        .input-field{
            background-color: #000000;
            color: #6C7293;
            border:none;
            
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->






       








        <!-- Sign In Start -->
        <div class="container-fluid">

           <div class="row p-3" style="background-color:#191C24;">
                   <div class="col-lg-8 col-md-7 col-sm-9 col-xs-9">
                       <h5> Employee Management System </h5>
                    
                    </div>

                        <div class="col-lg-2 col-md-2 col-sm-0 col-xs-0"></div>
                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-3" style="display:flex;">
                            <div style="width:30%;"></div>
                           <a href="/admin-profile" class="" style="color: #6C7293;">Home</a> &nbsp; &nbsp;
                           <a href="#" style="color: #6C7293;">Logout</a>
                        </div>


           </div>



            <div class="row h-100 align-items-center justify-content-center" style="min-height: 80vh;">
                 <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6"> 
                  <!-- <div class="col-sm-12 col-xl-6"> -->
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Admin</h6>
                            <form action="adminprofileeditform" method="post">

                               @csrf
                             
                               <div class="row mb-3">
                                    <label for="inputName3" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName3" name="name" value="{{$data->name}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputemail3" class="col-sm-2 col-form-label">Eamil Id.</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputemail3" name="email" value="{{$data->email}}">
                                    </div>
                                </div>
                
                                <div class="row mb-3">
                                    <label for="inputphone3" class="col-sm-2 col-form-label">Phone no.</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputphone3" name="phone" value="{{$data->phone}}">
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="inputposition3" class="col-sm-2 col-form-label">Position</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputposition3" name="position" value="{{$data->position}}">
                                    </div>
                                </div>
                                
                               <div class="row mb-3">
                                    <div class="col-sm-9"></div>
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-primary" style="float:right;">Update</button>
                                    </div>
                               </div>
                            </form>
                        </div>
                    </div>
                   
                    
                    
                    <!-- </div> -->
                </div>
            </div>
        </div>

        <br><br<br><br>>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>








@else
        <center>
            <h1 style="margin-top:100px">
            Session doesn't exist in current context <a href="/">Go Back</a>
        </h1>
        </center>    
@endif