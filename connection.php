<?php
class connexion{
    protected  $idcom;
   static function connexpdo($base)
   {
   try
   {
    $dsn="mysql:host=localhost;dbname=$base"; 
   $user="root";
   $idcom = new PDO($dsn,$user); 
   return $idcom;
   }
   catch(PDOException $except) 
   {
     echo"Échec de la connexion",$except->getMessage(); 
     return FALSE;
     exit();
     }
     }
   }
?>