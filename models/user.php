<?php
/**
 * Created by PhpStorm.
 * User: bsse0
 * Date: 2/15/2018
 * Time: 6:29 PM
 */
class UserModel extends Model {
    public function register(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

        $password = md5($post['password']);

        if($post['submit']){
            if($post['name'] == '' || $post['email'] == '' || $post['password'] == ''){
                Messages::setMessage('Please enter all information','error');
                return;
            }

            //die("sub");
            $this->query('insert into users(name,email,password) values (:name, :email, :password)');

            $this->bind(":name",$post['name']);
            $this->bind(":email",$post['email']);
            $this->bind(":password",$password);
          //  $this->bind(":user_id",1);

            $this->execute();

           // echo "Registration Complete";

            if($this->lastInsertId()){
                header('Location: '.ROOT_URL.'user/login');
            }
        }
        return;
    }

    public function login(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

        $password = md5($post['password']);

        if($post['submit']){
            //die("sub");
            $this->query("select * from users where email = :email and password = :password");


            $this->bind(":email",$post['email']);
            $this->bind(":password",$password);
            //  $this->bind(":user_id",1);
            $row = $this->single();
            echo "hjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj";
            print_r($row);

            if($row){
               $_SESSION['is_logged_in'] = true;
               $_SESSION['user_data'] = array(
                   "id" => $row['id'],
                   "name" => $row['name'],
                   "email" => $row['email']
               );
               header('Location: '.ROOT_URL.'share');
            }else{
                Messages::setMessage('Incorrect login','error');
            }
        }
        return;
    }
}