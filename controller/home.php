<?php
/**
 * Created by PhpStorm.
 * User: bsse0
 * Date: 2/15/2018
 * Time: 4:58 PM
 */
class Home extends Controller{
    protected function Index(){
        //echo 'hhhh';
        $viewmodel = new HomeModel();
        $this->returnView($viewmodel->index(),true);
    }
}