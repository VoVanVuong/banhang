<?php 

$conn=mysqli_connect("localhost","root","","banhang");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
  <title>Document</title>
</head>
<body>
  <!-- <form action="" method="POST">
  <input type="text" name="sodienthoai">
  <input type="text" name="nhapEmail">
<input type="text" name="diachi">
<input type="text" name="soluong">
<input type="submit" value="themnguoimua">
  </form> -->
  <table   class="table table-striped  table-bordered">
       <tr>
       <td width="200">ID</td>
       <td  width="200px">sdt</td>
       <td  width="150px">Email</td>
       <td  width="150px">Địa chỉ</td>
       <td width="400px">Tên hàng</td>
       <td  width="150px">Số lượng</td>
       <td width="150px">Giá</td>
       <td width="150px">Tình trạng đơn hàng</td>
      <td width="150px">Sửa hàng hóa</td>
       </tr>
<?php 
  $sql="SELECT * FROM musanpham   ";
     $ketqua=mysqli_query($conn,$sql);
     while($row = mysqli_fetch_assoc($ketqua))
     {
      echo '<tr>';
      echo '<td>'.$row['id'].'</td>';
     echo '<td>'.$row['sodienthoai'].'</td>';
     echo '<td>'.$row['nhapemail'].'</td>';
     echo '<td>'.$row['diachi'].'</td>';
     echo '<td>'.$row['tensanpham'].'</td>';
     echo '<td>'.$row['soluong'].'</td>';
     echo '<td>'.$row['gia'].".000.000 VND".'</td>';
      ?>
     <form action="" method="POST">
     <td> <input type="text" name="xacnhandonhang" value="<?php echo $row['xacnhan']; ?>"><br></td>
    
     <?php
      echo '<td> <a href="xemsokhachhang.php?id='.$row['id'].'">Sửa hàng hóa</a> </td>';
   
     echo '</tr>';
     }   
?>
</table>
<input type="submit" value="Sửa" name="submit" style="margin-left:25%;padding-left:40px;padding-right:40px; font-size:20px;">
 </form>



<?php 
 if(isset($_POST['submit'])){
  $conn=mysqli_connect("localhost","root","","banhang");
  $xacnhanhoadon=$_POST['xacnhandonhang'];
  $id=$_GET['id'];
  $sql="UPDATE muasanpham SET xacnhan='$xacnhanhoadon' WHERE id=".$id ;
$ketqua=mysqli_query($conn,$sql);
 }
?>

</body>
</html>



















