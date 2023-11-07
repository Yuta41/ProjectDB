<?php include('server.php'); 

session_start();
if (!isset($_SESSION['username'])) {
  // ถ้าผู้ใช้ไม่ได้เข้าสู่ระบบ
  header("Location: login.php"); // ส่งผู้ใช้ไปยังหน้าเข้าสู่ระบบ
  exit(); // จบการทำงานของ script
}



if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header('location: login.php');
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>success</title>

  <link rel="stylesheet" href="style.css">
</head>
<body>
    
   <div class ="header">
    <h2>success</h2>
   </div>
   

   <form action="login_db.php" method="post">
   <label for="username">Thank you for reservation</label>
         
       
   <!== logged in user information ==>
      <?php if (isset($_SESSION['username'])): ?>
         <p>Account: <strong><?php echo $_SESSION['username']; ?></strong></p>
         <p><a href="index.php?logout='1'" stlye="color: red;">Logout</a></p>
      <?php endif ?>
     </div>

   </form>
</body>
</html>