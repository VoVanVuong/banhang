<?php 
$conn=mysqli_connect("localhost","root","","banhang");
if(isset($_GET['id'])){
    $sql="SELECT * FROM danhmuc WHERE id=".$_GET['id'];
    $ketqua=mysqli_query($conn,$sql);
    $row1=mysqli_fetch_assoc($ketqua);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa danh mục</title>
</head>
<body>
    <?php include('menu.php') ?>
    <h1>Sửa danh mục</h1>
    <form action="" method="POST">
       <input type="hidden" name="id" value="<?php echo $row1['id'];?>"><br>
       Tên danh mục: <input type="text" name="tendanhmuc" value="<?php echo $row1['tendanhmuc'];?>">
       <input type="submit" value="Sửa danh mục" name="submit">
    </form>

    <?php 
    if(isset($_POST['submit'])){
        $conn=mysqli_connect("localhost","root","","banhang");
        $id=$_GET['id'];
        $tendanhmuc=$_POST['tendanhmuc'];
        $sql="UPDATE danhmuc SET tendanhmuc='$tendanhmuc' WHERE id=".$id ;
$ketqua=mysqli_query($conn,$sql);
    }
    ?>
</body>
</html>