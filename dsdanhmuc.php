<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem chi tiết danh mục</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <?php include('menu.php'); ?>
    <br><br>
     <h1>danh muc</h1>
     <table  class="table table-striped table-bordered  table-hover"> 
     <tr>
     <td width="50px">STT</td>
     <td width="200px">Ten danh muc</td>
     <td width="200px">Danh sách danh mục</td>
     </tr>
     <?php 
     $conn=mysqli_connect("localhost","root","","banhang");
     $sql="SELECT *FROM danhmuc";
     $ketqua=mysqli_query($conn,$sql);
     if(mysqli_num_rows($ketqua)>0){
     while($row=mysqli_fetch_assoc($ketqua))
     {
         echo '<tr>';
         echo '<td>'.$row['id'].'</td>';
         echo '<td><a href="dshanghoa.php?id='.$row['id'].'">'.$row['tendanhmuc'].'</a></td>';
        //  echo '<td>'.row['anh'].'<td>';
         echo '<td><a href="xoadanhmuc.php?id='.$row['id'].'">Xóa</a> | <a href="suadanhmuc.php?id='.$row['id'].'">Sửa</a> | <a href="themdanhmuc.php?id='.$row['id'].'">Thêm danh mục</a></td>';
         echo '<tr>';
//          echo "<p align='right'><a href='addcart.php?item=$row[id]'>Mua Sach
// Nay</a></p>";
     }
    }
     ?>
     </table>
</body>
</html>