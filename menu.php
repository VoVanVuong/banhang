<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
<?php    session_start();?>
<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-white">Menu</a>
    <a href="dsdanhmuc.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Danh muc</a>
    <a href="dshanghoa.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Ds mat hang</a>
    <a href="themdanhmuc.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Them danh muc</a>
    <a href="themhanghoa.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Them hang hoa</a>
    <a href="xemsokhachhang.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Xem số khách hàng</a>
  
    <!-- <a href="chitietsanpham.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">binhluan</a> -->
    <!-- <a href="xoabinhluan.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">xoabinhluan</a>
    <a href="xulybinhluan.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Xulibinhluan</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-white w3-right"><?php  echo $_SESSION['username']; ?></a>
     -->
  </div>

  <!-- Navbar on small screens -->
 
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="dsdanhmuc.php" class="w3-bar-item w3-button w3-padding-large">Danh muc</a>
    <a href="dshanghoa.php" class="w3-bar-item w3-button w3-padding-large">Ds mat hang</a>
    <a href="themdanhmuc.php" class="w3-bar-item w3-button w3-padding-large">Them danh muc</a>
    <a href="themhanghoa.php" class="w3-bar-item w3-button w3-padding-large">Thêm hàng hóa</a>
    <a href="xemsokhachhang.php" class="w3-bar-item w3-button w3-padding-large">Xem người mua hàng</a>
    
  </div>
</div>

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html>

Menu: <a href="#">Trang chu</a>
<a href="dsdanhmuc.php">Danh muc</a>
<a href="dshanghoa.php">Ds mat hang</a>
<a href="themdanhmuc.php">Them danh muc</a>
<a href="themhanghoa.php">Thêm hàng hóa</a>
<a href="xemsokhachhang.php">Xem người mua hàng</a>