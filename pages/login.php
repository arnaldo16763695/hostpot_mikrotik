<?php

if (isset($_SESSION["user_id"])) {
    print "<script>window.location='index.php?page=home';</script>";
};


?>

<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Login</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body oncontextmenu='return false' class='snippet-body'>
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <div class="card card0 border-0">
            <div class="row d-flex">
                <div class="col-lg-6">
                    <div class="card1 pb-5">

                        <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="https://i.imgur.com/uNGdWHi.png" class="image"> </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    
                    <div class="card2 card border-0 px-4 py-5">
                        <div class="row mb-4 px-3" style="display: none;">
                            <h6 class="mb-0 mr-4 mt-2">Sign in with</h6>
                            <div class="facebook text-center mr-3">
                                <div class="fa fa-facebook"></div>
                            </div>
                            <div class="twitter text-center mr-3">
                                <div class="fa fa-twitter"></div>
                            </div>
                            <div class="linkedin text-center mr-3">
                                <div class="fa fa-linkedin"></div>
                            </div>
                        </div>
                        <div style="text-align: center;"> <img src="img/logo1.png" class="imgresponsive"> </div>
                        <div class="row px-3 mb-4">

                            <div class="line"></div> <small class="or text-center">Login</small>
                            <div class="line"></div>
                        </div>
                        <form id="form-login">
                        <div class="alert d-none" id="responseMessage" role="alert"></div>
                            <div class="row px-3"> <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Ususario</h6>
                                </label> <input class="mb-4" type="text" name="username" id="username" placeholder="Enter a valid email address"> </div>
                            <div class="row px-3"> <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Contraseña</h6>
                                </label> <input type="password" name="password" id="password" placeholder="Enter password"> </div>
                            <div class="row px-3 mb-4">

                            </div>
                            <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Entrar</button> </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="bg-blue py-4">
                <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2019. All rights reserved.</small>

                </div>
            </div>
        </div>
        <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
        <script src="assets/js/fetch.js"></script>
</body>

</html>