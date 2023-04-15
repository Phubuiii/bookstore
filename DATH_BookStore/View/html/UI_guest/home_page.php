<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <!-- ======= Styles ====== -->
      <!--  icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
     <!--  style -->
    <link rel="stylesheet" type="text/css" href="View/css/UI_user/style_navbar_homepage.css">
    <link rel="stylesheet" type="text/css" href="View/bootstrap/css/bootstrap.min.css">
    <!-- ======= Scripts ====== -->
    <script src="View/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <!-- Topbar Start -->
    <?php include 'code_include/topbar.php'; 
    
       
        
    
    ?>
    <!-- Topbar End -->
    
    <div class="container-fluid">
        <div class="row border-top px-3">
            <!-- Sidebar Start -->
            <div class="col-lg-3 d-none d-lg-block navbar_left">
                <a class="btn d-flex align-items-center justify-content-between" 
                    data-toggle="collapse" href="#navbar-vertical" 
                    style="height: 60px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar" id="navbar-vertical" style="margin-top: -9px;">
                    <div class="list-group w-100">
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#tab1">Truyện, Tiểu Thuyết</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#tab2">Sách Giáo Trình</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#tab3">Tạp Chí</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#tab4">Truyện Tranh</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#tab5">Từ Điển</a>
                    </div>
                </nav>
            </div>
            <!-- Sidebar End -->

            <div class="col-lg-9">
                <!-- Navbar Start -->
                <?php $page = 'home_page';
                include 'code_include/navbar.php'; 
                ?>
                <!-- Navbar End -->

                <!-- Sidebar None Large Start -->
                <div class="d-block d-lg-none navbar_left">
                    <a class="btn d-flex align-items-center justify-content-between" 
                        data-toggle="collapse" href="#navbar-vertical1" 
                        style="height: 60px; padding: 0 30px;">
                        <h6 class="m-0">Thể Loại Sách</h6>
                        <i class="fa fa-angle-down text-dark"></i>
                    </a>
                    <nav class="collapse show navbar" id="navbar-vertical1" style="margin-top: -9px;">
                        <div class="list-group w-100">
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#tab1">Truyện, Tiểu Thuyết</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#tab2">Sách Giáo Trình</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#tab3">Tạp Chí</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#tab4">Truyện Tranh</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#tab5">Từ Điển</a>
                        </div>
                    </nav>
                </div>
                <!-- Sidebar None End Start -->

                <!-- Tab Content Start -->
                <div class="tab-content">
                    <!-- Tab HomePage -->
                    <div class="tab-pane active">
                        <?php include 'code_include/carousel.php'?> 
                    </div>
                    <!-- Tab Truyen, Tieu Thuyet -->
                    <div class="tab-pane" id="tab1">
                        123
                    </div>
                    <!-- Tab Giao Trinh -->
                    <div class="tab-pane" id="tab2">456</div>
                    <!-- Tab Tap Chi -->
                    <div class="tab-pane" id="tab3">789</div>
                    <!-- Tab Truyen Tranh -->
                    <div class="tab-pane" id="tab4">123</div>
                    <!-- Tab Tu Dien -->
                    <div class="tab-pane" id="tab5">456</div>
                </div>
                <!-- Tab Content End -->
            </div>
        </div>
    </div>
    <!-- ======= Scripts ====== -->
    <script src="View/script/user_navbar.js"></script>
</body>
</html>