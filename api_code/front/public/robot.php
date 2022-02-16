<!DOCTYPE html>
<html lang="en">
<head>
    <title>公众号机器人训练</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- description -->
    <meta name="description" content="Login Form - Responsive Template">
    <link rel="shortcut icon" href="images/favicon.ico">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Icons CSS -->
    <link rel="stylesheet" href="css/materialdesignicons.css">
    <!-- Bootstrap Checkbox CSS -->
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <!-- Rippler CSS -->
    <link rel="stylesheet" href="css/rippler.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive  CSS -->
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>

    <div class="container py-2">
        <div class="row">
            <div class="col-md-12">
                <div class="logo">
                    <a href="#">
                        <h1>训练计划</h1>
                    </a>
                </div>
                <div class="row">
                    <div class="col-md-6 login-form mx-auto">
                        <!-- form card login -->
                        <div class="card">
                            <div class="card-header">
                                <!-- <h3 class="mb-0">Login</h3> -->
                            </div>
                            <div class="card-body">
                                <form id="formLogin" method="POST" class="formLogin" action="https://api.hnmy.club/robotadd">
                                    <div class="form-group">
                                        <input for="username" class="form-control" id="name" name="get" placeholder="公众号收到的用户消息" type="text" required="">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <div class="form-group">
                                        <input for="password" type="textra" class="form-control" placeholder="公众号回复用户的消息" id="pwd" required="" name="post">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-12 text-right"><button type="submit" class="btn btn-success hover-btn btn-wd " id="btnLogin" center><span>训练</span></button></div>
                                    </div>
                                </form>
                                <!-- /form card login -->
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <!--/col-->
                </div>
                <!--/row-->
            </div>
            <!--/container-->

            <!-- jquery latest version -->
            <script src="js/jquery.min.js"></script>
            <!-- popper.min.js -->
            <script src="js/popper.min.js"></script>
            <!-- bootstrap js -->
            <script src="js/bootstrap.min.js"></script>
            <!-- Jquery Rippler js -->
            <script src="js/jquery.rippler.min.js"></script>
            <!-- script js -->
            <script src="js/script.js"></script>
</body>

</html>