<?php 
$diachi="";
$diachiERR="";
$emailErr="";
$nhapEmail="";
$sodienthoai="";
$sodienthoaiErr="";
$soluong="";
$conn=mysqli_connect("localhost","root","","banhang");
 $sql="SELECT * FROM hanghoa WHERE id =".$_GET['id'];
 $ketqua=mysqli_query($conn,$sql);
     while($row = mysqli_fetch_assoc($ketqua))
     {


      if($_SERVER["REQUEST_METHOD"]=="POST")
{
  
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


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Document</title>
</head>
<body>
 <form action="" method="POST">
   <div style="background-color:white">
     <div style="margin-left:200px;margin-top:50px;margin-right:200px;background-color:#e5e5e5;padding-left:30px;padding-right:30px">
        <div style="padding-left:443px;">
          <span style="font-size:50px">Đặt hàng</span> 
          <span> hủy</span>
        </div>
        <hr>

        <div>
          <span style="font-size:30px;padding-left:20px">Tên sản phẩm: <?php echo $row['tenmathang']?></span>
        </div>
        <hr>

        <div>
          <span style="font-size:30px;padding-left:20px">Mời bạn nhập số điện thoại</span><br>
          <input type="text" name="sodienthoai" >
        </div>
        <hr>

        <div>
        <span style="font-size:30px;padding-left:20px" > Mời bạn nhập email </span><br>
        <input type="text" name="email">
        </div>
        <hr>
         
         <div>
          <span style="font-size:30px;padding-left:20px">Mời bạn nhập địa chỉ giao hàng(Bắt buộc). *</span><br>
          <input type="text" name="diachi">
         </div>
        <hr>
        <div>
        <span style="font-size:30px;padding-left:20px">Giá <?php echo $row['dongia'].".000.000 VND"?></span>
        </div>
        <hr>
        <div>
        <span style="font-size:30px;padding-left:20px">Số lượng</span>
        <input type='number' name="soluong" <?php echo $row['id'] ?> min='1' max=<?php echo $row['soluong'] ?> id='' value='" "'>
  
        </div>
        <br>
        <div style="font-size:30px;padding-left:20px">
        tổng tiền:
        </div>
        <hr>
        <input type="submit" value="Mua">
     </div>
   </div> 
   <?php }?>
   </form> 
</body>
</html>