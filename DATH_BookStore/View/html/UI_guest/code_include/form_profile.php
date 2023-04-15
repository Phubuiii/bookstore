<?php 

    print_r($errors);
?>

<div class="card p-4">
<div class="row">
<div class="col-md-3">
    <?php

?>
 <img src="<?php if (isset($image)) {echo $image;} else  {echo 'View/images/avt_user.jpg';} ?>" alt="avatar"
    style="width: 100%; object-fit: cover; border-radius: 50%;"
    >

</div>
<div class="col-md-6 mt-4">
    <div class="row mt-2">
        <div class="col-md-12 d-flex">
            <h3 class="me-4"><?php  if(isset($name))  {echo $name;} else echo 'User';?></h3>
            <i class="bi bi-geo-alt mt-1 me-1"></i>
            <h6 class="mt-2"><?php  if(isset($address))  {echo $address;} else echo '';?></h6>
        </div>
    </div>
    <div class="row mt-4">
        <div class="custom-file mt-4">
            
            <label class="custom-file-label" for="customFile">
                <h6>Change your avatar</h6>
            </label><br>
            <input type="file" class="custom-file-input mt-2" id="customFile" value="">
        </div>
    </div>
</div>
</div>
<div class="row mt-5">
<form action="index.php?controller=guest&action=profile" method="post">
    <h5>THÔNG TIN TÀI KHOẢN</h5>
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="name">Họ tên</label>
            <input type="text" class="form-control mt-2" id="name" value="<?php  if(isset($fullname))  {echo $fullname;} else echo '';?>" name="fullname">
            <p class='text-danger'>
                                            <?php
                                                if(!empty($errors['fullname'])) {
                                                    switch ($errors['fullname']) {
                                                        case "emptyfield":
                                                            echo "Trường này không thể trống";
                                                            break;
                                                        default: 
                                                            break;
                                                    }
                                                }
                                               
                                            ?>
                                        </p>
        </div>
        <div class="form-group col-md-6">
            <label for="address">Địa Chỉ</label>
            <input type="text" class="form-control mt-2" id="address" value="<?php  if(isset($address))  {echo $address;} else echo '';?>" name="address">
            <p class='text-danger'>
                                            <?php
                                                if(!empty($errors['address'])) {
                                                    switch ($errors['address']) {
                                                        case "emptyfield":
                                                            echo "Trường này không thể trống";
                                                            break;
                                                        default: 
                                                            break;
                                                    }
                                                }
                                               
                                            ?>
                                        </p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="phone">Số Điện Thoại</label>
            <input type="tel" class="form-control mt-2"id="phone" value="<?php  if(isset($phone))  {echo $phone;} else echo '';?>" name="phone">
            <p class='text-danger'>
                                            <?php
                                                if(!empty($errors['phone'])) {
                                                    switch ($errors['phone']) {
                                                        case "emptyfield":
                                                            echo "Trường này không thể trống";
                                                            break;
                                                        default: 
                                                            break;
                                                    }
                                                }
                                               
                                            ?>
                                        </p>
        </div>
        <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" class="form-control mt-2" id="email" value="<?php  if(isset($email))  {echo $email;} else echo '';?>" name="email">
            <p class='text-danger'>
                                            <?php
                                                if(!empty($errors['email'])) {
                                                    switch ($errors['email']) {
                                                        case "emptyfield":
                                                            echo "Trường này không thể trống";
                                                            break;
                                                        default: 
                                                            break;
                                                    }
                                                }
                                               
                                            ?>
                                        </p>
        </div>
    </div>
    <div class="form-group mt-3">
        <label for="gender">Giới Tính</label><br>
        <div class="form-check-inline mt-2">
            <label>
                <input type="radio" class="form-check-input" name="gender" value="Nam" <?php  if (isset($gender) && $gender == "Nam") {
                  
                  echo "checked";
              } ?> required>
                <span style="font-weight: 400;">Nam</span>
            </label>
        </div>
        <div class="form-check-inline">
            <label>
                <input type="radio" class="form-check-input" name="gender" value="Nữ"  <?php  if (isset($gender) && $gender == "Nữ") {
                  
                  echo "checked";
              } ?> required>
                <span style="font-weight: 400;">Nữ</span>
            </label>
        </div>
    </div>
    
    <h5 class="mt-5">THAY ĐỔI MẬT KHẨU</h5>
    <div class="form-group mt-3">
        <label for="password">Mật Khẩu Cũ</label>
        <input type="password" class="form-control mt-2" id="password" placeholder="Nhập mật khẩu cũ" name="password">
    </div>
    <div class="form-group mt-3">
        <label for="newpassword">Mật Khẩu Mới</label>
        <input type="password" class="form-control mt-2" id="newpassword" placeholder="Nhập mật khẩu mới" name="newpassword"> 
        <p class='text-danger'>
                                            <?php
                                                if(!empty($errors['newpassword']) && empty($errors['newpassword2'])) {
                                                    switch ($errors['newpassword']) {
                                                        case "emptyfield":
                                                            echo "Trường này không thể trống";
                                                            break;
                                                        default: 
                                                            break;
                                                    }
                                                }
                                               
                                            ?>
                                        </p>
    </div>
    <div class="form-group mt-3">
        <label for="newpassword_confirm">Xác Nhận Mật Khẩu</label>
        <input type="password" class="form-control mt-2" id="newpassword_confirm" placeholder="Nhập mật khẩu mới" name="newpassword2">
        <p class='text-danger'>
                                            <?php
                                                if(!empty($errors['newpassword2']) ) {
                                                    if($errors['newpassword2'] == 'emptyfield' && $errors['newpassword'] != 'emptyfield') {

                                                        echo "Trường này không thể trống";
                                                    }
                                                    else if(!   empty($errors['unmatch'])) {
                                                        echo "Nhập lại mật khẩu không khớp";

                                                    }
                                                    else {

                                                    }
                                                
                                                }
                                               
                                            ?>
                                        </p>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-end">
            <button type="submit" class="btn mt-5">Lưu Thay Đổi</button>
        </div>
    </div>
</form>
</div>
</div>