<?php
/**
 * Created by PhpStorm.
 * User: bsse0
 * Date: 2/20/2018
 * Time: 4:01 PM
 */

class Messages
{
    public static function setMessage($text, $type){
        if($type == "error"){
            $_SESSION['errorMsg'] = $text;
        }else{
            $_SESSION['successMsg'] = $text;
        }
    }

    public static function display(){
        if(isset($_SESSION['errorMsg'])){
            echo '<div class="alert alert-danger">'.$_SESSION['errorMsg'].'</div>';
            unset($_SESSION['errorMsg']);
        }

        if(isset($_SESSION['successMsg'])){
            echo '<div class="alert alert-success">'.$_SESSION['successMsg'].'</div>';
            unset($_SESSION['successMsg']);
        }
    }
}