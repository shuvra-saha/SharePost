<?php
/**
 * Created by PhpStorm.
 * User: Saha
 * Date: 2/14/2018
 * Time: 6:02 PM
 */

class Bootstrap
{
    private $controller;
    private $request;
    private $action;

    /**
     * Bootstrap constructor.
     * @param $request
     */
    public function __construct($request){
        $this->request = $request;
        //echo count($request);
        //echo $this->request['controller'];
        if($this->request['controller'] == ""){//jeta .htaccess file a bola ase sei 'controller' and 'action' case
            $this->controller = 'home';
        }else{
            $this->controller = $this->request['controller'];
        }

        if($this->request['action'] == ""){
            $this->action = 'index';
            //echo "here1";
        }else{
            $this->action = $this->request['action'];
            // echo "here12";
        }
        // echo $this->action;

    }

    /**
     *
     */
    public function createController(){
        //checkk class
       // echo "hello1<br>";
        if(class_exists($this->controller)){
            //print_r($this->controller);

            $parents = class_parents($this->controller);

            //print_r($parents);

            if(in_array("Controller",$parents)){
             //   echo "hello2<br>";
                if(method_exists($this->controller,$this->action)){
                   // echo "hello3<br>";
                  // echo $this->controller."<br>".$this->action;
                    return new $this->controller($this->action,$this->request);
                }else{
                    echo "<h1>Method does not exists</h1>";
                    return;
                }
            }else{
                echo "<h1>Base controller does not exists</h1>";
                return;
            }
        }else{
            echo "<h1>Controller class does not exists</h1>";
            return;
        }
    }
}