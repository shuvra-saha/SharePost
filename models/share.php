<?php
/**
 * Created by PhpStorm.
 * User: bsse0
 * Date: 2/15/2018
 * Time: 6:28 PM
 */
class ShareModel extends Model {
    public function index(){
        //echo 'buhina';
        $this->query('SELECT * FROM share');
        $rows = $this->resultset();
        //print_r($rows);
        return $rows;
    }

    /**
     *
     */
    public function add(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if($post['submit']){
            if($post['title'] == '' || $post['body'] == '' || $post['link'] == ''){
                Messages::setMessage('Please enter all information','error');
                return;
            }


            //print_r($_SESSION['user_data']['id']);
            $user_id = $_SESSION['user_data']['id'];

            $this->query('insert into share(title,body,link,user_id) values (:title, :body, :link, :user_id)');

            $this->bind(":title",$post['title']);
            $this->bind(":body",$post['body']);
            $this->bind(":link",$post['link']);
            $this->bind(":user_id",$user_id);

            $this->execute();

            if($this->lastInsertId()){
                header('Location: '.ROOT_URL.'share');
            }
        }
        return;
    }
}