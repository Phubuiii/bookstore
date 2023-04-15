<?php
    function checkLogin($phone, $password) {
        require('model/db.php');
        $data = [];

        if (empty($phone)  && empty($password )) {
            $data['errors']['fields'] = "emptyfields";
            return $data;
        }
        if (empty($phone) ) {
            $data['errors']['phone'] = "emptyphone";
            return $data;
        }
        else {
            $phone_regex ="/^[0-9]{10}+$/";
            if(!preg_match($phone_regex, $phone)) {
                $data['errors']['phone'] = "invalidphone";
                return $data;
            }
        }
        if (empty($password) )  {
            $data['errors']['password'] = "emptypassword";
            return $data;
            
        }
        //search for phone in database
        $sql = "SELECT * FROM customers WHERE phone = ?";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            return false;
        }
        else {
           
            mysqli_stmt_bind_param($stmt, "s",$phone );
            mysqli_stmt_execute($stmt);
           
            $result = mysqli_stmt_get_result($stmt);
           
           
            if (!empty($row  = mysqli_fetch_assoc($result))) {

                $passwordCheck = password_verify($password, $row['password']);
                
                if  ($passwordCheck) {
                    session_start();
                    $_SESSION['phone'] = $row['phone'];
                    $_SESSION['name'] = $row['name'];
                    $data['status'] = "success";
                //    return $result;

                }
                else {
                    $data['errors']['password'] = "wrongpassword";
                    // return $result;
                }
                
            }
            else {
                $data['errors']['phone'] = "unavailablephone";
                // return $result;
            };
        }
    

        return $data;

      
    }

    function checkSignUp($firstName, $lastName,$phone, $email, $password, $password2) {
        //check first name
        if (strlen($firstName) < 2 || strlen($firstName) > 30) $firstNameErr = 'length';
        else $firstNameErr = 'good';

        //check last name
        if (strlen($lastName) < 2 || strlen($lastName) > 30) $lastNameErr = 'length';
        else $lastNameErr = 'good'; 

        //check phone

        include('model/db.php');

        if (strlen($phone) == 0) $phoneErr='missing';
        else {
            $searchPhone = "SELECT * FROM customers WHERE phone = '$phone'";
            $resultPhone = mysqli_query($con, $searchPhone);
            if (mysqli_num_rows($resultPhone) != 0) $phoneErr = 'hasUsed';
            else $phoneErr = 'good';
        }

        //check email
        if (strlen($email) == 0) $emailErr='missing';
        else {
            $searchEmail = "SELECT * FROM customers WHERE email = '$email'";
            $resultEmail = mysqli_query($con, $searchEmail);
            if (mysqli_num_rows($resultEmail) != 0) $emailErr = 'hasUsed';
            else $emailErr = 'good';
        }

        //check password
        if (strlen($password) < 8 || strlen($password) > 16) $passwordErr = 'length';
        else $passwordErr = 'good';

        //check password 2
        if ($password != $password2) $password2Err = 'matching';
        else $password2Err = 'good';

        $errArr = array('firstNameErr' => $firstNameErr,
                        'lastNameErr' => $lastNameErr,
                        'phoneErr' => $phoneErr,
                        'emailErr' => $emailErr,
                        'passwordErr' => $passwordErr,
                        'password2Err' => $password2Err);
        return $errArr;
    }
    function getCustomerByPhone($phone) {
        require('model/db.php');
        $searchPhone = "SELECT * FROM customers WHERE phone = '$phone'";
        $resultPhone = mysqli_query($con, $searchPhone);
        return json_encode(mysqli_fetch_object($resultPhone));
        
    }
    function addCustomer($firstName, $lastName,$phone, $email, $password) {
        //add customer to database
        require("model/db.php");
        $fullName = $firstName . ' ' . $lastName;
        $sql = "INSERT INTO customers (name, password, email, phone)
                    Value (?, ? , ? , ?);";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt,$sql)) {
            // header("Location: 'index.php?controller=user&action=signup?error=sql'");
            return false;
        }
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $fullName, $hashedPassword , $email, $phone);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);


        // header("Location: index.php?controller=user&action=signup?signup=success");

        return true;
        //  $result = mysqli_query($con, $addInfo);
    }
    

    function getInformationUser ($phone) {
        require('model/db.php');
        $data = [];
        $sql = "SELECT * FROM customers WHERE phone = ?";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $data['errors'] = [
                'sql' => 'connectfail'];
            return $data;
        }
        else {
           
            // Check user is available
            mysqli_stmt_bind_param($stmt, "s",$phone );
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if (!empty($row  = mysqli_fetch_assoc($result))) {

                // $passwordCheck = password_verify($password, $row['password']);
                //Get user information
                $user = [
                    'fullname' => $row['name'],
                    'address' => $row['address'],
                    'phone' => $row['phone'],
                    'email' => $row['email'],
                    'gender' => $row['gender'],
                    'password' => $row['password'],
                    'image' => $row['image'],
                    'birthday' => $row['birthday'],
                ];
                $data['user'] = $user;
             
                
            }
            else {
                $data['errors']['phone'] = "unavailablephone";
            };
        }
    

        // header("Location: index.php?controller=user&action=signup?signup=success");

        return $data;
    }   

    function updateInformationUser () {
        require('model/db.php');
        

    }
    function getName($phone) {
        require('model/db.php');
        $searchPhone = "SELECT * FROM customers WHERE phone = '$phone'";
        $resultPhone = mysqli_query($con, $searchPhone);
        if (mysqli_num_rows($resultPhone) == 0) return "Undefinded";
        $phoneObj = mysqli_fetch_object($resultPhone);
        return $phoneObj->name;
    }
    
?>