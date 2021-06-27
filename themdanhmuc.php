
<?php
    $conn=mysqli_connect("localhost","root","","banhang")or die("Lỗi kết nối đến server");
if (isset($_GET['tendanhmuc']))
{
    $sql="INSERT INTO danhmuc(tendanhmuc) VALUES('".$_GET['tendanhmuc']."')";
    $ketqua=mysqli_query($conn,$sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Danh mục</title>
</head>
<body>
   

    <?php include('menu.php'); ?>
    <br>
    <br>
    <h1>Thêm Danh mục</h1>
    <form action="themdanhmuc.php" method="GET" enctype="multipart/form-data">
      Tên danh mục: <input type="text" name="tendanhmuc">

    <input type="submit"  value="Thêm Danh mục"/>
    </p><br><br>
    </form>
  
</body>
</html>