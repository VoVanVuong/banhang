<?php session_start();?>
<?php 
$diachi="";
$diachiERR="";
$emailErr="";
$nhapEmail="";
$sodienthoai="";
$sodienthoaiErr="";
$soluong="";
    //  echo $_SESSION['username'];
     $conn=mysqli_connect("localhost","root","","banhang") or die("Lỗi kết nối đến server");
     $sql="SELECT * FROM hanghoa WHERE id =".$_GET['id'];
     $ketqua=mysqli_query($conn,$sql);

    //  $price=0;
    //  if(isset($_POST['capnhat'])){
    //      foreach($_SESSION['cart'] as $key=>$value)
    //      {
    //      $_SESSION['cart'][$key]=$_POST[$key];
    //      }
    //   }

     while($row = mysqli_fetch_assoc($ketqua))
     {

?>
<!DOCTYPE html>
<html>
<title>Chi tiết sản phẩm</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
    <script>
$(document).ready(function(){
$("#guibinhluan").click(function(){
var url_string =window.location.href;
var url=new URL(url_string);
var idsp=url.searchParams.get("id");
var txt=$("#noidungbinhluan").val();
$.post("xulybinhluan.php",{noidung:txt,idsach:idsp},function(result){
$("#dsbinhluan").append('<hr>'+txt);
});
});
});


</script>
<script>
$(document).ready(function(){
  $("#dong_hien").click(function(){
    $("#hienthi").toggle();
  });
});

</script>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.mySlides {display: none}
#bogachchan{
  text-decoration: none;
}
</style>
<body class="w3-content w3-border-left w3-border-right">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-light-grey w3-collapse w3-top" style="z-index:3;width:260px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-transparent w3-display-topright"></i>
    <h3>Giá</h3>
    <h3> <?php  echo '<p><b>'.number_format($row['dongia'],3). '.000.VND</b></p>'?> </h3>
    <!-- <h6>per night</h6> -->
    <hr>
    <form action="/action_page.php" target="_blank">
      <p><label><i class="fa fa-calendar-check-o"></i> Tên người mua </label></p>
      <input class="w3-input w3-border" type="text" placeholder="DD MM YYYY" name="CheckIn" required>          
      <p><label><i class="fa fa-calendar-o"></i> Địa chỉ</label></p>
      <input class="w3-input w3-border" type="text" placeholder="DD MM YYYY" name="CheckOut" required>         
      <p><label><i class="fa fa-male"></i> Số lượng</label></p>
      <input class="w3-input w3-border" type="number" value="1" name="Adults" min="1" max="6">              
      <p><label><i class="fa fa-child"></i> Số lượng đã mua</label></p>
      <input class="w3-input w3-border" type="number" value="0" name="Kids" min="0" max="6">
      <br>
      <!-- <input type="Đặt mua" values="Đặt mua" style="background-color:#4CAF50;width:200px"> -->
     
      <!-- <p><button class="w3-button w3-green w3-third" onclick="document.getElementById('subscribe').style.display='block'">Đặt mua</button></p> -->
      <p><button class="w3-button w3-block w3-green w3-left-align" type="submit"><i class="fa fa-search w3-margin-right"></i> Search availability</button></p>
    </form>
  </div>
  <div class="w3-bar-block">
    <a href="#apartment" class="w3-bar-item w3-button w3-padding-16"><i class="fa fa-building"></i> Apartment</a>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-16" onclick="document.getElementById('subscribe').style.display='block'"><i class="fa fa-rss"></i> Subscribe</a>
    <a href="#contact" class="w3-bar-item w3-button w3-padding-16"><i class="fa fa-envelope"></i> Contact</a>
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <span class="w3-bar-item">Rental</span>
  <a href="javascript:void(0)" class="w3-right w3-bar-item w3-button" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-white" style="margin-left:260px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:80px"></div>

  <!-- Slideshow Header -->
  <div class="w3-container" id="apartment">
    <h2 class="w3-text-green"><?php  echo $row['tenmathang'] ?></h2>
    <div class="w3-display-container mySlides">
    <img src="./uploads/<?php echo $row['hinhanh']  ?>" style="width:100%;margin-bottom:-6px ;height: auto">
      <div class="w3-display-bottomleft w3-container w3-black">
        <p>Trái</p>
      </div>
    </div>
    <div class="w3-display-container mySlides">
    <img src="./uploads/<?php echo $row['hinhanh']  ?>" style="width:100%;margin-bottom:-6px">
      <div class="w3-display-bottomleft w3-container w3-black">
        <p>Phải</p>
      </div>
    </div>
    <div class="w3-display-container mySlides">
    <img src="./uploads/<?php echo $row['hinhanh']  ?>" style="width:100%;margin-bottom:-6px">
      <div class="w3-display-bottomleft w3-container w3-black">
        <p>Trước</p>
      </div>
    </div>
    <div class="w3-display-container mySlides">
    <img src="./uploads/<?php echo $row['hinhanh']  ?>" style="width:100%;margin-bottom:-6px">
      <div class="w3-display-bottomleft w3-container w3-black">
        <p>Sau</p>
      </div>
    </div>
  </div>
  <div class="w3-row-padding w3-section">
    <div class="w3-col s3">
      <img class="demo w3-opacity w3-hover-opacity-off" src="./uploads/<?php echo $row['hinhanh']  ?>" style="width:100%;cursor:pointer" onclick="currentDiv(1)" title="Living room">
    </div>
    <div class="w3-col s3">
      <img class="demo w3-opacity w3-hover-opacity-off" src="./uploads/<?php echo $row['hinhanh']  ?>" style="width:100%;cursor:pointer" onclick="currentDiv(2)" title="Dining room">
    </div>
    <div class="w3-col s3">
      <img class="demo w3-opacity w3-hover-opacity-off" src="./uploads/<?php echo $row['hinhanh']  ?>" style="width:100%;cursor:pointer" onclick="currentDiv(3)" title="Bedroom">
    </div>
    <div class="w3-col s3">
      <img class="demo w3-opacity w3-hover-opacity-off" src="./uploads/<?php echo $row['hinhanh']  ?>" style="width:100%;cursor:pointer" onclick="currentDiv(4)" title="Second Living Room">
    </div>
  </div>

  <div class="w3-container">
  <hr>
    
    <h4><strong>Thông tin bổ sung</strong></h4>
  <p> <?php echo $row['gioithieu'] ?></p>

    <!-- <p>   <i class="fa fa-cc-cc-visa w3-large"></i><i class="fa fa-cc-paypal w3-large"></i> Đặc mua:</p>
    <hr> -->
    <hr>
    <p><button class="w3-button w3-green w3-third" onclick="document.getElementById('subscribe').style.display='block'" >Đặt mua</button></p>
    <!-- <input id="sl" type="number" style="width: 80px; height: 38px; margin-left:190px" placeholder="Số lượng">
   <br> -->
   <br>
   <br>
    <!-- <div style="width: 80px; height: 38px; margin-left:61%">
    <b>Tổng tiền:</b>
    
    </div> -->
       
       <hr>
    <h4><strong>The space</strong></h4>
    <div class="w3-row w3-large">
      <div class="w3-col s6">
        <p><i class="fa fa-fw fa-male"></i> Số lượng người mua: 4</p>
        <p><i class="fa fa-fw fa-bath"></i> Bathrooms: 2</p>
        <p><i class="fa fa-fw fa-bed"></i> Bedrooms: 1</p>
      </div>
      <div class="w3-col s6">
        <!-- <p><i class="fa fa-fw fa-clock-o"></i> Check In: After 3PM</p> -->
        
<!-- <head>
<title>Demo Shopping Cart - Created By My Kenny</title>
<link rel="stylesheet" href="style.css" />
</head> -->
<body>
<div id='cart'>
<?php
$ok=1;
if(isset($_SESSION['cart']))
{
foreach($_SESSION['cart'] as $k=>$v)
{
if(isset($v))
{
$ok=2;
}
}
}
if ($ok != 2)
{
  echo '<p>Ban khong co mon hang nao trong gio hang</p>';
}
else
{
$items = $_SESSION['cart'];
// echo '<p>Ban dang co <a href="chitietgiohang.php">'.count($items).' mon hang trong
// gio hang</a></p>';
}
?>
</div>
<?php
$connect=mysqli_connect("localhost","root","","banhang");

$sql="SELECT * FROM hanghoa WHERE id=".$_GET['id'];
$query=mysqli_query($connect,$sql);
if(mysqli_num_rows($query) > 0)
{
// while($row=mysqli_fetch_array($query))
// {
echo "<p><a id='bogachchan' href='addcart.php?item=$row[id]'> <i class='fa fa-shopping-cart w3-margin-right'>  </i >Thêm vào giỏ hàng</a></p>";
// }
}
?>



        <p><i class="fa fa-fw fa-clock-o"></i> Check Out: 12PM</p>
      </div>
    </div>
    <hr>
    
    <h4><strong>Amenities</strong></h4>
    <div class="w3-row w3-large">
      <div class="w3-col s6">
        <p><i class="fa fa-fw fa-shower"></i> Shower</p>
        <p><i class="fa fa-fw fa-wifi"></i> WiFi</p>
        <p><i class="fa fa-fw fa-tv"></i> TV</p>
      </div>
      <div class="w3-col s6">
        <p><i class="fa fa-fw fa-cutlery"></i> Kitchen</p>
        <p><i class="fa fa-fw fa-thermometer"></i> Heating</p>
        <p><i class="fa fa-fw fa-wheelchair"></i> Accessible</p>
      </div>
    </div>
                           
   </div>
  <hr>
  
  <!-- Contact -->
  <div class="w3-container" id="contact">
    <h2>Contact</h2>
    <i class="fa fa-map-marker" style="width:30px"></i> Chicago, US<br>
    <i class="fa fa-phone" style="width:30px"></i> Phone: +00 151515<br>
    <i class="fa fa-envelope" style="width:30px"> </i> Email: mail@mail.com<br>
    <p>Questions? Go ahead, ask them:</p>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-border" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-border" type="text" placeholder="Email" required name="Email"></p>
      <p><input class="w3-input w3-border" type="text" placeholder="Message" required name="Message"></p>
    <button type="submit" class="w3-button w3-green w3-third">Send a Message</button>
    </form>
    <br>
 <br>
 <hr>
 <!-- 
 echo "<a id='bogachchan' href='binhluansanpham.php?id=$row[id]'> <h4><strong>Bình luận</strong></h4> </a>";

  -->
 <h4><strong>Bình luận</strong></h4>
 <hr>
 
 <input type="text" id="noidungbinhluan" name="noidungbinhluan" style="width:600px;border: 2px solid #cc0000;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    -ms-border-radius: 10px;
    -o-border-radius: 10px;
    border-radius: 10px;">
    <input type="submit" value="Gửi" id="guibinhluan" style="width:50px;">
    <br><br>
    <div id="dsbinhluan" style=" background-color: #b2b2b2;">
    <div id="dstlbinhluan" style=" background-color: 	#b2b2b2;">

    <!-- <script>
$(document).ready(function(){
  $("#traloi").click(function(){
    $("p").toggle();
  });
});
</script> -->

<!-- <p>This is a paragraph with little content.</p>
<p>This is another small paragraph.</p> -->

<?php 

    $ketnoi=mysqli_connect("localhost" ,"root","","banhang");
    $sql="SELECT * FROM binhluan WHERE idsach=".$_GET['id'];
    $ketqua1=mysqli_query($ketnoi,$sql);
    while($dong=mysqli_fetch_assoc($ketqua1))
    {
     
      echo " ".$dong['tennguoidung']."</br>";
      
      echo '<span>'.$dong["noidung"].'</span>  <br>    <a id="bogachchan" href="xoabinhluan.php?id='.$dong['id'].'">Xoa binh luan</a><hr>';
 ?>
   <!-- <button id="traloi">Trả lời</button> -->
    <?php }?>
  </div>
  <hr>
    
    <h4><strong>Đánh giá</strong></h4>

    <hr>

</div>

<?php 

// $nameErr ="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  // $sodienthoai=$_POST['sodienthoai'];
  // $nhapEmail=$_POST['nhapEmail'];

  if (empty($_POST['sodienthoai'])){
    $sodienthoaiErr="Bạn chưa nhập số điện thoại";
  }else{
    $sodienthoai=$_POST['sodienthoai'];
  }

  if (empty($_POST["email"])) {
    $emailErr = "";
  } else {
    $nhapEmail=$_POST['nhapEmail'];
    // check if e-mail address is well-formed
    if (!filter_var( $nhapEmail, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Định dạng email không hợp lệ";
    }
  }

  if (empty($_POST["diachi"])) {
    $diachiERR="Bạn chưa nhập địa chỉ";
  } else{
    $diachi=$_POST['diachi'];
  }
  // if (empty($_POST['diachi'])) {
  //   $nameErr = "Loi";
  // } else {
  //   $diachi = test_input($_POST['diachi']);
  // }
  
 $tensanpham=$row['tenmathang'];
  $soluong=$_POST['soluong'];
  $gia=$row['dongia'];
  $xacnhan="Chưa xác nhận";
  $sql1="INSERT INTO musanpham(sodienthoai,nhapemail,diachi,soluong,tensanpham,gia,xacnhan) VALUES('$sodienthoai','$nhapEmail','$diachi','$soluong','$tensanpham','$gia','$xacnhan')";
  $ketqua=mysqli_query($conn,$sql1);
}
?>

<form action="" method="POST">

<div id="subscribe" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-padding-large">
    <div class="w3-container w3-white w3-center">
       <i onclick="document.getElementById('subscribe').style.display='none'" class="fa fa-remove w3-button w3-xlarge w3-right w3-transparent"></i> 
      <h2 class="w3-wide">Đặt hàng</h2>
      <hr><h4><p>Tên sản phẩm:<?php  echo $row['tenmathang'] ?></p></h4>
    
      <hr>
      <p>Mời bạn nhập số điện thoại</p>
      <span style="color:red"><?php echo $sodienthoaiErr;?></span>
     
      <p><input name="sodienthoai" class="w3-input w3-border" type="text" placeholder="số điện thoại "></p>
      <hr>
      <p>Mời bạn nhập email</p>
      <span style="color:red;"><?php echo $emailErr;?></span>
     
      <p><input name="nhapEmail" class="w3-input w3-border" type="text" placeholder="Email "></p>
    
      <hr>
      <p>Mời bạn nhập địa chỉ giao hàng(Bắt buộc). <span style="color:red;font-size:50px">* </span></p>
      <span style="color:red;"><?php echo $diachiERR;?></span>
      <p><input name="diachi" class="w3-input w3-border" type="text" placeholder="Địa chỉ "></p>
     
     <br>
     
     <br>
     <hr>
     <p>Giá:<span><?php echo $row['dongia'].'.000.000.VND'?></span></p>
   
     <hr>
      <span>Số lượng</span>
      <input type='number' name="soluong" <?php echo $row['id'] ?> min='1' max=<?php echo $row['soluong'] ?> id='' value='" "'>
  
      <br>
      
    <hr>

     <Label>Tổng tiền:</Label> 
   
    <hr>
      <input type="submit" value="Đặt mua"   class="w3-button w3-padding-large w3-green w3-margin-bottom" >    
    </div>

  </div>
</div>
</form>
     <?php }?>
<script>
// Script to open and close sidebar when on tablets and phones
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Slideshow Apartment Images
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-opacity-off";
}
</script>

</body>
</html>
