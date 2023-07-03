<?php 
session_start();
?>
<?php include('connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ลงชื่อเข้าใช้ห้องเครื่องมือแพทย์</title>
  </head>

  <body>
    <div class="login_container">
      <form action="login_check.php" method="post">
        
        <h1 class="login_head">login</h1>
    
        <input
        type="text" name="username_login" id="username_login" class="form-control"  minlength="3" placeholder="ชื่อผู้ใช้(username)"
        /> <br> <br>

        <input
        type="text" name="password_login" id="password_login" class="form-control"  minlength="3" placeholder="รหัสผ่าน"
       /> <br> <br>


      <?php 
      if(isset($_SESSION["Error"])){
        echo $_SESSION["Error"];
      }    
      ?>



      <button name="login_btn" class="login_btn" type="submit" >เข้าสู่ระบบ</button>
      </form>
      <a href="register.php"> <button>ลงชื่อเข้าใช้</button></a>
    </div>
  </body>
</html>
