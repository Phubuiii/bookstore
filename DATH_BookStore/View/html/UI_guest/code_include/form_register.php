<div class="frame_login">
  <h4 style="font-weight: 700">REGISTER TO YOUR ACCOUNT</h4>
  <h6 class="mt-3 text-muted text-white" style="font-weight: 500">
    Enter your details to register
  </h6>
  <form action="index.php?controller=guest&action=signup" method="post">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group mt-5">
          <label for="firstname" style="font-weight: 700">HỌ</label>
          <div class="input-group">
            <input
              type="text"
              class="form-control mt-3"
              id="firstname"
              style="border-radius: 0; padding-left: 40px"
              placeholder="Enter your first name"
              name="firstname"
            />
            <span
              class="input-group-addon"
              style="position: absolute; left: 15px; top: 23px"
            >
              <i class="fa fa-user text-success"></i>
            </span>
          </div>
          <p class="text-danger">
            <?php
                                                        switch ($firstNameErr) {
                                                            case "length": echo "Họ và tên phải có độ dài từ 2-30 ký tự";
                                                                break;
                                                            default: break;
                                                        }
                                                    ?>
          </p>
        </div>
        <div class="form-group mt-3">
          <label for="phonenumber" style="font-weight: 700"
            >SỐ ĐIỆN THOẠI</label
          >
          <div class="input-group">
            <input
              type="tel"
              class="form-control mt-3"
              id="phonenumber"
              style="border-radius: 0; padding-left: 40px"
              placeholder="Enter your phone number"
              name="phone"
            />
            <span
              class="input-group-addon"
              style="position: absolute; left: 15px; top: 23px"
            >
              <i class="fa fa-phone text-success"></i>
            </span>
          </div>
          <p class="text-danger">
            <?php
                                                        switch ($phoneErr) {
                                                            case "missing": echo "Xin hãy nhập số điện thoại!";
                                                                break;
                                                            case 'hasUsed':
                                                                echo "Số điện thoại đã được sử dụng";
                                                                break;
                                                            default: break;
                                                        }
                                                    ?>
          </p>
        </div>
        <div class="form-group mt-3">
          <label for="password" style="font-weight: 700">MẬT KHẨU</label>
          <div class="input-group">
            <input
              type="password"
              class="form-control mt-3"
              id="password"
              style="border-radius: 0; padding-left: 40px"
              placeholder="Enter your password"
              name="password"
            />
            <span
              class="input-group-addon"
              style="position: absolute; left: 15px; top: 23px"
            >
              <i class="fa fa-lock text-success"></i>
            </span>
          </div>
          <p class="text-danger">
            <?php
                                                        switch ($passwordErr) {
                                                            case "length": echo "Mật khẩu phải có 8-16 ký tự";
                                                                break;
                                                            default: break;
                                                        }
                                                    ?>
          </p>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group mt-5">
          <label for="lastname" style="font-weight: 700">TÊN</label>
          <div class="input-group">
            <input
              type="text"
              class="form-control mt-3"
              id="lastname"
              style="border-radius: 0; padding-left: 40px"
              placeholder="Enter your last name"
              name="lastname"
            />
            <span
              class="input-group-addon"
              style="position: absolute; left: 15px; top: 23px"
            >
              <i class="fa fa-user text-success"></i>
            </span>
          </div>
          <p class="text-danger">
            <?php
                                                        switch ($lastNameErr) {
                                                            case "length": echo "Họ và tên phải có độ dài từ 2-30 ký tự";
                                                                break;
                                                            default: break;
                                                        }
                                                    ?>
          </p>
        </div>
        <div class="form-group mt-3">
          <label for="email" style="font-weight: 700">EMAIL</label>
          <div class="input-group">
            <input
              type="email"
              class="form-control mt-3"
              id="email"
              style="border-radius: 0; padding-left: 40px"
              placeholder="Enter your email"
              name="email"
            />
            <span
              class="input-group-addon"
              style="position: absolute; left: 15px; top: 23px"
            >
              <i class="fa fa-envelope text-success"></i>
            </span>
          </div>
          <p class="text-danger">
            <?php
                                                        switch ($emailErr) {
                                                            case "missing": echo "Xin hãy nhập email!";
                                                                break;
                                                            case 'hasUsed':
                                                                echo "Email đã được sử dụng";
                                                                break;
                                                            default: break;
                                                        }
                                                    ?>
          </p>
        </div>
        <div class="form-group mt-3">
          <label for="password2" style="font-weight: 700"
            >XÁC NHẬN MẬT KHẨU</label
          >
          <div class="input-group">
            <input
              type="password"
              class="form-control mt-3"
              id="password2"
              style="border-radius: 0; padding-left: 40px"
              placeholder="Enter your password"
              name="password2"
            />
            <span
              class="input-group-addon"
              style="position: absolute; left: 15px; top: 23px"
            >
              <i class="fa fa-lock text-success"></i>
            </span>
          </div>
          <p class="text-danger">
            <?php
                                                        switch ($password2Err) {
                                                            case "matching": echo "Mật khẩu không khớp nhau!";
                                                                break;
                                                            default: break;
                                                        }
                                                    ?>
          </p>
        </div>
      </div>
    </div>
    <button
      type="submit"
      class="btn btn-danger mt-4"
      style="min-width: 120px; border-radius: 0"
    >
      Đăng ký
    </button>
  </form>
</div>
