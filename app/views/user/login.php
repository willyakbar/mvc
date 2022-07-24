<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Login</title>
    <link href="<?= base ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col">
                                <div class="p-5">
                                    <div class="text-center text-uppercase">
                                        <h1 class="h4 text-gray-900 mb-4">login</h1>
                                    </div>
                                    <?php
                                    if (isset($_SESSION['flash'])) {
                                        Helper::flash();
                                    }
                                    ?>
                                    <form class="user" action="<?= base ?>user/getLogin" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="E-mail account">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block text-uppercase">
                                            login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <!-- Button trigger modal -->
                                        <a href="#" class="small text-capitalize" data-toggle="modal" data-target="#createAccount">
                                            create account
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <!-- Modal -->
        <div class="modal fade" id="createAccount" tabindex="-1" role="dialog" aria-labelledby="createAccountLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-capitalize">
                        <h5 class="modal-title text-white" id="createAccountLabel">create new account</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="user" action="<?= base ?>user/createAccount" method="post">
                            <input type="hidden" id="role" name="role_id" value="2">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="E-mail">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="pass_repeat" name="pass_repeat" placeholder="Repeat Password">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger text-capitalize" data-dismiss="modal">close</button>
                        <button type="submit" class="btn btn-primary text-capitalize">create</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>