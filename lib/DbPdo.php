<?php
class DbPdo{
   public static $_conn;
   
   public static function init(){
      try{
         if(!self::$_conn){
            $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';';
            self::$_conn = new Pdo($dsn, DB_USER, DB_PASS);
            self::$_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$_conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
            return self::$_conn;
         }
      }catch(PDOException $e){
         die('Unable to connect to database: '.$e->getMessage());
      }
   }
}