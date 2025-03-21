@if(session('super') || session('admin'))





<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mystyle.css">

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
<body  style="background-color:black;">


        <!-- navbar start -->

        <nav class="nav text-light" style="background-color:#191C24;">
            <div class="container-fluid">
                <div class="row p-3">
                    <div class="col-lg-8 col-md-7 col-sm-9 col-xs-9">
                       <h5> Employee Management System </h5>
                    
                    </div>

                        <div class="col-lg-2 col-md-2 col-sm-0 col-xs-0"></div>
                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-3" style="display:flex;">

                                    @if(session('super'))
                                        <a href="/super-dashboard" class="mr-3 ml-5" style="color: #6C7293;">Home</a> 
                                        <a href="/superAdminLogout" style="color: #6C7293;">Logout</a>

                                    @elseif(session('admin'))  
                                        <a href="/admin-profile" class="mr-3 ml-5" style="color: #6C7293;">Home</a> 
                                       <a href="/adminLogout" style="color: #6C7293;">Logout</a>
                                    @endif
                          
                        </div>
                        
                </div>
            </div>
        </nav>
        <!-- navbar end -->






<br/>
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-2 col-md-2 col-sm-12 col-12 ">

        </div>

        <div class="col-lg-8 col-md-8 col-sm-12 col-12 mr-2 form-body p-4">


      
            <h6 class="text-white mb-4">Employee Edit</h6> 
                <form action="/employee-update/{{$data->id}}" method="post">

                            @csrf

                            <input type="hidden" name="_method" value="put">

                            <div class="row mb-3">
                                <label for="inputName3" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-field" id="inputName3" name="name" value="{{$data->name}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputemail3" class="col-sm-2 col-form-label">Eamil Id.</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-field" id="inputemail3" name="email" value="{{$data->email}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputphone3" class="col-sm-2 col-form-label">Phone no.</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-field" id="inputphone3" name="phone" value="{{$data->phone}}">
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="inputposition3" class="col-sm-2 col-form-label">Position</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-field" id="inputposition3" name="position" value="{{$data->position}}">
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
        <div class="col-lg-2 col-md-2 col-sm-12 col-12">

        </div>
    </div>

</div>

</body>
</html>








@else
    <center>
        <h1 style="margin-top:100px">
        Session doesn't exist in current context <a href="/">Go Back</a>
    </h1>
    </center>    
@endif