<?php
session_start();

if(isset($_POST['submit'])){
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $mobile_no = $_POST['mobile_no'];
    $details = $_POST['details'];



    
    $errors = [];
    //validation fist name

    if(empty($first_name)){
        $errors['first_name'] = "please enter the name";
        
    }elseif(strlen($first_name) <5){
        $errors['first_name'] = " the name must be at least 5 character"; 
       
    }

    //valid email 

    if (empty($email)) {
        $errors['email'] = "Email address is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Please enter a valid email address";
    }

    //last last name
    if(empty($last_name)){
        $errors['last_name'] = "the last name is required";
    }

    //valid mobile no 

    if(!is_numeric($mobile_no)){
        $errors['mobile_no'] = "the mobile must be number";

    }

    //valild password 

    if(empty($password)){
        $errors['password'] = "the password is required";
    }
    //valild confim_password 

    if(empty($confirm_password)){
        $errors['confirm_password'] = "the confirm_password is required";
    }

    // valid confirm_email

    if(empty($details)){
        $errors['details'] = "the details filed is required";
    }



    if(!empty($errors)){
        $_SESSION["errors"] = $errors;

         $_SESSION["first_name"] = $first_name;
         $_SESSION["last_name"] = $last_name;
         $_SESSION["email"] = $email;
         $_SESSION["password"] = $password;
         $_SESSION["confirm_password"] = $confirm_password;
         $_SESSION["mobile_no"] = $mobile_no;
         $_SESSION["details"] = $details;

    }
    
}else{

}




?>

<?php
if (isset($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $error) {
        echo "<div class='alert alert-danger'>$error</div>";
    }
    unset($_SESSION['errors']);
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container w-50">
       <h3>Form Validation</h3>
    <form action="" method="post" >
    <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="firstName" value="<?php if(!empty($_SESSION['first_name'])) echo $_SESSION['first_name']; unset($_SESSION['first_name'])  ?>" name="first_name" placeholder="Enter firstName">
            <span class="text-danger">
                <?php if(!empty($errors['first_name'])) echo $errors['first_name'] ?>
           
           </span>
        </div>
        <div class="form-group">
            <label for="lastName">Last Name</label>
            
            <input type="text" class="form-control" id="lastName" value="<?php if(!empty($_SESSION['last_name'])) echo $_SESSION['last_name']; unset($_SESSION['last_name']) ?>" name="last_name" placeholder="Enter lastName">
            <span  class="text-danger">
            <?php if(!empty($errors['last_name'])) echo $errors['last_name'] ?>
                </span>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" value="<?php if(!empty($_SESSION['email'])) echo $_SESSION['email']; unset($_SESSION['email'])  ?>" name="ُemail" placeholder="Enter Email">
                <span class="text-danger">
                <?php if(!empty($errors['email'])) echo $errors['email'] ?>
               </span>
            </div>

            <div class="form-group">
            <label for="Mobile No">Mobile No</label>
            <input type="text" class="form-control" id="Mobile No "value="<?php if(!empty($_SESSION['mobile_no'])) echo $_SESSION['mobile_no']; unset($_SESSION['mobile_no'])  ?>"  name="mobile_no" placeholder="Enter Mobile No">
            <span class="text-danger">
            <?php if(!empty($errors['mobile_no'])) echo $errors['mobile_no'] ?>
           </span>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" value="<?php if(!empty($_SESSION['password'])) echo $_SESSION['password']; unset($_SESSION['password'])  ?>" name="password" placeholder="Enter password">
            <span  class="text-danger">
            <?php if(!empty($errors['password'])) echo $errors['password'] ?>
           </span>
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" class="form-control" id="confirmPassword" value="<?php if(!empty($_SESSION['confirm_password'])) echo $_SESSION['confirm_password']; unset($_SESSION['confirm_password'])  ?>" name="confirm_password" placeholder="Enter confirm Password">
            <span class="text-danger">
            <?php if(!empty($errors['confirm_password'])) echo $errors['confirm_password'] ?>
           </span>
        </div>
        <div class="form-group">
            <label >Details</label>
            <textarea type="text"  name="details"  rows="4" cols="50" placeholder="Enter Detials"><?php echo isset($_SESSION['details']) ? $_SESSION['details'] : ''; ?></textarea><br>
            <span class="text-danger">
            <?php if(!empty($errors['details'])) echo $errors['details'] ?>
           </span>
        </div>
            
   <button type="submit" name ="submit"> submit</button> 
   
    </form>
    </div>
</body>
</html>