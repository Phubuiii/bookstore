<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management</title>
    <!-- ======= Styles ====== -->
      <!--  icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
      <!-- style -->
    <link rel="stylesheet" type="text/css" href="View/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="View/css/UI_manager/style_manager.css"/>
    <link rel="stylesheet" type="text/css" href="View/css/UI_manager/style_navbar_manager.css"/>
    
</head>

<body>

    <div class="container-fluid">
      <!-- Topbar Start -->
      <?php include 'code_include/topbar.php' ?>
      <!-- Topbar End -->

      <div class="row">
        <!-- Sidebar Start -->
        <div class="col-md-3 col-lg-2 sidebar" style="margin-top: 60px;">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="index.php>controller=manager&action=home_page_manager">Thông tin chung</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?controller=manager&action=employee_table">Nhân viên</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Sản phẩm</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Đơn hàng</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Feedback</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Doanh thu</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- Sidebar End --> 

        <!-- Tab Thông tin chung Start -->
        <div class="col-md-9 col-lg-10" >
          <div class="main">
            <!-- ======================= Cards ================== -->
            <div class="container-fluid mt-5 pt-3">
                <div class="row">
                    <div class="col-md-6 col-lg-3 mt-3">
                      <div class="card card-1">
                        <div class="card-body">
                          <i class="bi bi-eye text-dark fa-2x"></i>
                          <div class="numbers">1,504</div>
                          <div class="card-name">Lượt xem</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mt-3">
                      <div class="card card-2">
                        <div class="card-body">
                          <i class="bi bi-basket3 fa-2x"></i>
                          <div class="numbers">80</div>
                          <div class="card-name">Sản phẩm đã bán</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mt-3">
                      <div class="card card-3">
                        <div class="card-body">
                          <i class="bi bi-chat-dots fa-2x"></i>
                          <div class="numbers">284</div>
                          <div class="card-name">Feedback</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mt-3">
                      <div class="card card-4">
                        <div class="card-body">
                          <i class="bi bi-cash-stack fa-2x"></i>
                          <div class="numbers">$7,842</div>
                          <div class="card-name">Doanh thu</div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>

            <!-- ======================= Đơn hàng ================== -->
            <div class="details mt-3">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Đơn đặt hàng gần đây</h2>
                        <a href="#" class="btn border-dark">Chi tiết</a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Price</td>
                                <td>Date</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Apple Watch</td>
                                <td>$1200</td>
                                <td>19:47 23/03/2023</td>
                                <td><span class="badge bg-danger text-dark">Trả hàng</span></td>
                            </tr>

                            <tr>
                                <td>Addidas Shoes</td>
                                <td>$620</td>
                                <td>19:47 23/03/2023</td>
                                <td><span class="badge bg-primary text-dark">Đang vận chuyển</span></td>
                            </tr>
                            <tr>
                              <td>Star Refrigerator</td>
                              <td>$1200</td>
                              <td>13:34 17/03/2023</td>
                              <td><span class="badge bg-success text-dark">Hoàn thành</span></td>
                          </tr>

                          <tr>
                              <td>Dell Laptop</td>
                              <td>$110</td>
                              <td>19:47 23/03/2023</td>
                              <td><span class="badge bg-warning text-dark">Chưa xác nhận</span></td>
                          </tr>

                          <tr>
                              <td>Apple Watch</td>
                              <td>$1200</td>
                              <td>06:28 23/03/2023</td>
                              <td><span class="badge bg-info text-dark">Đang đóng gói</span></td>
                          </tr>

                          <tr>
                              <td>Addidas Shoes</td>
                              <td>$620</td>
                              <td>19:47 23/03/2023</td>
                              <td><span class="badge bg-primary text-dark">Đang vận chuyển</span></td>
                          </tr>

                          <tr>
                              <td>Star Refrigerator</td>
                              <td>$1200</td>
                              <td>22:57 23/03/2023</td>
                              <td><span class="badge bg-success text-dark">Hoàn thành</span></td>
                          </tr>

                          <tr>
                              <td>Dell Laptop</td>
                              <td>$110</td>
                              <td>19:47 23/03/2023</td>
                              <td><span class="badge bg-primary text-dark">Đang vận chuyển</span></td>
                          </tr>

                          <tr>
                              <td>Apple Watch</td>
                              <td>$1200</td>
                              <td>20:23 21/03/2023</td>
                              <td><span class="badge bg-danger text-dark">Trả hàng</span></td>
                          </tr>

                          <tr>
                              <td>Addidas Shoes</td>
                              <td>$620</td>
                              <td>12:24 06/03/2023</td>
                              <td><span class="badge bg-info text-dark">Đang đóng gói</span></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
        <!-- Tab Thông tin chung End -->        
      </div>
    </div>
</body>

</html>