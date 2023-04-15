<?php
    include_once('base_controller.php');
    class managerController extends baseController {
        // display home_page_manager
        function home_page_manager() {
            //check session
            //if exist session, go to home page UI for manager
            //if not, display error and exit
            session_start();
            if (!isset($_SESSION['phone'])) {
                echo "error";
                exit;
            }
            else
            $this->render('View/html/UI_manager/home_page_manager');
        }
        function login() {

            //if user has filled login form
            if (isset($_POST['phone']) && isset($_POST['password'])) {
                
                include_once('model/user_model.php');
                
                //check login infomation
                $checkLoginManager = checkLogin($_POST['phone'], $_POST['password']);

                //if login infomation is admin => go to admin home page
                if ($checkLoginManager=='admin') {
                    session_start();
                    $_SESSION['phone'] = $_POST['phone'];
                    $_SESSION['is_admin'] = 1;
                    header('Location: index.php?controller=manager&action=home_page_manager');
                }
                //if login infomation is employee => go to home page for employee
                else if ($checkLoginManager=='employee'){
                    session_start();
                    $_SESSION['phone'] = $_POST['phone'];
                    $_SESSION['is_admin'] = 0;
                    header('Location: index.php?controller=employee&action=home_page_employee');
                }
                //if login information is not correct => go to login employee page
                else {
                    $data = array('loginErr' => $checkLoginManager);
                    $this->render('View\html\UI_guest\login_manager', $data);
                }
            }
            else {
                $data = array('loginErr' => 'first');
                $this->render('View/html/UI_guest/login_manager', $data);
            }
        }

        // display employee_table
        function employee_table() {
            include_once('model/user_model.php');
            $employeeList = getEmployeeList();
            $data = array("employeeList"=> $employeeList);
            $this->render('View/html/UI_manager/employee_table',$data);
        }
        function add_employee(){
            include_once("model/user_model.php");
            session_start();
            if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1){
                $result = checkAddEmployee($_POST['ID'], $_POST['name'], $_POST['CMND'], $_POST['email'], $_POST['phone'], $_POST['password'], $_POST['address'], $_POST['gender']);
                extract($result);
                $employeeList = getEmployeeList();
                $data = array("resultErrorAdd" => $resultErrorAdd, "employeeList" => $employeeList);
                if ($checkAll ==1){
                    echo "Well done!";
                    addEmployee($_POST['ID'], $_POST['name'], $_POST['CMND'], $_POST['email'], $_POST['phone'], $_POST['password'], $_POST['address'], $_POST['gender']);
                    header("location : index.php?controller=manager&action=employee_table");
                    
                }
                else  $this->render('View\html\UI_manager\employee_table', $data);
            }
        }

        function update_employee(){
            include_once("model/user_model.php");
            session_start();
            if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1){
                $result = checkUpdateEmployee($_GET['currentId'],$_POST['ID'], $_POST['name'], $_POST['CMND'], $_POST['email'], $_POST['phone'], $_POST['password'], $_POST['address'], $_POST['gender']);
                extract($result);
                $employeeList = getEmployeeList();
                $data = array("resultErrorUpd" => $resultErrorUpd, "employeeList" => $employeeList,'currentId' =>$_GET['currentId']);
                if ($checkAll ==1){
                    echo "Well done!";
                    updateEmployee($_GET['currentId'],$_POST['ID'], $_POST['name'], $_POST['CMND'], $_POST['email'], $_POST['phone'], $_POST['password'], $_POST['address'], $_POST['gender']);
                    header("location : index.php?controller=manager&action=employee_table");
                    
                }
                else  $this->render('View\html\UI_manager\employee_table', $data);
            }
        }

        function delete_employee(){
            include_once("model/user_model.php");
            deleteEmployee($_GET['employeeID']);
            header("Location: index.php?controller=manager&action=employee_table");

        }
        // manager logout display home_page
        function logout() {
            session_start();
            session_destroy();
            header("Location: index.php?controller=guest&action=home_page");
        }
    }
?>