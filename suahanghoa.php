<?php
$conn=mysqli_connect("localhost","root","","banhang");
if(isset($_GET['id']))
{
    $sql="SELECT * FROM hanghoa WHERE id=".$_GET['id'];
    $ketqua=mysqli_query($conn,$sql);
    $row1=mysqli_fetch_assoc($ketqua);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
</head>
<body>
    <?php include('menu.php'); ?>
    <br><br>
    <h1 style="padding-left:35%; font-size:50px;">Sửa Hàng hóa</h1>
    <form action="" method="POST">
    
  <label for="" style="padding-left:20%; font-size:20px;">Tên Mặt hàng:</label>   <input type="text" name="tenmathang" value="<?php echo $row1['tenmathang']; ?>"  style=" font-size:20px;"><br>
  <label for="" style="padding-left:20%; font-size:20px;" >Số lượng:</label>   <input type="text" name="soluong" value="<?php echo $row1['soluong']; ?>"><br>
  <label for="" style="padding-left:20%; font-size:20px;" >Đơn giá: </label>   <input type="text" name="dongia" value="<?php echo $row1['dongia']; ?>"><br>
  <label for="" style="padding-left:20%; font-size:20px;" >Danh mục:</label>  
    <select name="iddanhmuc" >
    <?php
     $sql="SELECT *FROM danhmuc  " ; 
     $ketqua=mysqli_query($conn,$sql);
     while ($row=mysqli_fetch_assoc($ketqua))
     {
         $selected='';
         if($row['id']==$row1['id']) $selected="selected";
         echo '<option value="'.$row['id'].'"'.$selected.'>'.$row['tendanhmuc'].'</option>';
     }
    ?>
    </select>
    <br>
    <input type="submit" value="Sửa" name="submit" style="margin-left:25%;padding-left:40px;padding-right:40px; font-size:20px;">
    </form>
    <?php  
    if(isset($_POST['submit'])){
        $conn=mysqli_connect("localhost","root","","banhang")or die("Lỗi kết nối đến server");
$tenhang=$_POST['tenmathang'];
$soluong=$_POST['soluong'];
$dongia=$_POST['dongia'];
$iddanhmuc=$_POST['iddanhmuc'];
$id=$_GET['id'];
$sql="UPDATE hanghoa SET tenmathang='$tenhang',iddanhmuc='$iddanhmuc',soluong='$soluong',dongia='$dongia' WHERE id=".$id ;
$ketqua=mysqli_query($conn,$sql);
    }
    ?>
</body>
</html>