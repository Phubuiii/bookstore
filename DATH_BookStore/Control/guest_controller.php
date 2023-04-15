<?php
    include_once('base_controller.php');
    class guestController extends baseController {

        //home page for guest (not login yet)
        function home_page() {
            session_start();
            $this->render('View/html/UI_guest/home_page');
        }
        
        //login form
        function login() {
            //if user has filled login form
      

            if (isset($_POST['phone']) && isset($_POST['password'])) {
                
                include_once('model/customer_db.php');
                
                //check login infomation, get login error
                $result = checkLogin($_POST['phone'], $_POST['password']);
                //if login infomation not correct, redirect to login page with error code
                if (!empty($result['errors'] )) {
                    $this->render('View/html/UI_guest/login',$result );
                }
                //login infomation correct => go to home page for user
                else {
                    header('Location: index.php?controller=guest&action=home_page');
                    // $this->render('View/html/home_page');
                }
            }
            else {
                //if not filled form yet
          
                $data = array('loginErr' => 'first');
                $this->render('View/html/UI_guest/login', $data);
            }
        }

        //register form

        function signup() {
            //include model
           
            include_once('model/customer_db.php');
           
            if (isset($_POST['firstname']) && isset($_POST['lastname']) &&
                isset($_POST['phone']) && isset($_POST['email']) &&
                isset($_POST['password']) && isset($_POST['password2'])){     
                    //get error code 
                    $errArr = checkSignUp($_POST['firstname'], $_POST['lastname'],
                                $_POST['phone'], $_POST['email'], 
                                $_POST['password'], $_POST['password2']);

                    extract($errArr);
                    //if all information are good=> start session
                    //save user info and go to home page for user
                    if($firstNameErr == 'good' && $lastNameErr == 'good' &&
                       $phoneErr == 'good' && $emailErr == 'good' && 
                       $passwordErr == 'good' && $password2Err == 'good') {

                         $result =    addCustomer($_POST['firstname'], $_POST['lastname'],
                                        $_POST['phone'], $_POST['email'], 
                                        $_POST['password']);
                            session_start();
                            $_SESSION['phone'] = $_POST['phone'];
                           
                        if($result) {
                            header("Location: index.php?controller=user&action=home_page");
                        }
                        
                    }
                    else {
                     
                        $this->render('View/html/UI_guest/signup', $errArr);

                    }
                    //    if have error, go back to signup page and display warning

                    $this->render('View/html/UI_guest/signup', $errArr);

            }
            else {
           
                $errArr = array('firstNameErr' => 'first',
                'lastNameErr' => 'first',
                'phoneErr' => 'first',
                'emailErr' => 'first',
                'passwordErr' => 'first',
                'password2Err' => 'first');
                $this->render('View/html/UI_guest/signup', $errArr);
            }
        }

        //display user home page
        function home_page_user() {
            //check session
            //if dont have session, display error and exit
            session_start();
            if (isset($_SESSION['phone'])) {
                include("model/customer_db.php");
                $data = array("userObj" => getCustomerByPhone($_SESSION['phone']));
                $this->render("View/html/UI_guest/home_page_user", $data);
            }
            else {
                echo "error";
                exit;
            }
        }

        function logout() {
            //logout, destroy session and go to home page for guest
          
            session_start();
            session_unset();
            session_destroy();
            header("Location: index.php?controller=guest&action=home_page");
        }

         //display profile user
        function profile(){
            session_start();
            $phone = $_SESSION['phone'];
            include_once('model/customer_db.php');
            //Lay thogn tin user de render ?? 
          
            $data = getInformationUser($phone);

            if (!empty($_POST)) {   
            //check the user information changes

            $changes = [];
            $user = $data['user'];
            $data['errors'] = [];
            foreach($_POST as $key => $value) {
                if(isset($_POST[$key])) {
                    if (empty($_POST[$key])) {
                        $data['errors'][$key]= 'emptyfield';
                    
                    }
                    else {
                        if (trim($value) != trim($_POST[$key])) {
                            $changes[$key] =$_POST[$key];
                        }
                    }
                   
                }

            }

            if (!empty($changes)) {
                extract($changes);
                // Validate input
                $phone_regex ="/^[0-9]{10}+$/";
                $email_regex = "";
                if (isset($phone) &&!preg_match($phone_regex, $phone)) {
                    $data['errors'][$phone]= 'invalidphone';
                }
                else if (isset($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $data['errors'][$email]= 'invalidemail';
                }
                else if (isset($password) && !password_verify($password, $data['user']['password'])) {
                    $data['errors']['password']= 'unmatchpassword';

                }
             


            }
            echo '<pre/>';
            print_r($_POST);

            echo '<pre/>';
            }
            $this->render('View/html/UI_guest/profile', $data);
            
        }


        function error() {
            $this->render('View/html/errors/404');


        }

        function login_manager() {
            $this->render("View\html\UI_guest\login_manager");
        }

    }
?>