<?php
$conn=mysqli_connect("localhost","root","","banhang");
$sql="DELETE FROM danhmuc WHERE id=".$_GET['id'];
$ketqua=mysqli_query($conn,$sql);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include('menu.php') ?>
    <h1>Bạn đã xóa danh mục thành công</h1>
</body>
</html>