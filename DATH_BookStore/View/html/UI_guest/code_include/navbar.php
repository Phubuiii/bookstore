<nav class="navbar navbar-expand-lg bg-light navbar-light p-2">
    <a href="index.php?controller=guest&action=home_page" class="d-block d-lg-none">
    <img src="View/images/logo.png" style="width: 100px;" alt="logo">
    </a>
    <button type="button" 
        class="navbar-toggler" 
        data-toggle="collapse" 
        data-target="#navbarCollapse"
        style="border-radius: 0;">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="index.php?controller=guest&action=home_page"
                class="nav-item nav-link <?php echo ($page == 'home_page') ? 'active' : ''; ?>" >Trang Chủ</a>
            <a href="#" class="nav-item nav-link">Sản Phẩm</a>
            <a href="#" class="nav-item nav-link">Tin Tức</a>
            <a href="#" class="nav-item nav-link">Liên Hệ</a>
            <a href="index.php?controller=guest&action=login_manager" 
                class="nav-item nav-link <?php echo ($page == 'login_manager') ? 'active' : ''; ?>">Quản Trị Viên</a>
        </div>
        <div class="navbar-nav ml-auto nav_main">
                <?php
                    if (isset($_SESSION['phone']) && isset($_SESSION['name'])) {
                      
                        echo '
            <div>
                        
                        <a href="index.php?controller=guest&action=profile" class="nav-item nav-link">
                        <div style="display: inline-block;">
                        <div style="display: inline-block; margin-right: 10px;">
                        <img src="View/images/avt_user.jpg" 
                        style="width: 30px; height: 30px; border-radius: 50%; 
                        object-fit: cover; margin-bottom: 3px;" 
                        alt="avatar">
                        </div>
                        <div style="display: inline-block; font-weight: 500; margin-top: 7px;">
                        Chào, '.$_SESSION['name'].'
                        </div>
                        </div>
                    </a>
            </div>
            <div>
            <a href="index.php?controller=user&action=logout" class="nav-item nav-link">
            <i class="bi bi-box-arrow-right text-dark"></i>
            Đăng xuất
            </a>
        </div>
                    ';
                    }
                    
                    else {
                        echo '
            <div>

                        <a href="index.php?controller=guest&action=login" class="nav-item nav-link">
                        <i class="bi bi-person text-dark"></i>
                        Đăng Nhập
                        </div>
                    </a>
                    <div>
                    <a href="index.php?controller=guest&action=signup" class="nav-item nav-link">
                    <i class="bi bi-box-arrow-right text-dark"></i>
                    Đăng ký
                    </a>
                </div>
                        
            ';
                    }
                    
                    
                    
                    ?>
           
        </div>
    </div>
</nav>