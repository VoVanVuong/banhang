<?php 
error_reporting(0);
if(isset($_POST['upload'])){
    $image_uploaded=array();
    foreach($_FILES['hinh']['name'] as $key=>$value){
        $image_name=$_FILES['hinh']['name'][$key];
        $tmp_name=$_FILES['hinh']['tmp_name'][$key];

        $target_dir="uploads/";
        $target_file=$target_dir.$image_name;

        if(move_uploaded_file($tmp_name,$target_file)){
          $image_uploaded[]=$target_file;
        }
    }
}
?>

<?php
$conn=mysqli_connect("localhost","root","","banhang");
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $tenhang=$_POST['tenhang'];
    $soluong=$_POST['soluong'];
    $dongia=$_POST['dongia'];
    $iddanhmuc=$_POST['iddanhmuc'];
    $gioithieu=$_POST['gioithieu'];
    $sql="INSERT INTO hanghoa(tenmathang,soluong,dongia,iddanhmuc,gioithieu,hinhanh) VALUES('$tenhang','$soluong','$dongia','$iddanhmuc','$gioithieu','$image_name')";
    $ketqua=mysqli_query($conn,$sql);
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
<br>
<hr>
    <h1 style="padding-left:35%; font-size:50px;">Thêm hàng hóa</h1>
    <form action="themhanghoa.php" method="POST" enctype="multipart/form-data">
    <br>    <label  style="padding-left:20%; font-size:20px;">Tên mặt hàng:</label>  <input type="text" name="tenhang" style="width: 600px; height: 40px;"><br><br>
      <label style="padding-left:20%; font-size:20px;">Số lượng:</label>   <input type="text" name="soluong" style="width: 600px; height: 40px;margin-left:50px"><br><br>
      <label style="padding-left:20%; font-size:20px;"> Đơn giá: </label>  <input type="text" name="dongia" style="width: 600px; height: 40px;margin-left:60px"><br><br>
        <label style="padding-left:20%; font-size:20px;">Giới thiệu</label> <input type="text" name="gioithieu"style="width: 600px; height: 40px;margin-left:51px"><br><br>
         <p>
    <input type="file" name="hinh[]" multiple style="padding-left:40%; font-size:20px;"/>
    </p>
    <p>
    </p>
        <label style="padding-left:40%; font-size:20px;">Danh mục:</label> 
         <select name="iddanhmuc" >
            <?php
           
            $sql="SELECT * FROM danhmuc ";
            $ketqua=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($ketqua))
            {
                echo '<option value="'.$row['id'].'">'.$row['tendanhmuc'] .'</option>';
            }
            ?>
         </select>
         <br><br>
         <input type="submit" value="Thêm" name="upload" style="padding-left:50px;margin-left:42%; font-size:30px;padding-right:50px">
    </form>
</body>
</html>
