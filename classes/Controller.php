<?php
/**
 * Created by PhpStorm.
 * User: bsse0
 * Date: 2/15/2018
 * Time: 4:34 PM
 */

abstract class Controller{ //this should not instantiate
    protected $request;
    protected  $action;

    public function __construct($action, $request){
        $this->action = $action;
        $this->request = $request;
    }

    public function executeAction(){
        return $this->{$this->action}();
    }

    /**
     * @param $viewModel
     * @param $fullView
     */
    protected function returnView($viewmodel, $fullView){
        //echo count($viewmodel);
       // echo $viewmodel;
        //echo 'class = '.$this."<br>";
        $view = 'view/'. get_class($this). '/'. $this->action. '.php';
        if($fullView){
            require ('view/main.php');
        }else{
            require ($view);
        }
    }
}