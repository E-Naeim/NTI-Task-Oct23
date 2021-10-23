<?php
 require 'validator.php';
 require 'BlogClass.php';
 $id = $_GET['id'];
 $validate = new validator;
 if (!$validate->validate($id, 5)) {
     if ($_SERVER['REQUEST_METHOD'] == "POST") {

        # Create Validator Obj ..
     
         $validate = new validator;
     
         $title      =  $validate->clean($_POST['title']);
         $content   =  $validate->clean($_POST['content']);
      
         $ImageTmp   =  $_FILES['image']['tmp_name'];
         $ImageName  =  $_FILES['image']['name'];
         $ImageSize  =  $_FILES['image']['size'];
         $ImageType  =  $_FILES['image']['type'];
      
     
         $TypeArray = explode('/', $ImageType);
     
         $errors = [];
     
         if (!$validate->validate($title, 1)) {
             $errors['title'] = "Field Required";
         }
     
         
         if (!$validate->validate($content, 1)) {
             $errors['content'] = "Field Required";
         } elseif (!$validate->validate($content, 3)) {
             $errors['content'] = "content Length Must >= 50ch";
         }
     
         if (!$validate->validate($ImageName, 1)) {
             $errors['image'] = "Image Field Required";
         } elseif (!$validate->validate($TypeArray[1], 6)) {
             $errors['image'] = "Invalid Extension";
         }
         $FinalName = rand(1, 100).time().'.'.$TypeArray[1];
      
         $disPath = './uploads/'.$FinalName;
      
         if (move_uploaded_file($ImageTmp, $disPath)) {
             $blog = new  blog();
     
             $reuslt = $blog->edit($title, $content, $FinalName);
     
             if ($reuslt) {
                 header("Location:display.php");
             } else {
                 echo 'error try again';
             }
         }
         if (count($errors) > 0) {
             foreach ($errors as $key => $val) {
                 echo '* '.$key.' :  '.$val.'<br>';
             }
         }
     }
 }
    
          

     



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Blog</h2>
        <form
            action="edit.php? id=<?php echo $reuslt['id'];?>"
            method="post" enctype="multipart/form-data">



            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputName" aria-describedby="">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">Content</label>
                <input type="text" name="content" class="form-control" id="exampleInputEmail1" aria-describedby="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <input type="file" name="image">
            </div>



            <button type="submit" class="btn btn-primary">Upload</button>



            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>