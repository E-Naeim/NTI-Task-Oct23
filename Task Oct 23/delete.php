<?php

require 'validator.php';
require 'BlogClass.php';
$id = $_GET['id'];
 $validate = new validator;
 if(!$validate->validate($id,5)){
    
        
       $blog = new  blog();

       $reuslt = $blog->delete($id);

       if($reuslt){
        header("Location:display.php");
       }else{
           echo 'error try again';
       }
  
    }      

    
  
?>