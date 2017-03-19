<?php

class Controller
{
    public $db = null;
    public $layout = null;
    
    public function __construct()
    {
        //opening a DB connection and callin' init() from a controller
        $this->openDatabaseConnection();
        $this->init();
    }
    
    //this will be called in __construct()
    public function init() {}
    
    private function openDatabaseConnection()
    {
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }

    //loading the model and assigning to property (by alias if needed)
    public function loadModel($model, $alias = null)
    {
        if(file_exists(APP . 'model/'. $model .'.php')) {
            require_once APP . 'model/'. $model .'.php';
            $model_name = $model . '_model';
            $alias = ($alias) ? $alias : $model_name;
            $this->$alias = new $model_name($this->db);
        } else {
            throw new Exception("Can't load {$model} model");
        }
    }
    
    //loading the view
    public function loadView($view, $data = null)
    {
        if(file_exists(APP . 'view/'. $view .'.php')) {
            $view = new View(APP . 'view/'. $view .'.php');
            return $view;
        } else {
            throw new Exception("Can't load view file named {$view}");
        }
    }
    
    //assigning a non-existing properties
    public function __set($prop, $val) {
        return $this->{$prop} = $val;
    }
}
