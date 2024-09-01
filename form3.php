
<?php
session_start();

if(isset($_POST['submit'])){

    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $zip_code = $_POST['zip_code'];
    $email= $_POST['email'];
    $about = $_POST['about'];

//valid user id  
$arr = ["male", "female"];
$arr2 = ["English", "Non English"];
$errors = [];
if (empty($user_id) || strlen($user_id) < 5 || strlen($user_id) > 12) {
    $errors['user_id'] = "Required and must be of the length 5 to 12";
  }

  //valid password 


if (empty($password) || strlen($password) < 7 || strlen($password) > 12) {
    $errors['password'] = "Required and must be of the length 7 to 12";
  }
  
  //valid name 


  if(empty($name) || !ctype_alpha($name)){
    $errors['name'] = "required and alphabtes only";
  }

  // valid zip code 
  
  if(empty($zip_code) || !is_numeric($zip_code)){

    $errors['zip_code'] = "required. must be numeric only ";
  }

  // valid email 

  if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors['email'] = "Required. Must be a valid email";

  }

  // valid Gender
  if (isset($_POST['gender'])) {
    $gender = $_POST['gender'];
    if (!in_array($gender, $arr)) {
        $errors['gender'] = " gender not correct";
    }
    }else {
        $errors['gender'] = "Required";
    }
    // valid Language


    
    if (isset($_POST['language']) && !empty($_POST['language'])) {
        $language = $_POST['language'];
            if (!in_array($language, $arr2)) {
                $errors['language'] = "Language not correct";
              
        }
    } else {
        $errors['language'] = "Required";
    }

    //valid country 

    if (isset($_POST['submit'])) {
        if (isset($_POST['country']) && !empty($_POST['country'])) {
            $country = $_POST['country'];
           
        } else {
      
             $errors['country'] = "Required. Must select a country";
            
        }
    }
    
    

    //valid address 

    if(empty($address)){
        $errors['address'] = "optional ";
    }


if(empty($errors)){
    echo "<h2>display Data:</h2>";
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<tr><th>Field</th><th>Value</th></tr>";
    echo "<tr><td>User ID</td><td>$user_id</td></tr>";
    echo "<tr><td>Password</td><td>$password</td></tr>";
    echo "<tr><td>Name</td><td>$name</td></tr>";
    echo "<tr><td>Address</td><td>$address</td></tr>";
    echo "<tr><td>Country</td><td>$country</td></tr>";
    echo "<tr><td>Zip Code</td><td>$zip_code</td></tr>";
    echo "<tr><td>Email</td><td>$email</td></tr>";
    echo "<tr><td>About</td><td>$about</td></tr>";
    echo "<tr><td>Gender</td><td>$gender</td></tr>";
    echo "<tr><td>Language</td><td>$language</td></tr>";
    echo "</table>";


}
   
    //valid about 

}

?>


<!DOCTYPE html>
<html lang="en">
    <style>
.error {
    color: red;
    font-size: 14px;
    display: block; 
}
</style>
<head>
    <meta charset="UTF-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="container w-50 "><br>
    <form action="" method="post">
<h2>Registration Form</h2>
<label for="">User id: </label>
<input type="text" name="user_id" id="">

<span class="text-danger">
            <?php 
            if(isset($errors['user_id'])){
                echo $errors['user_id'];
            }
             ?>
           </span>

<br>
<label for="">Password: </label>
<input type="text" name="password" id="">
<span class="text-danger">
            <?php 
            if(isset($errors['password'])){
                echo $errors['password'];
            }
             ?>
           </span>
<br>
<label for="">Name: </label>
<input type="text" name="name" id="">
<span class="text-danger">
            <?php 
            if(isset($errors['name'])){
                echo $errors['name'];
            }
             ?>
           </span>
           <br>
<label for="">Address: </label>
<input type="text" name="address" id="">
<span class="text-danger">
            <?php 
            if(isset($errors['address'])){
                echo $errors['address'];
            }
             ?>
           </span>

<br>

<label for="country">Country: </label>
<select name="country" id="country" >
  <option value=""  selected >(Please select country)</option>
  <option value="Egypt">Egypt</option>
  <option value="USA">USA</option>
  <option value="France">France</option>

</select>
<span class="text-danger">
        <?php 
        if (isset($errors['country'])) {
            echo $errors['country'];
        }
        ?>
    </span>

<br>
<label for="">Zip Code: </label>
<input type="text" name="zip_code" id="">
<span class="text-danger">
            <?php 
            if(isset($errors['zip_code'])){
                echo $errors['zip_code'];
            }
             ?>
           </span>
<br>
<label for="">Email: </label>
<input type="text" name="email" id="">
<span class="text-danger">
            <?php 
            if(isset($errors['email'])){
                echo $errors['email'];
            }
             ?>
           </span>

<br>
<label>Sex:</label>
    <label >Male</label>
  <input type="radio" name="gender"  value="male" >
  
  <label >Female</label>
  <input type="radio" name="gender"  value="female">
  <span class="text-danger">
            <?php 
            if(isset($errors['gender'])){
                echo $errors['gender'];
            }
             ?>
           </span>
  <br>
    <label >Language :</label>
<label >English</label>
  <input type="checkbox" name="language" value="English"  >
  <label >Non English</label>
  <input type="checkbox" name="language" value="Non English"  >
  <span class="text-danger">
        <?php 
        if (isset($errors['language'])) {
            echo $errors['language'];
        }
        ?>
    </span>
  <br>
  <label >About</label>
  <textarea  name="about" rows="4" cols="50">  
  </textarea><br>
  <button type="submit" name="submit"> Submit</button>

    </form>
    </div>
</body>
</html>

?>