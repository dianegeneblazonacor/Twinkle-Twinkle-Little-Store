<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

 
  <link rel="stylesheet" href="s2.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.min.css">

</head>
<body>

<div class="form-container">

   <form method="post" action="<?php htmlspecialchars("PHP_SELF");?>" >
      <h1>SIGN IN MANAGER</h1> 
      <label>Username</label>
      <input type="username" name="username" required placeholder="">
      <label>Password</label>
      <input type="password" name="pword" required placeholder="">
      <button type="submit" name="submit" class="form-btn"> Sign-in </button>

      

<?php

include "config.php";

session_start();
if (isset($_POST['submit'])) {

      $username = $_POST['username'];
      $pword = $_POST['pword'];
      $sql = "SELECT * FROM products WHERE username = '$username' and pword = '$pword'";
      $result = $conn->query($sql);
  

      if ($username == 'admin' && $pword == 'pass') {
         $_SESSION['username'] = $username;
        header('location: admin_page.php');
      } else if ($result->num_rows > 0) {
         $_SESSION['username'] = $username;
        header('location: user_page.php');
      } else {
      echo "Invalid username or password!";
    }
 }
?>
       
   </form>

</div>

</body>
</html>