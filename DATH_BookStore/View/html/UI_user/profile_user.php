
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
     <link rel="stylesheet" type="text/css" href="View/css/UI_user/style_profile_user.css"> 
    <link rel="stylesheet" type="text/css" href="View/css/UI_user/style_navbar_homepage.css">
    <link rel="stylesheet" type="text/css" href="View/bootstrap/css/bootstrap.min.css">
    <!-- ======= Scripts ====== -->
    <script src="View/bootstrap/js/bootstrap.min.js"></script>
    <script src="View/jquery/jquery-3.6.4.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

</head>
<body>

    <!-- Topbar Start -->
    <?php include 'code_include/topbar.php'; ?>
    <!-- Topbar End -->
    
    <div class="container-fluid">
        <div class="row border-top px-3">
            <div class="col-lg-12">
                <!-- Navbar Start -->
                <?php $page='profile_user';
                include 'code_include/navbar.php'; ?>
                <!-- Navbar End -->

                <div class="row">
                    <!-- Sidebar Start -->
                    <div class="col-md-3 mt-2">
                        <div class="card">
                            <div class="list-group" id="myList">
                                <a class="list-group-item list-group-item-action active" data-toggle="list" href="#profile">Hồ sơ</a>
                                <a class="list-group-item list-group-item-action" data-toggle="list" href="#cart">Giỏ hàng</a>
                                <a class="list-group-item list-group-item-action" data-toggle="list" href="#bill">Đơn mua</a>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar End -->

                    <!-- Profile Start -->
                    <div class="col-md-9 mt-2">
                        <!-- Tab Content Start -->
                        <div class="tab-content">
                            <!-- Tab Profile -->
                            <div class="tab-pane active" id="profile">
                                <?php include 'code_include/profile_user.php'; ?>
                            </div>
                            <!-- Tab Giỏ Hàng -->
                            <div class="tab-pane" id="cart">Đây là Tab giỏ hàng</div>
                            <!-- Tab Đơn Mua -->
                            <div class="tab-pane" id="bill">Đây là Tab đơn mua</div>
                        </div>
                        <!-- Tab Content End -->
                    </div>
                    <!-- Profile End -->
                </div>
            </div>
        </div>
    </div>
    <!-- ======= Scripts ====== -->
    <script>
        $('#myList a').on('click', function () {
            $(this).tab('show')
        })
    </script>
</body>
</html>