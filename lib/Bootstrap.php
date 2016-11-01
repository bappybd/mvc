<?php
class Bootstrap{
   public $urlParams   = '';
   
   public function run(){
	  $controller  = 'home';
      $action      = 'index';	
   
      if(isset($_GET['load'])){
         
         $params = array();
         $params = explode('/', $_GET['load']);
         
         if(count($params)){
            $controller = ucfirst($params[0]);
            
            if(isset($params[1]) && !empty($params[1])){
               $action = $params[1];
            }
         }
      }
      
      $controller .= 'Controller';
      $load = new $controller($controller, $action);
      
      if(method_exists($load, $action)){
         $load->$action();
      }
   }
}