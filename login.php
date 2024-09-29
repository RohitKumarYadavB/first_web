<?php
include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, $_POST['password']);

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){

      $row = mysqli_fetch_assoc($select_users);

      if($row['user_type'] == 'admin')
      {
         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');
      }
      elseif($row['user_type'] == 'user')
      {
         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:home.php');
      }

   }
   else
   {
    echo "<script>alert('incorrect email or password!')</script>";
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/stylenew.css?v=<?php echo time(); ?>">

</head>


<body>
    <div class="container-login100">
        <div class="wrap-login100 p-t-50 p-b-90 p-l-50 p-r-50">
            <form class="login100-form flex-sb flex-w" action="" method="post">
                <h2>LOGIN NOW!</h2>
                <span class="login100-form-title">
                    <a href="" target="_blank">
                        <i class="fas fa-user"></i>
                    </a>
                </span>
                <div class="wrap-input100 m-b-16">
                    <input class="input100" type="email" name="email" placeholder="enter your email" required>
                    <span class="focus-input100"></span>
                </div>
               
                <div class="wrap-input100 m-b-16">
                    <input class="input100" name="password" type="password" placeholder="enter your password" required off>
                    <span class="focus-input100"></span>
                </div>
              
                <div class="container-login100-form-btn m-t-17">
                    <div class="w-full beforeNone text-center">
                        <input type="submit" class="nv-login-submit login100-form-btn" name="submit">
                    </div>
                </div>
                <div class="container-login100-form-btn m-t-17">
                    <a href="#">Forget Password?</a>
                    
                </div>
                <div class="container-login100-form-btn m-t-17">
                    
                <p>don't have an account? <a href="register.php">register now</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>