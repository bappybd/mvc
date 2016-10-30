<?php
class HomeController extends Controller{
   
   public function index(){
      
      $conn = $this->db();
      $stmt = $conn->prepare('select * from post');
      $stmt->execute();
      
      $posts = $stmt->fetchAll();
echo "<pre>";print_r($posts);exit;      
      $this->render('index');
      
   }
}