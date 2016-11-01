<?php
class View{
   
   const VIEW_DIR  = 'views';

   protected $_file;
   protected $_view;
   protected $_data = array();
   
   public function __construct($view, $data = array()){
      $this->_view = $view;
	  $this->_file = $this->getViewFilePath($view);	  
	  $this->_data = $data;
   }
   
   public function getViewFilePath($view){
      $this->_file = HOME . DS . self::VIEW_DIR . DS . $view . ".php";
	  return $this->_file;
   }
   
   public function output(){
      if(file_exists($this->_file)){	     
		 extract($this->_data);		 
		 ob_start();
		 include($this->_file);
		 $output = ob_get_contents();
		 ob_end_clean();
		 echo $output;
	  }else{
	     throw new Exception("Template '{$this->_file}' doesn't exist.");
	  }
   }
}