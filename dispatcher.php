<?php

use AHT\Controllers\tasksController;

class Dispatcher
{

    private $request;

    public function dispatch()
    {
        $this->request = new Request();
        
        Router::parse($this->request->url, $this->request);
        
        $controller = $this->loadController();

        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        $name = $this->request->controller . "Controller";
        $file = ROOT . 'app/Controllers/' . $name . '.php';
        require("$file");
        //echo $file . " " . $name;
        $name1 = 'AHT\Controllers\\'.$name;
        $controller = new $name1();
        return $controller;
    }

}
?>