 <!DOCTYPE html>
 <html lang="en">

 <head>
     <!-- Required meta tags-->
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="au theme template">
     <meta name="author" content="Hau Nguyen">
     <meta name="keywords" content="au theme template">

     <!-- Title Page-->
     <title>Login</title>

     <!-- Fontfaces CSS-->
     <link href="/admins/css/font-face.css" rel="stylesheet" media="all">
     <link href="/admins/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
     <link href="/admins/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
     <link href="/admins/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

     <!-- Bootstrap CSS-->
     <link href="/admins/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

     <!-- Vendor CSS-->
     <link href="/admins/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
     <link href="/admins/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet"
         media="all">
     <link href="/admins/vendor/wow/animate.css" rel="stylesheet" media="all">
     <link href="/admins/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
     <link href="/admins/vendor/slick/slick.css" rel="stylesheet" media="all">
     <link href="/admins/vendor/select2/select2.min.css" rel="stylesheet" media="all">
     <link href="/admins/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

     <!-- Main CSS-->
     <link href="/admins/css/theme.css" rel="stylesheet" media="all">

 </head>

 <body class="">
     <div class="page-wrapper">
         <div class="page-content--bge5">
             <div class="container">
                 <div class="login-wrap">
                     <div class="login-content">
                          
                         <div class="login-form">
                             <form action="{{ route('admin.login') }}" method="post">
                                 @csrf
                                 @if (\Session::has('notification_error'))
                                     <span class="text-danger">{!! \Session::get('notification_error') !!}</span>
                                 @endif  
                                 <div class="form-group">
                                     <label>Email Address</label>
                                     <input class="au-input au-input--full" type="email" name="email"
                                         placeholder="Email">
                                 </div>
                                 <div class="form-group">
                                     <label>Password</label>
                                     <input class="au-input au-input--full" type="password" name="password"
                                         placeholder="Password">
                                 </div>
                                 <div class="login-checkbox">
                                     <label>
                                         <input type="checkbox" name="remember">Remember Me
                                     </label>
                                 </div>
                                 <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign
                                     in</button>

                             </form>

                         </div>
                     </div>
                 </div>
             </div>
         </div>

     </div>

     <!-- Jquery JS-->
     <script src="/admins/vendor/jquery-3.2.1.min.js"></script>
     <!-- Bootstrap JS-->
     <script src="/admins/vendor/bootstrap-4.1/popper.min.js"></script>
     <script src="/admins/vendor/bootstrap-4.1/bootstrap.min.js"></script>
     <!-- Vendor JS       -->
     <script src="/admins/vendor/slick/slick.min.js"></script>
     <script src="/admins/vendor/wow/wow.min.js"></script>
     <script src="/admins/vendor/animsition/animsition.min.js"></script>
     <script src="/admins/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
     <script src="/admins/vendor/counter-up/jquery.waypoints.min.js"></script>
     <script src="/admins/vendor/counter-up/jquery.counterup.min.js"></script>
     <script src="/admins/vendor/circle-progress/circle-progress.min.js"></script>
     <script src="/admins/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
     <script src="/admins/vendor/chartjs/Chart.bundle.min.js"></script>
     <script src="/admins/vendor/select2/select2.min.js"></script>

     <!-- Main JS-->
     <script src="js/main.js"></script>

 </body>

 </html>
 <!-- end document-->
