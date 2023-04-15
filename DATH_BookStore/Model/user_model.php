<?php
    function checkLogin($phone,$password){
        require('model/db.php');
        if ($phone =='' and $password =='') return 'Please fill in the blank!!';
        if ($phone =='' ) return 'Please fill in your phone!';
        if ($password == '') return 'Please fill in your password!';

        $searchPhone = "SELECT * FROM employees WHERE phone  = '$phone'";
        $resultPhone = mysqli_query($con, $searchPhone);
        if (mysqli_num_rows($resultPhone) == 0) return "Wrong phone!";
        $phoneObj = mysqli_fetch_object($resultPhone);
        if ($phoneObj -> password != $password) return " Wrong password!";
        if ($phoneObj -> is_admin ==1) return "admin";
        return "employee";
    }

    function getEmployeeById($id){
        require('model/db.php');
        $searchEmployee = "SELECT * FROM employees WHERE id='$id'";
        $resultEmployee = mysqli_query($con,$searchEmployee);
        if (mysqli_num_rows($resultEmployee) == 0) return "Invalid id!";
        else return json_encode($resultEmployee->fetch_object());
    }

    function getEmployeeByPhone($phone){
        require('model/db.php');
        $searchEmployee = "SELECT * FROM employees WHERE phone='$phone'";
        $resultEmployee = mysqli_query($con,$searchEmployee);
        if (mysqli_num_rows($resultEmployee) == 0) return "Invalid phone!";
        else return json_encode($resultEmployee->fetch_object());
    }

    function addEmployee($id,$name,$cmnd,$email,$phone,$password,$address,$gender){
        require('model/db.php');
        echo $phone;
        $addEmp = "INSERT INTO employees (id,name,cmnd,email,phone,password,address,gender)
                        VALUE('$id','$name','$cmnd','$email','$phone','$password','$address','$gender')";
        mysqli_query($con,$addEmp);
    }

    function deleteEmployee($employeeId){
        require('model/db.php');
        $deleteEmployee = "DELETE FROM employees WHERE id =$employeeId";
        mysqli_query($con,$deleteEmployee);
    }

    function updateEmployee($currentId,$id,$name,$cmnd,$email,$phone,$password,$address,$gender){
        require('db.php');
        //update employee's information to database
        if (getEmployeeById($currentId) == 'Invalid id') return "fail";
        $curEmp = json_decode(getEmployeeById($currentId));
        if ($curEmp->id != $id) mysqli_query($con, "UPDATE employees
                                                    SET id='$id'
                                                    WHERE id=$currentId");
        if ($curEmp->name != $name) mysqli_query($con, "UPDATE employees
                                                    SET name='$name'
                                                    WHERE id=$currentId");
        if ($curEmp->cmnd != $cmnd) mysqli_query($con, "UPDATE employees
                                                    SET cmnd='$cmnd'
                                                    WHERE id=$currentId");
        if ($curEmp->email != $email) mysqli_query($con, "UPDATE employees
                                                    SET email='$email'
                                                    WHERE id=$currentId");
        if ($curEmp->phone != $phone) mysqli_query($con, "UPDATE employees
                                                    SET phone='$phone'
                                                    WHERE id=$currentId");
        if ($curEmp->password != $password) mysqli_query($con, "UPDATE employees
                                                    SET password='$password'
                                                    WHERE id=$currentId"); 
        if ($curEmp->address != $address) mysqli_query($con, "UPDATE employees
                                                    SET address='$address'
                                                    WHERE id=$currentId"); 
        if ($curEmp->gender != $gender) mysqli_query($con, "UPDATE employees
                                                    SET gender='$gender'
                                                    WHERE id=$currentId");                                            
        require_once('db.php');
    }

    
    function getEmployeeList() {
        require('model/db.php');
        $getList = "SELECT * FROM employees WHERE is_admin=0";
        $resultList = mysqli_query($con, $getList);
        $arrayList = array();
        while ($row = $resultList->fetch_object()) {
            $arrayList[]=json_encode($row);
        }
        return json_encode($arrayList);
    }

    function getEmployeeByEmail($email){
        require('model/db.php');
        $searchEmployee = "SELECT * FROM employees WHERE email = '$email'";
        $resultEmployee = mysqli_query($con,$searchEmployee);
        if (mysqli_num_rows($resultEmployee) == 0) return "Invalid email" ;
        else return json_encode($resultEmployee->fetch_object());
    }

    function checkAddEmployee($id,$name,$cmnd,$email,$phone,$password,$address,$gender){
        require('model/db.php');
        if(getEmployeeById($id) != "Invalid id" ) $idError = "duplicate";
        else if (strlen($id) == 0) $idError = "Fill in the blank" ;
        else $idError = "Well done!";

        if (strlen($name) < 4) $nameError ="invalid" ;
        else $nameError ="Well done!";

        if (strlen($cmnd) == 0 ) $cmndError ="invalid" ;
        else $cmndError ="Well done!";

        if(getEmployeeById($phone) != "Invalid phone" ) $phoneError = "duplicate";
        else if (strlen($phone) == 0) $phoneError = "Fill in the blank" ;
        else $phoneError = "Well done!";

        if (strlen($password) < 4) $passwordError ="invalid" ;
        else $passwordError ="Well done!";

        if(getEmployeeByEmail($id) != "Invalid email" ) $emailError = "duplicate";
        else if (strlen($email) <8) $emailError = "Fill in the blank" ;
        else $emailError = "Well done!";

        if (strlen($address) == 0) $addressError ="invalid" ;
        else $addressError ="Well done!";

        if (strlen($gender) == 0) $genderError ="invalid" ;
        else $genderError ="Well done!";

        if ($idError == "Well done!" && $nameError= "Well done!" && $cmndError = "Well done!" && $phoneError = "Well done!" && $passwordError == "Well done!" && $emailError == "Well done!" && $addressError = "Well done!" && $genderError == "Well done!") $checkAll =1 ;
        else $checkAll = 0 ;

        $errResultAdd = array ("idErrAdd" => $idError,
        "nameErrAdd" => $nameError,
        "cmndErrAdd" => $cmndError,
        "phoneErrAdd" => $phoneError,
        "passwordErrAdd" => $passwordError,
        "emailErrAdd" => $emailError,
        "addressErrAdd" => $addressError,
        "genderErrAdd" => $genderError,
        );
        $result = array ("errResultAdd" => json_encode($errResultAdd), "checkAll" => $checkAll);
        return $result;
    }
    
    function checkUpdateEmployee($currentId,$id,$name,$cmnd,$email,$phone,$password,$address,$gender){

        require('model/db.php');
        $currentEmployee = json_decode(getEmployeeById($currentId));

        if(getEmployeeById($id) != "Invalid id" ) $idError = "duplicate";
        else if (strlen($id) == 0) $idError = "Fill in the blank" ;
        else $idError = "Well done!";

        if (strlen($name) < 4) $nameError ="invalid" ;
        else $nameError ="Well done!";

        if (strlen($cmnd) == 0 ) $cmndError ="invalid" ;
        else $cmndError ="Well done!";

        if(getEmployeeById($phone) != "Invalid phone" ) $phoneError = "duplicate";
        else if (strlen($phone) == 0) $phoneError = "Fill in the blank" ;
        else $phoneError = "Well done!";

        if (strlen($password) < 6) $passwordError ="invalid" ;
        else $passwordError ="Well done!";

        if(getEmployeeByEmail($id) != "Invalid email" ) $emailError = "duplicate";
        else if (strlen($email) <8) $emailError = "Fill in the blank" ;
        else $emailError = "Well done!";

        if (strlen($address) == 0) $addressError ="invalid" ;
        else $addressError ="Well done!";

        if (strlen($gender) == 0) $genderError ="invalid" ;
        else $genderError ="Well done!";

        if ($idError == "Well done!" && $nameError= "Well done!" && $cmndError = "Well done!" && $phoneError = "Well done!" && $passwordError == "Well done!" && $emailError == "Well done!" && $addressError = "Well done!" && $genderError == "Well done!") $checkAll =1 ;
        else $checkAll = 0 ;

        $errResultUpd = array ("idErrUpd" => $idError,
        "nameErrUpd" => $nameError,
        "cmndErrUpd" => $cmndError,
        "phoneErrUpd" => $phoneError,
        "passwordErrUpd" => $passwordError,
        "emailErrUpd" => $emailError,
        "addressErrUpd" => $addressError,
        "genderErrUpd" => $genderError,
        );
        $result = array ("errResultUpd" => json_encode($errResultUpd), "checkAll" => $checkAll);
        return $result;
    }

?>