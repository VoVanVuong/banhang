<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <table  class="table table-striped  table-bordered  table-hover">
    <tr style="background-color:#FF9900">
      <th width="50px">STT</th>
       <th  width="200px">Tên hàng</th>
       <th  width="50px">Tổng sản phẩm</th>
       <th  width="50px">Sản phẩm còn</th>
       <th width="50px">Sản phẩm đã bán </th>
       <th  width="50px">Sản phẩm mua</th>
    
       <th  width="150px">Đơn giá</th>
       <th  width="160px">Tiền mỗi sản phẩm <br> <h6> (SốSảnPhẩm X ĐơnGiá) </h6></th>
       <th  width="150px">Hình ảnh</th>
       <!-- <td  width="150px">anh</td> -->
       <th colspan="3" width="400px" style="text-align: center;">Chức năng</th>
       
      <?php 
       echo '<td>'."<p align='right'><a href='xoagiohang.php?item=0'>xoa all</a></p>".'</td>';
  
      ?>
       </tr>
     
       <div id="subscribe" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-padding-large">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('subscribe').style.display='none'" class="fa fa-remove w3-button w3-xlarge w3-right w3-transparent"></i>
     
      <h2 class="w3-wide">Đặt hàng</h2>
      
      <hr>
      <p>Mời bạn nhập số điện thoại</p>
      <p><input name="sodienthoai" class="w3-input w3-border" type="text" placeholder="số điện thoại "></p>
      <hr>
      <p>Mời bạn nhập email</p>
      <p><input name="nhapEmail" class="w3-input w3-border" type="text" placeholder="Email "></p>
    
      <hr>
      <p>Mời bạn nhập địa chỉ giao hàng(Bắt buộc).</p>
      <p><input name="diachi" class="w3-input w3-border" type="text" placeholder="Địa chỉ "></p>
     
     <hr><p>Tên sản phẩm:<?php  echo $row['tenmathang'] ?></p>
     <p>Giá:<span><?php echo $row['dongia'].'.000.000.VND'?></span></p>
     <hr>
      <span>Số lượng</span> <input name="soluong" id="sl" type="number" style="width: 80px; height: 38px; margin-left:190px" placeholder="Số lượng">
      <br>
    <hr><h3>Tổng tiền:</h3>
    <hr>
      <input type="submit" value="Đặt mua"   class="w3-button w3-padding-large w3-green w3-margin-bottom" >    
    </div>

  </div>
</div>


</body>
</html>
<form action="" method="post">
<?php
 
 $ok=1;
 if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $k => $v)
    {
    if(isset($k))
    {
    $ok=2;
    }
    }
}
    if($ok == 2){
 foreach($_SESSION['cart'] as $key=>$value)
{
 
$item[]=$key; 
}
$str=implode(",",$item);
$connect=mysqli_connect("localhost","root","","banhang");

 

$sql="select * from hanghoa where id in ($str)";
$query=mysqli_query($connect,$sql);
$price=0;
if(isset($_POST['capnhat'])){
    foreach($_SESSION['cart'] as $key=>$value)
    {
    $_SESSION['cart'][$key]=$_POST[$key];
    }
 }
 
if(mysqli_num_rows($query) > 0)
{
    $i=1;
   
while($row=mysqli_fetch_array($query))
{
    $soluongcon=$row['soluong']-$_SESSION['cart'][$row['id']];
    $soluongdaban=$row['soluong']-($row['soluong']-$_SESSION['cart'][$row['id']]);
    echo '<tr>';   
    echo '<td>'.$i.'</td>';
    echo "<td> $row[tenmathang] </td>";
    echo "<td> $row[soluong] </td>";
    echo "<td>" .$soluongcon. "</td>";
    echo "<td>" .$soluongdaban  ."</td>";
   if( $soluongcon==0){
    echo '<td>'."Hết hàng".'</td>';
   }else{

   
    echo '<td>'."<input type='number' name='".$row['id']."' min='1' max='$soluongcon' id='' value='".$_SESSION['cart'][$row['id']]."'>".'</td>';
   }
    echo "<td>"."$row[dongia] ".".000.000 VND</td>";
    echo "<td>".number_format($_SESSION['cart'][$row['id']]*$row['dongia'],3).".000 VND </td>";
    ?>
       <td>  <img src="./uploads/<?php echo $row['hinhanh']  ?>" alt="" style="width:30% ; height:auto"> </td>
  
         <?php
          echo  '<td> <a  href="xemchitiettrangweb.php?id='.$row['id'].'">Xem chi tiết</a> </td>';
    // echo '<td>'."Xem sản phẩm".'</td>';
    echo  '<td> <a  href="muahang.php?id='.$row['id'].'">Mua sản phẩm</a> </td>';
    echo '<td>'."<p align='right'><a href='xoagiohang.php?item=$row[id]'>Xóa khỏi giỏ hàng</a></p>".'</td>';
   
    echo '</tr>';
$price+=$_SESSION['cart'][$row['id']]*$row['dongia'];

 
 $i++;
}
?>
<tr style="background-color:#CC9900">
       <th width="50px"></th>
       <th  width="200px"></th>
       <th  width="50px"></th>
       <th  width="50px"></th>
    
       <th  width="150px"></th>
       <th  width="160px">  </th>
       <th  width="200px"></th>
       <th  width="150px"></th>
       <!-- <td  width="150px">anh</td> -->
       <th colspan="3" width="150px" style="text-align: center;"></th>
      
      <?php 
       echo '<td>'."<p align='right'><a href='xoagiohang.php?item=0'></a></p>".'</td>';
  
      ?>
       </tr>
<?php 


echo "</table>";
echo "<hr><hr>";
echo "<input style='margin-left:60px;background-color:#FF9933; height:50px;width:300px' type='submit' value='Cap nhat' name ='capnhat'> ";
echo   "<button style='margin-left:198px ;background-color:#FF0000; height:50px;width:300px'> <a href='xoagiohang.php?item=0'>Xóa tất cả</a> </button>";
// echo "<input style='margin-left:198px ;background-color:#FF0000; height:50px;width:300px' type='submit' value='Xóa tất cả' > ";
echo "<input style='margin-left:198px ;background-color:#33FF33; height:50px;width:300px' type='submit' value='Đặt mua' name ='Đặt mua'> ";


?> 
<!-- <p><button class="w3-button w3-green w3-third" onclick="document.getElementById('subscribe').style.display='block'" >Đặt mua</button></p> -->


<?php
echo "<h3>Tổng tiền tất cả món hàng là: ".$price .".000.000 VND <h3>";

}

 }

 else{
     echo "<h2 style='color:red;margin-left:35%'>không có sản phẩm trong giỏ hàng<h2>";
     echo "<hr><hr>";
 }
 




?>
</form>
<!-- <hr><hr>
<div style="padding-left:500px;font-size:40px;">Tình trạng đơn hàng</div>
<hr>
<table  class="table table-striped  table-bordered  table-hover">
    <tr style="background-color:#FF9900">
      <th width="50px">STT</th>
       <th  width="200px">Tên hàng</th>
       <th  width="50px">Tổng sản phẩm</th>
       <th  width="50px">Sản phẩm còn</th>
       <th width="50px">Sản phẩm đã bán </th>
       <th  width="50px">Sản phẩm mua</th>
    
       <th  width="150px">Đơn giá</th>
       <th  width="160px">Tiền mỗi sản phẩm <br> <h6> (SốSảnPhẩm X ĐơnGiá) </h6></th>
       <th  width="150px">Hình ảnh</th>
        <td  width="150px">anh</td> 
       <th colspan="3" width="400px" style="text-align: center;">Chức năng</th>
    
    </tr>
</table>
 -->


    </body>
</html>