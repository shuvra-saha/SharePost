<?php
/**
 * Created by PhpStorm.
 * User: bsse0
 * Date: 2/15/2018
 * Time: 4:58 PM
 */
class Share extends Controller{
    protected function index(){
        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->index(),true);

    }
    protected function add(){
        if(!isset($_SESSION['is_logged_in'])){
            header('Location: '.ROOT_URL.'share');
        }

        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->add(),true);

    }
}