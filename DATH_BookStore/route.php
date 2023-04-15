<?php
    //list of controllers and action
    $controllers = array('guest' => ['home_page', 'login', 'signup', 'login_manager', 'profile'],
                         'user' => ['home_page', 'logout', 'profile_user'],
                         'manager' => ['home_page_manager', 'employee_table','login','logout','add_employee','delete_employee','update_employee'],
                         'employee');
    //if controller or action not in above list, go to error page
    if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
        $controller = 'user';
        $action = 'error';
    }
    //execute action
    include_once('control/' . $controller . '_controller.php');
    $klass = $controller . 'Controller';
    $controller = new $klass;
    $controller->$action();
?>