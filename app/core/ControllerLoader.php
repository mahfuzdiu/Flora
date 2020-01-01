<?php
/**
 * Created by PhpStorm.
 * User: Mahfuz
 * Date: 1/1/2020
 * Time: 10:51 AM
 */

namespace app\core;


class ControllerLoader
{
    public function __construct()
    {

    }

    public function loadController($controller, $method)
    {
        $classWithNamespace= 'app\controller\\' . $controller;

        //checking if the class exists in the declared namespace
        if(class_exists($classWithNamespace)){

            $class = new \ReflectionClass($classWithNamespace);

            if($class->hasMethod($method) && !$class->getMethod($method)->isStatic()){
                $load = new $classWithNamespace;
                $load->$method();

            }elseif ($class->hasMethod($method) && $class->getMethod($method)->isStatic())
            {
                $classWithNamespace::$method();
            }else{
                echo 'method doesn\'t exists';
            }

        }else
            echo 'class doesn\'t exists';


    }

}