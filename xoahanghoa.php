<?php
$conn=mysqli_connect("localhost","root","","banhang")or die("Lỗi kết nối đến server");
$sql="DELETE FROM hanghoa WHERE id =".$_GET['id'];
$ketqua=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
</head>
<body>
    <?php include('menu.php');?>
    <h1>Xóa hàng hóa</h1>
</body>
</html>