<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('css/style2.css') }}">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2  sideber">
               <div class="card p-3 my-3 ">
               <img src="{{ asset('img/about.jpg') }}" alt="">
               <div class="text-center">
                <em class="text-primary m-0 mt-3"><h6>Bashir</h6></em>
                <p class="m-0">('Admin')</p>
               </div>
            </div>
          

            <div class="card  sideber-nav">
                <div class="d-flex">
               <!-- Sidebar -->
                <div class="bg-dark text-white p-2" style="width: 100%; min-height:100vh;">
                  <h4 class="text-center mb-4">Admin Panel</h4>
              <ul>
                  <li class="nav-item mb-2"><a href="/dashboard" class="nav-link text-white"><i class="fa-solid fa-gauge me-2"></i> Dashboard</a></li>

                  <li class="nav-item mb-2"><a href="/users" class="nav-link text-white"><i class="fa-solid fa-users me-2"></i>Users</a></li>
 
                  <li class="nav-item mb-2"><a href="/services" class="nav-link text-white"><i class="fa-solid fa-screwdriver-wrench me-2"></i> Services</a></li>

                  <li class="nav-item mb-2"><a href="/products" class="nav-link text-white"><i class="fa-solid fa-box me-2"></i> Products</a></li>

                  <li class="nav-item mb-2"><a href="/projects" class="nav-link text-white"><i class="fa-solid fa-solar-panel me-2"></i> Projects</a></li>

                   <li class="nav-item mb-2"><a href="/team" class="nav-link text-white"><i class="fa-solid fa-user-tie me-2"></i> Team</a></li>

                    <li class="nav-item mb-2"><a href="/testimonials" class="nav-link text-white"><i class="fa-solid fa-star me-2"></i> Testimonials</a></li>
  
                   <li class="nav-item mb-2"><a href="/quotes" class="nav-link text-white"><i class="fa-solid fa-file-invoice me-2"></i> Quotes</a></li>

                   <li class="nav-item mb-2"><a href="/contacts" class="nav-link text-white">
                    <i class="fa-solid fa-envelope me-2"></i> Contacts</a></li>


                  <li class="nav-item mt-4"><a href="/logout" class="nav-link text-danger">
                  <i class="fa-solid fa-right-from-bracket me-2"></i> Logout</a></li>

            </ul>
            </div>


         </div>
            </div>

         </div>

           <div class="flex-grow-1 p-4">
                <h2>Welcome to Dashboard</h2>
                <p>Your content goes here...</p>
    