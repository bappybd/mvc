<?php
class Controller{
   
   public $controller;
   public $action;
   public $_db;
   
   public function __construct($classname, $action){
      $this->controller = $classname;
      $this->action = $action;
   }
   
   public function render($viewName, $data = array()){
      $view = new View($viewName, $data);
      $view->output();
   }
   
   public function db(){
       $this->_db = DbPdo::init();
       
       return $this->_db;
   }
}