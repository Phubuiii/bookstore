<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <!-- ======= Styles ====== -->
      <!--  icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
     <!--  style -->
    <link rel="stylesheet" type="text/css" href="View/css/UI_user/style_navbar_homepage.css">
    <link rel="stylesheet" type="text/css" href="View/css/UI_user/style_login.css">
    <link rel="stylesheet" type="text/css" href="View/bootstrap/css/bootstrap.min.css">
    <!-- ======= Scripts ====== -->
    <script src="View/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>

    <!-- Topbar Start -->
    <?php include 'code_include/topbar.php'; ?>
    <!-- Topbar End -->
    <?php
        

        
        if (!isset($firstNameErr)) $firstNameErr='first';
        if (!isset($lastNameErr )) $lastNameErr ='first';
        if (!isset($phoneErr )) $phoneErr ='first';
        if (!isset($emailErr )) $emailErr ='first';
        if (!isset($passwordErr )) $passwordErr ='first';
        if (!isset($password2Err )) $password2Err ='first';
        
    //     echo '<pre/>
    //     <span>
    //     ';
    //     print_r($phoneErr);
    //     echo '</span>
    // <pre/>';
    //     if(isset($_SESSION)) {
    //         echo '<pre/>
    //         <span>
    //         ';
    //         print_r($_SESSION);
    //         echo '</span>
    //     <pre/>';

    //     }
    ?>
    <div class="container-fluid">
        <div class="row border-top px-3">
            <div class="col-lg-12">
                <!-- Navbar Start -->
                <?php $page = 'signup';
                include 'code_include/navbar.php'; ?>
                <!-- Navbar End -->

                <!-- Breadcrumb Start -->
                <div class="row mt-3 px-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php?controller=guest&action=home_page">Trang chủ</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Đăng Ký</li>
                        </ol>
                    </nav>
                </div>
                <!-- Breadcrumb End -->

                <!-- Register Form Start -->
                <div class="row bg_login1">
                    <div class="col-sm-12">
                        <?php include 'code_include/form_register.php'; ?>
                    </div>
                </div>
                <!-- Register Form End -->
            </div>
        </div>
    </div>

    <!-- ======= Scripts ====== -->
    <script src="View/script/user_navbar.js"></script>
</body>
</html>