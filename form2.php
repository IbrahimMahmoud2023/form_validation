
<?php 
if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email= $_POST['email'];
    $website = $_POST['website'];
    $comment = $_POST['comment'];



//validate name
$arr = ["male", "femlae"];
    $errors = [];


if (!preg_match("/^[a-zA-Z\s]+$/",$name)){
        $errors['name'] = "only letter and white space allowed";
}
 //valid email 
 if(empty($email)){
        $errors['email'] = "the email address is not correct";
 }

//valid url 
if(empty($website)){
    $errors['website'] = "Enter a valid  URL website";
}

 // valid gender
 if (isset($_POST['gender'])) {
    $gender = $_POST['gender'];
    if (!in_array($gender, $arr)) {
        $errors['gender'] = " gender not correct";
    }
    }else {
        $errors['gender'] = "please select a gender";
    }



}

?>







<!DOCTYPE html>
<html lang="en">
    <style>
.red-message {
color: red;
position: absolute;
font-size: x-large;
}
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    
<div class="container w-50 ">
    <div><span class="red-message"> *required</span></div><br>
    <form action="" method="post"><br>
        <label >FullName</label>
    <input type="text" class="form-control" name=" name" placeholder="Enter FullName">
    <span class="text-danger">
            <?php 
            if(isset($errors['name'])){
                echo $errors['name'];
            }
             ?>
           </span>
    <br>
    
    <label >E_mail_address</label>
    <input type="email" class="form-control"  name="email" placeholder="Ente Email address">
    <span class="text-danger">
            <?php 
            if(isset($errors['email'])){
                echo $errors['email'];
            }
             ?>
           </span>
    <br>
    <label >website</label>
    <input type="url" class="form-control"  name="website" placeholder="Enter URL">
    <span class="text-danger" >
            <?php 
            if(isset($errors['website'])){
                echo $errors['website'];
            }
             ?>
           </span>
    
    <br>
    <label > comment</label>
    <textarea  name="comment" rows="4" cols="50">
     </textarea><br>
     <label>Gender:</label>
    <label >Male</label>
  <input type="radio" name="gender"  value="male" >
  <label >Female</label>
  <input type="radio" name="gender"  value="female">
  
  <span class="text-danger">
            <?php 
            if (isset($errors['gender'])) {
                echo $errors['gender'];
            }
            ?>
        </span>
  <br>
 
           
     <button type="submit" name="submit">submit</button><br>

     <h5>Final Output</h5>

     <?php  if(isset($name)) echo $name ?> <br>
     <?php  if(isset($email)) echo $email ?><br>
     <?php  if(isset($website)) echo $website ?><br>
     <?php  if(isset($comment)) echo $comment ?><br>
     


    </form>
    </div>
    
</body>
</html>