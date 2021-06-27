<?php
$conn=mysqli_connect("localhost","root","","banhang")or die("Lỗi kết nối đến server");
$sql="DELETE FROM binhluan WHERE id =".$_GET['id'];
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
    <h1>da xoa thanh cong</h1>
</body>
</html>