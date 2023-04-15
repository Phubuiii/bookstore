<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management</title>
    <!-- ======= Styles ====== -->
      <!--  icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
      <!--  style -->
    <link rel="stylesheet" type="text/css" href="View/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="View/css/UI_manager/style_navbar_manager.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="View/css/UI_employee/style_table_employee.css">
    <!-- ======= Scripts ====== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
      function showPassword(id) {
      var x = document.getElementById(id);
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
        //get content using ajax
        function getMainContent(link, elementID) {
            $.ajax({
                // The link we are accessing.
                url: link,
                    
                // The type of request.
                type: "get",
                    
                // The type of data that is getting returned.
                dataType: "html",
                success: function( strData ){
                    document.getElementById(elementID).innerHTML = strData;
                    carousel()
                }
            });
        }
    </script>
</head>

<body>
  <?php
      if (isset($errResultAdd)) {
        $errResultAdd = json_decode($errResultAdd);
      }
      if (isset($errResultUpd)) {
        $errResultUpd = json_decode($errResultUpd);
      }
      
    ?>
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
                <a class="nav-link active" href="index.php?controller=manager&action=home_page_manager">Thông tin chung</a>
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

        <!-- Table Employee Start -->
        <div class="col-md-9 col-lg-10 mt-3">
          <div class="container-fluid mt-5 pt-3">
            <div class="row">
              <div class="col-md-12 mb-3">
                <div class="card">
                  <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Data Table
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="employee-table" class="table table-striped" >
                        <thead>
                          <tr>
                            <th>Mã Nhân Viên</th>
                            <th>Tên</th>
                            <th>Giới tính</th>
                            <th>CMND</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Button</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $employeeList = json_decode($employeeList);
                          if (count($employeeList)==0) echo '<h2 class="text-center text-danger">M đuổi hết cmn nhân viên r !!!</h2>';
                          foreach($employeeList as $employee) {
                              $employee = json_decode($employee);
                          echo'
                          
                          <tr>
                            <td class="text-center">'.$employee->id.'</td>
                            <td class="text-center">'.$employee->name.'</td>
                            <td class="text-center">'.$employee->gender.'</td>
                            <td class="text-center">'.$employee->cmnd.'</td>
                            <td class="text-center">'.$employee->address.'</td>
                            <td class="text-center">'.$employee->email.'</td>
                            <td class="text-center">'.$employee->phone.'</td>
                            <td>
                              <!-- Edit Modal Start -->
                              <button class="btn btn-sm btn-dark" data-target="#confirm-edit-modal-'.$employee->id.'">Edit</button>
                              <div class="modal fade" id="confirm-edit-modal-'.$employee->id.'" tabindex="-1" role="dialog">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          <h5>Chỉnh sửa thông tin nhân viên</h5>
                                        </div>
                                        <div class="modal-body">
                                          <form method="POST" action="index.php?controller=manager&action=update_employee&currentId='.$employee->id.'"id="updateEmployee'.$employee->id.'">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="ID" style="font-weight: 500;">MÃ NHÂN VIÊN</label>
                                                        <input type="number" class="form-control mt-2" id="ID" name="ID" 
                                                            placeholder="Enter ID" required value='.$employee->id.'>
                                                            <p class="text-danger">';
                                                              
                                                              if (isset($errResultUpd))
                                                                switch ($errResultUpd->idErrUpd) {
                                                                  case "duplicate": 
                                                                    echo "ID đã được đăng ký!";
                                                                    break;
                                                                  case 'missing':
                                                                    echo "Vui lòng nhập ID nhân viên!";
                                                                    break;
                                                                  default: break;
                                                                  }
                                                                  echo '
                                                            </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name" style="font-weight: 500;">TÊN</label>
                                                        <input type="text" class="form-control mt-2" id="name" name="'.$employee->name.'"
                                                            placeholder="Enter name" required>
                                                            p class="text-danger">';
                                                              
                                                                  if (isset($errResultUpd))
                                                                  switch ($errResultUpd->nameErrUpd) {
                                                                    case "invalid": 
                                                                      echo "Tên không hợp lệ";
                                                                      break;
                                                                    default: break;
                                                                    }
                                                              
                                                              
                                                          echo '
                                                            </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="CMND" style="font-weight: 500;">CMND</label>
                                                        <input type="text" class="form-control mt-2" id="CMND" name="'.$employee->cmnd.'" 
                                                            placeholder="Enter CMND" required>
                                                            <p class="text-danger">';
                                                          
                                                              if (isset($errResultUpd))
                                                                switch ($errResultUpd->cmndErrUpd) {
                                                                  case "invalid": 
                                                                    echo "CMND không hợp lệ";
                                                                    break;
                                                                  default: break;
                                                                }
                                                              
                                                              
                                                          echo '
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email" style="font-weight: 500;">EMAIL</label>
                                                            <input type="email" class="form-control mt-2" id="email" name="'.$employee->email.'"
                                                                placeholder="Enter email" required value='.$employee->id.'> 
                                                                <p class="text-danger">';
                                                  
                                                              if (isset($errResultUpd))
                                                                switch ($errResultUpd->emailErrUpd) {
                                                                  case "duplicate": 
                                                                    echo "Email đã được đăng ký!";
                                                                    break;
                                                                  case 'invalid':
                                                                    echo "Email không hợp lệ!";
                                                                    break;
                                                                  default: break;
                                                                  }
                                                              
                                                              
                                                          echo '
                                                            </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone" style="font-weight: 500;">SỐ ĐIỆN THOẠI</label>
                                                        <input type="tel" class="form-control mt-2" id="phone" name="'.$employee->phone.'"
                                                            placeholder="Enter phone number" required>
                                                            <p class="text-danger">';
                                              
                                                              if (isset($errResultUdp))
                                                                switch ($errResultUpd->phoneErrUpd) {
                                                                  case "duplicate": 
                                                                    echo "Số điện thoại đã được đăng ký!";
                                                                    break;
                                                                  case 'invalid':
                                                                    echo "Số điện thoại không hợp lệ!";
                                                                    break;
                                                                  default: break;
                                                                  }
                                                              
                                                              
                                                          echo '
                                                            </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="password" style="font-weight: 500;">MẬT KHẨU</label>
                                                            <input type="password" class="form-control mt-2" id='.$employee->id.'" name="password" value="'.$employee->password.'"
                                                                placeholder="Enter password" required>
                                                                <p class="text-danger">';
                                            
                                                                    if (isset($errResultUpd))
                                                                      switch ($errResultUpd->passwordErrUpd) {
                                                                        case "invalid": 
                                                                          echo "Mật khẩu không hợp lệ";
                                                                          break;
                                                                        default: break;
                                                                        }
                                                                    
                                                                    
                                                                echo '
                                                                </p>
                                                          <input type="checkbox" onclick="showPassword(\'password'.$employee->id.'\')">Show Password

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="address" style="font-weight: 500;">ĐỊA CHỈ</label>
                                                            <input type="text" class="form-control mt-2" id="address" name="'.$employee->address.'"
                                                                placeholder="Enter address" required>
                                                                <p class="text-danger">';
                                        
                                                                  if (isset($errResultUpd))
                                                                    switch ($errResultUpd->addressErrUpd) {
                                                                      case "invalid": 
                                                                        echo "Địa chỉ không hợp lệ";
                                                                        break;
                                                                      default: break;
                                                                      }
                                                                  
                                                                  
                                                              echo '
                                                                </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="gender" style="font-weight: 500;">GIỚI TÍNH</label><br>
                                                        <div class="form-check-inline mt-1">
                                                            <label>
                                                            <input type="radio" class="form-check-input" name="gender" value="nam" required ';if ($employee->gender=='nam') echo 'checked'; echo '>Nam
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label>
                                                            <input type="radio" class="form-check-input" name="gender" value="nữ" required ';if ($employee->gender=='nữ') echo 'checked'; echo '>Nữ
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-dismiss="modal">Hủy</button>
                                            <a href="#"><button type="button" class="btn btn-primary" onclick="document.getElementById(\'updateEmployee'.$employee->id.'\').submit();">Lưu</button></a>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                              <!-- Edit Modal End -->

                              <!-- Delete Modal Start -->
                              <button class="btn btn-sm btn-danger" data-target="#confirm-delete-modal-'.$employee->id.'">Delete</button>
                              <div class="modal fade" id="confirm-delete-modal-'.$employee->id.'" tabindex="-1" role="dialog">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5>Xác nhận xóa</h5>
                                        </div>
                                        <div class="modal-body">
                                        Bạn có chắc chắn muốn xóa thông tin nhân viên?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-dismiss="modal">Hủy</button>
                                            <a href="index.php?controller=manager&action=delete_employee&employeeID='.$employee->id.'"><button type="button" class="btn btn-danger">Xóa</button></a>
                                            </div>
                                    </div>
                                  </div>
                              </div>     
                              <!-- Delete Modal End -->           
                            </td>
                            </tr>';
                          }
                          ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>Mã Nhân Viên</th>
                            <th>Tên</th>
                            <th>Giới tính</th>
                            <th>CMND</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Button</th>
                          </tr>
                        </tfoot>
                      </table>

                      <!-- Add Modal Start -->
                      <button id="add-btn" class="btn btn-dark mt-2" data-target="#confirm-add-modal">Add Employee</button>
                      <div class="modal fade" id="confirm-add-modal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5>Thêm thông tin nhân viên</h5>
                            </div>
                            <div class="modal-body">
                              <form method="POST">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="ID" style="font-weight: 500;">MÃ NHÂN VIÊN</label>
                                      <input type="number" class="form-control mt-2" id="ID" name="ID" <?php if (isset($_POST['ID'])) echo "value='".$_POST['ID']."'" ?>
                                              placeholder="Enter ID" required>
                                              <p class='text-danger'>
                                                  <?php
                                                  if (isset($errResultAdd))
                                                    switch ($errResultAdd->idErrAdd) {
                                                      case "duplicate": 
                                                        echo "ID đã được đăng ký!";
                                                        break;
                                                      case 'missing':
                                                        echo "Vui lòng nhập ID nhân viên!";
                                                        break;
                                                      default: break;
                                                      }
                                                  ?>
                                                </p>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="name" style="font-weight: 500;">TÊN</label>
                                      <input type="text" class="form-control mt-2" id="name" name="name" <?php if (isset($_POST['name'])) echo "value='".$_POST['name']."'" ?>
                                            placeholder="Enter name" required>
                                            <p class='text-danger'>
                                                        <?php
                                                        if (isset($errResultAdd))
                                                          switch ($errResultAdd->nameErrAdd) {
                                                            case "invalid": 
                                                              echo "Tên không hợp lệ";
                                                              break;
                                                            default: break;
                                                            }
                                                        ?>
                                                      </p>
                                    </div>
                                  </div>
                                </div>
                                <div class="row mt-2">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="CMND" style="font-weight: 500;">CMND</label>
                                        <input type="text" class="form-control mt-2" id="CMND" name="CMND" <?php if (isset($_POST['CMND'])) echo "value='".$_POST['CMND']."'" ?>
                                              placeholder="Enter CMND" required>
                                              <p class='text-danger'>
                                                    <?php
                                                    if (isset($errResultAdd))
                                                      switch ($errResultAdd->cmndErrAdd) {
                                                        case "invalid": 
                                                          echo "CMND không hợp lệ";
                                                          break;
                                                        default: break;
                                                        }
                                                    ?>
                                                  </p>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="email" style="font-weight: 500;">EMAIL</label>
                                      <input type="email" class="form-control mt-2" id="email" name="email" <?php if (isset($_POST['email'])) echo "value='".$_POST['email']."'" ?>
                                            placeholder="Enter email" required>
                                            <p class='text-danger'>
                                                  <?php
                                                  if (isset($errResultAdd))
                                                    switch ($errResultAdd->emailErrAdd) {
                                                      case "duplicate": 
                                                        echo "Email đã được đăng ký!";
                                                        break;
                                                      case 'invalid':
                                                        echo "Email không hợp lệ!";
                                                        break;
                                                      default: break;
                                                      }
                                                      ?>
                                                </p>
                                    </div>
                                  </div>
                                </div>
                                <div class="row mt-2">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="phone" style="font-weight: 500;">SỐ ĐIỆN THOẠI</label>
                                          <input type="tel" class="form-control mt-2" id="phone" name="phone" <?php if (isset($_POST['phone'])) echo "value='".$_POST['phone']."'" ?>
                                          placeholder="Enter phone number" required>
                                          <p class='text-danger'>
                                          <?php
                                            if (isset($errResultAdd))
                                            switch ($errResultAdd->phoneErrAdd) {
                                              case "duplicate": 
                                                echo "Số điện thoại đã được đăng ký!";
                                                break;
                                              case 'invalid':
                                                echo "Số điện thoại không hợp lệ!";
                                                break;
                                              default: break;
                                              }
                                          ?>
                                      </p>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="password" style="font-weight: 500;">MẬT KHẨU</label>
                                          <input type="password" class="form-control mt-2" id="password-add" name="password" <?php if (isset($_POST['password'])) echo "value='".$_POST['password']."'" ?>
                                                  placeholder="Enter password" required>
                                                  <p class='text-danger'>
                                                      <?php
                                                      if (isset($errResultAdd))
                                                        switch ($errResultAdd->passwordErrAdd) {
                                                          case "invalid": 
                                                            echo "Mật khẩu không hợp lệ";
                                                            break;
                                                          default: break;
                                                          }
                                                      ?>
                                                    </p>
                                                    <input type="checkbox" onclick="showPassword('password-add')">Show Password

                                      </div>
                                  </div>
                                </div>                                          
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address" style="font-weight: 500;">ĐỊA CHỈ</label>
                                            <input type="text" class="form-control mt-2" id="address" name="address" <?php if (isset($_POST['address'])) echo "value='".$_POST['address']."'" ?>
                                                    placeholder="Enter address" required>
                                                    <p class='text-danger'>
                                                        <?php
                                                        if (isset($errResultAdd))
                                                          switch ($errResultAdd->addressErrAdd) {
                                                            case "invalid": 
                                                              echo "Địa chỉ không hợp lệ";
                                                              break;
                                                            default: break;
                                                            }
                                                        ?>
                                                     </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender" style="font-weight: 500;">GIỚI TÍNH</label><br>
                                            <div class="form-check-inline mt-1">
                                                <label>
                                                <input type="radio" class="form-check-input" name="gender" value="nam" <?php if (!isset($_POST['gender'])) echo "checked"; else {if ($_POST['gender']=='nam') echo "checked";} ?> required>Nam
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label>
                                                <input type="radio" class="form-check-input" name="gender" value="nữ" required  <?php if(isset($_POST['gender']) && $_POST['gender'] == "nữ") echo "checked";?>>Nữ
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Hủy</button>
                                <button type="button" class="btn btn-primary" onclick='document.getElementById("addEmployee").submit();'>Thêm</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Add Modal Start -->

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Table Employee End -->
      </div>
    </div>

    <!-- ======= Scripts ====== -->
    <script src="View/script/employee_table.js"></script>
    <?php
      if (isset($errResultAdd)) echo '
      <script>
      var myModal = new bootstrap.Modal(document.getElementById("confirm-add-modal"), {
        keyboard: false
      })
      myModal.show();
    </script>
      ';

      if (isset($errResultUpd)) echo '
      <script>
      var myModal = new bootstrap.Modal(document.getElementById("confirm-edit-modal-'.$currentId.'"), {
        keyboard: false
      })
      myModal.show();
    </script>
      ';
    ?>

</body>

</html>