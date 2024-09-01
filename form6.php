<?php
session_start();

if (isset($_POST['submit'])) {
    $user_name = trim($_POST['name']);
    $password = trim($_POST['password']);

    $user_data = [
        'user_name' => $user_name,
        'password' => $password,
    ];


    if (!empty($user_name) && !empty($password)) {
        $_SESSION['message'] = 'Great! Your Are Found'; 
       
    } else {
        $_SESSION['message'] = 'Not Found'; 
    }

    
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
    <br>
    <div class="container w-50 ">
    <?php
        if (isset($_SESSION['message'])) {
            echo "<div class='alert alert-info'>" . $_SESSION['message'] . "</div>";

            if (!empty($_SESSION['user_data'])) {
    
            }
            unset($_SESSION['message']);
        }
        ?>
        <form action="" method="post">
            <input type="text" name="name" id="" placeholder="User Name" class="form-control mb-2"><br>
            <input type="password" name="password" id="" placeholder="Password" class="form-control mb-2"><br>
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
