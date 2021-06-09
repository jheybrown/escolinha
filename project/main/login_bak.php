<?php
session_start();
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>PGC</title>
    <link rel="apple-touch-icon" href="../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/semi-dark-layout.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern boxicon-layout no-card-shadow 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- login page start -->
                <section id="auth-login" class="row flexbox-container">
                    
                            <div class="row col-md-6">
                                <!-- left section-login -->
                                <div class="col-12 px-0">
                                    <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="text-center mb-1">PGC</h4>
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                
                                                <div class="divider">
                                                    <div class="divider-text text-uppercase text-muted"><small>Bem Vindo ao sistema</small>
                                                    </div>
                                                </div>
                                                <form class="form" action="" method="POST">
                                                    <div class="form-group mb-100">
                                                        <label class="text-bold-600" for="exampleInputEmail1">Usuário</label>
                                                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="...."></div>
                                                    <div class="form-group">
                                                        <label class="text-bold-600" for="exampleInputPassword1">Senha</label>
                                                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="****">
                                                    </div>
                                                    <div class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                                                        <div class="text-left">
                                                            <div class="checkbox checkbox-sm">
                                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <button type="submit" name="login" class="btn btn-success glow w-100 position-relative">Entrar<i id="icon-arrow"  class="bx bx-right-arrow-alt"></i></button>
                                                    </form>
                                                    <div class="form-group mb-100">
                                                        <?php

if(isset($_POST['login'])){

$username=$_POST['username'];
$password=md5($_POST['password']);


  $mysqli = new mysqli("localhost", "root", "", "covid");
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  }
  $res = $mysqli->query("SELECT * FROM login where username='$username' and password='$password'");
  $row = $res->fetch_assoc();
  $name = $row['name_login'];
  $user = $row['username'];
  $pass = $row['password'];
  $type = $row['type_login'];
  if($user==$username && $pass=$password){
    session_start();
    if($type=="admin"){
      $_SESSION['nome']=$name;
      $_SESSION['acesso']=$type;
      echo "<script>window.location.assign('paciente_list.php')</script>";
    } else if($type=="user"){
      $_SESSION['nome']=$name;
      $_SESSION['acesso']=$type;
      echo "<script>window.location.assign('paciente_add.php')</script>";
    } else{
?>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <strong>Atenção!</strong> Preencha todos campos.
</div>
<?php
    }
  } else{

    $name = a;
  $user = a;
  $pass = a;
  $type = a;

echo'<span class="text-danger text center"> Usuário ou Senha incorrecto!</span>';


  }
}
?></div>


                                                

                                                <hr>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- right section image -->
                                
                            </div>
                      
                </section>
                <!-- login page ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="../app-assets/vendors/js/vendors.min.js"></script>
    <script src="../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
    <script src="../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
    <script src="../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../app-assets/js/core/app-menu.js"></script>
    <script src="../app-assets/js/core/app.js"></script>
    <script src="../app-assets/js/scripts/components.js"></script>
    <script src="../app-assets/js/scripts/footer.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>