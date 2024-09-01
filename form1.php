<?php

if (isset($_POST['register'])) {


    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    //validation of form 

    $errors = [];
    // first name
    if (!empty($first_name)) {
        if (!ctype_alpha($first_name)) {
            $errors['first_name'] = "digit are not allowd";
        }
    }
    //last name 
    if (empty($last_name)) {
        $errors['last_name'] = "last Named is required";
    }

    //email

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "invalid email address";
    }

    //password( oneleast upper ,lower later ,digit,special char with no space,minmum length 8 )

    if (!preg_match('/[A-Z]/', $password) ||
    !preg_match('/[a-z]/', $password) ||
    !preg_match('/[\W_]/', $password) ||
    strlen($password) < 8 ||
    !preg_match('/\d/', $password)) {
    $errors['password'] = "password must be at least one uppercase ,lowercase later ,digit,special character with no space,minmum length 8.";
}
    if ( empty($confirm_password )) {
        $errors['confirm_password'] = "confirm password does not match";

    }elseif($confirm_password!=$password){
        $errors="confirmed password not match";
    }
    
    
}

?>

</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    
    
<div class="container w-50 ">
    <h2 class="mb-4 text-center">Php Form Validation</h2>
    
    <form action="" method="post">
        
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter firstName">
            <span class="text-danger">
            <?php 
            if(isset($errors['first_name'])){
                echo $errors['first_name'];
            }
             ?>
           </span>
        </div>
        
        <div class="form-group">
            <label for="lastName">Last Name</label>
           
         <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter lastName">
         <span  class="text-danger">
            <?php 
            if(isset($errors['last_name'])){
                echo $errors['last_name'];
            }
             ?>
           </span>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
            <span  class="text-danger">
            <?php 
            if(isset($errors['email'])){
                echo $errors['email'];
            }
             ?>
           </span>
        </div>
        
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
            <span  class="text-danger">
            <?php 
            if(isset($errors['password'])){
                echo $errors['password'];
            }
             ?>
           </span>
        </div>

        
        <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirm_password" placeholder="Enter confirm Password">
            <span class="text-danger">
            <?php 
            if(isset($errors['confirm_password'])){
                echo $errors['confirm_password'];
            }
             ?>
           </span>
        </div>
        
        <button type="submit" class="btn btn-primary btn-block" name="register">Register Now</button>
    </form>
</div>
</body>
</html>
