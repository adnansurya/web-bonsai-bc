<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Login | Bonleaf</title>
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

                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-xl-5 col-sm-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-2">
                                <div style="text-align: center;">
                                    <img src="/dashboard/assets/images/logo2.png" width="100" alt="">
                                </div>

                                    <form class="form-horizontal" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                                    <label for="email">E-mail</label>
                                                </div>

                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="password" class="form-control" id="password" name="password" required>
                                                    <label for="password">Password</label>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="custom-control custom-checkbox">
                                                            <input name="remember" type="checkbox" class="custom-control-input" id="customControlInline">
                                                            <label class="custom-control-label" for="customControlInline">Remember me   </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Masuk</button>
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <a href="/register" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i>Buat Akun Baru</a>
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
