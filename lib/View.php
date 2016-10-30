<?php
class View{
   public $_view;
   public $_viewPath;
   
   public $_data;

   public function __construct($viewName, $data = array()){
      $this->_view = $viewName;
      $this->_data = $data;
   }
   
   public function output(){
      if(file_exists(HOME. DS . VIEWDIR . DS . $this->_view . '.php')){
         ob_start();
         extract($this->_data);
         require_once(HOME. DS . VIEWDIR . DS . $this->_view . '.php');
         $output = ob_get_contents();
         ob_end_clean();
         
         echo $output;
      }else{
         throw new Exception('View file '.$this->_view.' not found');
      }
   }
}