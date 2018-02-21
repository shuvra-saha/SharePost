<?php
/**
 * Created by PhpStorm.
 * User: bsse0
 * Date: 2/15/2018
 * Time: 4:58 PM
 */
class User extends Controller{
    protected function register(){
        $viewmodel= new UserModel();
        //$this->returnView($viewmodel->register(),true);
        $this->returnView($viewmodel->register(),true);
    }

    protected function login(){
        $viewmodel= new UserModel();
        //$this->returnView($viewmodel->register(),true);
        $this->returnView($viewmodel->login(),true);
    }

    protected function logout(){
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_data']);
        session_destroy();

        header('Location: '.ROOT_URL);
    }
}