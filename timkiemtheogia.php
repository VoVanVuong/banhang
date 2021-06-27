<?php session_start();?>
<!DOCTYPE html>
<html>
<title>Web bán máy tính</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<body class="w3-content" style="max-width:1390px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b>ShopLaptop</b></h3>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
     <a href="timkiemtheogia.php?dongia=1" class="w3-bar-item w3-button">Sản phẩm dưới 15 Triệu</a>
    <a href="timkiemtheogia.php?dongia=2" class="w3-bar-item w3-button">Sản phẩm trên 15 Triệu</a>
    <a href="timkiemtheogia.php?dongia=3" class="w3-bar-item w3-button">Sản phẩm Trên 40 Triệu</a>
    <a href="timkiemtheogia.php?dongia=4" class="w3-bar-item w3-button">Sản phẩm Trên 80 Triệu</a>
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Hãng máy tính <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
    <a href="index.php" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Tổng số sản phẩm</a>
    
    <?php 
    $conn=mysqli_connect("localhost","root","","banhang") or die("Lỗi kết nối đến server");
    
    $sql="SELECT *FROM danhmuc";
   
  
     $ketqua=mysqli_query($conn,$sql);
     if(mysqli_num_rows($ketqua)>0){
     while($row2=mysqli_fetch_assoc($ketqua))
     {
         
        //  echo '<a href="dshanghoa.php?id='.$row2['id'].'">'.$row2['tendanhmuc'].'</a>';
         echo  '<a href="index.php?id='.$row2['id'].'" class="w3-bar-item w3-button ">'.$row2['tendanhmuc'].'</a>';
  
     }
    }
         ?>
        <!-- <a href="#" class="w3-bar-item w3-button">Dell</a>
      <a href="#" class="w3-bar-item w3-button">Asus</a>
      <a href="#" class="w3-bar-item w3-button">Macbook</a> -->
    </div>
    <!-- <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a> -->
  </div>
  <!-- <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a> 
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a> 
  <a href="#footer"  class="w3-bar-item w3-button w3-padding">Subscribe</a> -->
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">ShopLaptop</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">
<div class="topnav">

  <a class="active" href="#home"><?php echo $_SESSION['username'];?></a>
  <a href="dangnhap.php">Đăng nhập</a>
  <a href="dangki.php">Đăng kí</a>
 
  <!-- <i class="far fa-sign-in-alt" id="dong_hien" ></i>
   -->
    <a href="cart.php"> <i class="fa fa-shopping-cart w3-margin-right" id="giohang">  </i></a>
    <a href="dangki.php">Giá</a>
   
  <!-- <a href="#about">Về chúng tôi</a>
  <a href="#contact">Liên hệ</a> -->
  <form action="" method="GET">
  
  <input type="text" name="timkiem" placeholder="Tìm kiếm..."/>
     <!-- <input type="submit" value="Tìm" style="margin-right:10px"> -->
    </form>
 
  
</div>
  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <!-- <header class="w3-container w3-xlarge" >
    <p class="w3-left"></p>
    <p class="w3-right"> -->

    <script>
$(document).ready(function(){
  $("#dong_hien").click(function(){
    $("#hienthi").toggle();
  });
});

</script>

<!-- <script>
$(document).ready(function(){
  $("#timkiem").click(function(){
    $("#timkiem_in").toggle();
  });
});

</script> -->

    <!-- <i class="far fa-sign-in-alt" id="dong_hien" ></i>
    <a href="cart.php"> <i class="fa fa-shopping-cart w3-margin-right" id="giohang">  </i></a>
   
      <input type="text" id="timkiem_in" placeholder="Mời bạn nhập món đồ để tìm kiếm" >
      <i class="fa fa-search" id="timkiem" ></i>
     -->

    </p>
  </header>

  <style>

* {box-sizing: border-box;}
 
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
 
.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}
 
.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}
 
.topnav a:hover {
  background-color: #ddd;
  color: black;
}
 
.topnav a.active {
  background-color: #2196F3;
  color: white;
}
 
.topnav input[type=text] {
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  border: none;
  font-size: 17px;
}
 
@media screen and (max-width: 600px) {
  .topnav a, .topnav input[type=text] {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}

#timkiem_in{
    display: none;
    width:550px;
    /* border-radius: 5px; */
   
  }
#dong_hien {
  cursor: pointer;
}    
#giohang{
  cursor: pointer;
}
#timkiem{
  cursor: pointer;
}
#hienthi {
    background-color: #b2b2b2;
    margin-left:87%;
    display: none;
    width: 150px;
    
}
#dangnhap{
  text-decoration: none;
  
}
#dangki{
  text-decoration: none;
}
#dangnhap:hover{
  color:#ff0000;
}
#dangki:hover{
  color:#ff0000;
}
#bogachchan{
  text-decoration: none;
}
</style>
<div id="hienthi">
  <a href="dangnhap.php" id="dangnhap">Đăng nhập</a><hr>

  <a href="dangki.php"id="dangki">Đăng kí</a>
</div>









  <!-- Image header -->
  <div class="w3-display-container w3-container">
    <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2020/9/22/637363819762175576_B2S-C1-2x.png" alt="Jeans" style="width:100%">
    <div class="w3-display-topleft w3-text-white" style="padding:24px 48px">
      <!-- <h1 class="w3-jumbo w3-hide-small">Surface Studio</h1>
      <h1 class="w3-hide-large w3-hide-medium">Surface Studio </h1>
      <h1 class="w3-hide-small">  Core i5 / RAM 8GB / SSD 1TB</h1> -->
      <!-- <p><a href="#jeans" class="w3-button w3-black w3-padding-large w3-large">BUY NOW</a></p> -->
    </div>
  </div>
  <div class="w3-container w3-text-grey" id="jeans">
    <!-- <p>8 items</p> -->
  </div>
<hr>
  <!-- Product grid -->
  <div class="w3-row w3-grayscale">
   




  <?php 
   $timkiem='';
   if(isset($_GET['timkiem']))
   
   $timkiem=$_GET['timkiem'];
    //  echo $_SESSION['username'];
     $conn=mysqli_connect("localhost","root","","banhang") or die("Lỗi kết nối đến server");

    //  xu ly phan trang trong php
    $result = mysqli_query($conn, 'select count(id) as total from hanghoa');
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
 
// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;



  // header('localhost: index.php');

  $limit=8;

//  if(empty($_GET['submitsotrang'])){
//    $limit=$_GET['hienthisosanpham'];
//  }
 
// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
// tổng số trang
$total_page = ceil($total_records / $limit);
 
// Giới hạn current_page trong khoảng 1 đến total_page
if ($current_page > $total_page){
    $current_page = $total_page;
}
else if ($current_page < 1){
    $current_page = 1;
}
 
// Tìm Start
$start = ($current_page - 1) * $limit;
/////////
 
 if(isset($_GET['id'])){
   $sql="SELECT * FROM hanghoa WHERE iddanhmuc=".$_GET['id']  ;
   $ketqua=mysqli_query($conn,$sql);
 }
 else {

     $sql="SELECT * FROM hanghoa WHERE (tenmathang like '%$timkiem%')  LIMIT $start,$limit  ";
     $ketqua=mysqli_query($conn,$sql);

      if($_GET["dongia"]==1){
   $ketqua=mysqli_query($conn,"SELECT * FROM hanghoa WHERE dongia<15 LIMIT $start,$limit");
 }

if($_GET["dongia"]==2){
  $ketqua=mysqli_query($conn,"SELECT * FROM hanghoa WHERE dongia>15 AND dongia<40 LIMIT $start,$limit");
}
if($_GET["dongia"]==3){
  $ketqua=mysqli_query($conn,"SELECT * FROM hanghoa WHERE dongia>40 AND dongia<80 LIMIT $start,$limit");
}
if($_GET["dongia"]==4){
  $ketqua=mysqli_query($conn,"SELECT * FROM hanghoa WHERE dongia>80  LIMIT $start,$limit");
}

 }

//  $i=0;
//  if (!isset($_POST["$i"]))
//  {
//      $_POST["$i"] = "k tồn tại";
//  }
//  else

 
 
     while($row = mysqli_fetch_assoc($ketqua))
     {
        
     ?>  




<!-- them -->
      <div class="w3-col l6 s12">
       <div class="w3-container">
        <div class="w3-display-container">

     <img src="./uploads/<?php echo $row['hinhanh']  ?>" alt="" style="width:500px ; height:360px"> 
  <!-- style="width:471px ; height:352px" -->


          <span class="w3-tag w3-display-topleft">New</span>
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black"><?php echo '<a  id="bogachchan" href="xemchitiettrangweb.php?id='.$row['id'].'">Xem chi tiết</a>'?> <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
      <?php  echo '<p>' .$row['tenmathang']. '<br><b>'.number_format($row['dongia'],3). '.000.VND</b></p>'?> 
       </div>
      </div>
    
    <?php } ?>
    <div>
   
</div>


  <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
 
    <div class="w3-row-padding">
    <hr>
   <form action="" method="POST">
     <input type="text" name="hienthisosanpham">
     <input type="submit" name="submitsotrang" value="chọn số sản phẩm trên trang">
     </form>
    <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="index.php?page='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="index.php?page='.$i.'">'.$i.'</a> | ';
                  
                }
            }
            
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="index.php?page='.($current_page+1).'">Next</a> | ';
            }
           ?>
          
           <hr>
      <div class="w3-col s4">
        <h4>Địa chỉ</h4>
        <p>Questions? Go ahead.</p>
        <form action="/action_page.php" target="_blank">
          <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
          <button type="submit" class="w3-button w3-block w3-black">Send</button>
        </form>
      </div>
      <div class="w3-col s4">
        <h4>About</h4>
        <p><a href="#">About us</a></p>
        <p><a href="#">We're hiring</a></p>
        <p><a href="#">Support</a></p>
        <p><a href="#">Find store</a></p>
        <p><a href="#">Shipment</a></p>
        <p><a href="#">Payment</a></p>
        <p><a href="#">Gift card</a></p>
        <p><a href="#">Return</a></p>
        <p><a href="#">Help</a></p>
      </div>

      <div class="w3-col s4 w3-justify">
        <h4>Store</h4>
        <p><i class="fa fa-fw fa-map-marker"></i> Company Name</p>
        <p><i class="fa fa-fw fa-phone"></i> 0044123123</p>
        <p><i class="fa fa-fw fa-envelope"></i> ex@mail.com</p>
        <h4>We accept</h4>
        <p><i class="fa fa-fw fa-cc-amex"></i> Amex</p>
        <p><i class="fa fa-fw fa-credit-card"></i> Credit Card</p>
        <br>
        <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
        <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
        <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
        <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
        <i class="fa fa-linkedin w3-hover-opacity w3-large"></i>
      </div>
      
    </div>
  </footer>


  <script>
// Accordion 
function myAccFunc() {
  var x = document.getElementById("demoAcc");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

// Click on the "Jeans" link on page load to open the accordion for demo purposes
document.getElementById("myBtn").click();


// Open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}
</script>
  

</body>
</html>
