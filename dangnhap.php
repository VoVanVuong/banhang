<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=".style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
    <script>
    $('.toggle').click(function(){

$(this).children('i').toggleClass('fa-pencil');

$('.form').animate({
  height: "toggle",
  'padding-top': 'toggle',
  'padding-bottom': 'toggle',
  opacity: 'toggle'
}, 'slow');
});
    </script>
   <style>
        <!-- Form Module-->
body {
  background: #e9e9e9;
  color: #666;
  font-family: 'RobotoDraft', 'Roboto', sans-serif;
  font-size: 14px;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
 
 
/* Form Module */
.form-module {
  position: relative;
  background: #fff;
  max-width: 320px;
  width: 100%;
  border-top: 5px solid #33b5e5;
  box-shadow: 0 0 3px rgba(0, 0, 0, .1);
  margin: 0 auto;
}

.form-module .toggle {
  cursor: pointer;
  position: absolute;
  top: 0;
  right: 0;
  background: #33b5e5;
  width: 30px;
  height: 30px;
  margin: -5px 0 0;
  color: #fff;
  font-size: 12px;
  line-height: 30px;
  text-align: center;
}

.form-module .toggle .tooltip {
  position: absolute;
  top: 5px;
  right: -65px;
  display: block;
  background: rgba(0, 0, 0, .6);
  width: auto;
  padding: 5px;
  font-size: 10px;
  line-height: 1;
  text-transform: uppercase;
}

.form-module .toggle .tooltip:before {
  content: '';
  position: absolute;
  top: 5px;
  left: -5px;
  display: block;
  border-top: 5px solid transparent;
  border-bottom: 5px solid transparent;
  border-right: 5px solid rgba(0, 0, 0, .6);
}

.form-module .form {
  display: none;
  padding: 40px;
}

.form-module .form:nth-child(2) {
  display: block;
}

.form-module h2 {
  margin: 0 0 20px;
  color: #33b5e5;
  font-size: 18px;
  font-weight: 400;
  line-height: 1;
}

.form-module input {
  outline: none;
  display: block;
  width: 100%;
  border: 1px solid #d9d9d9;
  margin: 0 0 20px;
  padding: 10px 15px;
  box-sizing: border-box;
  font-wieght: 400;
  -webkit-transition: .3s ease;
  transition: .3s ease;
}

.form-module input:focus {
  border: 1px solid #33b5e5;
  color: #333;
}

.form-module #submit {
  cursor: pointer;
  background: #33b5e5;
  width: 100%;
  border: 0;
  padding: 10px 15px;
  color: #fff;
  -webkit-transition: .3s ease;
  transition: .3s ease;
}

.form-module #submit:hover {
  background: #178ab4;
}

.form-module .cta {
  background: #f2f2f2;
  width: 100%;
  padding: 15px 40px;
  box-sizing: border-box;
  color: #666;
  font-size: 12px;
  text-align: center;
}

.form-module .cta a {
  color: #333;
  text-decoration: none;
}
    </style>
</head>
<body>
<?php
session_start(); 
$mess="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $u=$_POST["username"];
    $p=md5($_POST["password"]);
    $conn=mysqli_connect("localhost","root","","banhang");
    $sql="SELECT * FROM user WHERE username='$u' and password='$p'";
    $kq=mysqli_query($conn,$sql);
    $user=mysqli_fetch_assoc($kq);
        if($user){
            if($user['role'] == 'admin') {
                header('Location: dshanghoa.php');
            } else {
                header('Location: index.php');
            }
            $_SESSION['username']=$u;
            $_SESSION['role'] = $user['role'];
            $mess="ban da dang nhap thanh cong";
        }
    else{
      $mess ="Bạn chưa nhập hoặc sai tên đăng nhập,Mật khẩu ";
    }
}
?>
    <!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <!-- <div class="tooltip">Click Me</div> -->
  </div>
  <div class="form">
    <h2>đăng nhập vào tài khoản của bạn</h2>
    <form action="dangnhap.php" method="POST">
      <input type="text" placeholder="Username"name="username" />
      <input type="password" placeholder="Password"  name="password"/>
     <input id="submit" type="submit" value="dang nhap">
    </form>
  </div>
  <div class="form">
    <h2>Create an account</h2>
    <form action="dangnhap.php" method="POST">
      <input type="text" placeholder="Username"   />
      <input type="password" placeholder="Password" name="password"/>
      <input type="email" placeholder="Email Address"/>
      <input type="tel" placeholder="Phone Number"/>
      <button>Register</button>
    </form>
  </div>
  <div class="cta"><a href="#">Đăng kí</a></div>
  <?php 
echo $mess;
?>
</div>
</body>
</html>