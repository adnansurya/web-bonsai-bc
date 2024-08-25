 <!doctype html>
 <html lang="en">
 
     <head>
         <meta charset="utf-8" />
         <title>Register | Bonleaf</title>
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
         <meta content="Themesdesign" name="author" />
         <!-- App favicon -->
         <link rel="shortcut icon" href="/dashboard/assets/images/logo2.ico">
 
         <!-- Bootstrap Css -->
         <link href="/dashboard/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
         <!-- Icons Css -->
         <link href="/dashboard/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
         <!-- App Css-->
         <link href="/dashboard/assets/css/app.min.css" rel="stylesheet" type="text/css" />
 
     </head>
 
     <body class="bg-primary bg-pattern">
         <div class="home-btn d-none d-sm-block">
             <a href="/"><i class="mdi mdi-home-variant h2 text-white"></i></a>
         </div>
 
         <div class="account-pages my-5 pt-sm-5">
             <div class="container">
 
                 <div class="row justify-content-center">
                     <div class="col-xl-5 col-sm-8">
                         <div class="card">
                             <div class="card-body p-4">
                                 <div class="p-2">
                                    <div style="text-align: center;">
                                        <img src="/dashboard/assets/images/logo2.png" width="100" alt="">
                                    </div>    
                                     <form class="form-horizontal" action="{{ route('register') }}" method="POST">
                                        @csrf
                                         <div class="row">
                                             <div class="col-md-12">
                                                 <div class="form-group form-group-custom mb-4">
                                                     <input value="{{ old('name') }}" name="name" type="text" class="form-control" id="name" required>
                                                     <label for="name">Nama Lengkap</label>
                                                 </div>
                                                 <div class="form-group form-group-custom mb-4">
                                                     <input value="{{ old('wa_number') }}" name="wa_number" type="text" class="form-control" id="wa_number" required>
                                                     <label for="wa_number">Nomor Handphone</label>
                                                 </div>
                                                 <div class="form-group form-group-custom mb-4">
                                                     <input value="{{ old('email') }}" name="email" type="email" class="form-control" id="email" required>
                                                     <label for="email">Email</label> 
                                                 </div>
                                                 <div class="form-group form-group-custom mb-4">
                                                     <input value="{{ old('password') }}" name="password" type="password" class="form-control" id="password" required>
                                                     <label for="password">Password</label>
                                                 </div>
                                                 <div class="form-group form-group-custom mb-4">
                                                     <input value="0" name="is_seller" type="hidden" class="form-control" id="is_seller" required>
                                                 </div>
                                                 <div class="mt-4">
                                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Daftar</button>
                                                 </div>
                                                 <div class="mt-4 text-center">
                                                     <a href="/login" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Saya sudah punya Akun</a>
                                                 </div>
                                             </div>
                                         </div>
                                     </form>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- end row -->
             </div>
         </div>
         <!-- end Account pages -->
 
         <!-- JAVASCRIPT -->
         <script src="/dashboard/assets/libs/jquery/jquery.min.js"></script>
         <script src="/dashboard/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
         <script src="/dashboard/assets/libs/metismenu/metisMenu.min.js"></script>
         <script src="/dashboard/assets/libs/simplebar/simplebar.min.js"></script>
         <script src="/dashboard/assets/libs/node-waves/waves.min.js"></script>
 
         <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>
 
 
         <script src="/dashboard/assets/js/app.js"></script>
 
     </body>
 </html>
 