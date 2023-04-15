<?php
    include_once('base_controller.php');
    class userController extends baseController {

        //home page for guest (not login yet)
        function home_page() {
            $this->render('View/html/UI_user/home_page_user');
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
                   
                    header('Location: index.php?controller=user&action=home_page');
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
            echo '<h1>Flag</h1>';
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
                        echo 'Error Page';
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
                $this->render("View/html/UI_user/home_page_user", $data);
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
        function profile_user(){
            $this->render('View/html/UI_user/profile_user');
        }


        function error() {
            $this->render('View/html/errors/404');


        }
    }
?>