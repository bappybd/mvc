<?php
class Bootstrap{
   
   public function __construct(){
   
   }
   
   public function run(){
      if(isset($_GET['load'])){
         $params = explode('/', $_GET['load']);
         $controller = ucfirst(strtolower($params[0]));
         $controller .= 'Controller';
         
         $action = strtolower($params[1]);
      }
      
      $controller = new $controller($controller, $action);
      $controller->$action();
   }
}