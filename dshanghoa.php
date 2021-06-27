<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
    <title>Trang chủ</title>
</head>
<body>
     <?php include('menu.php'); ?>
     <br><br>
    
    <h1>Danh sách mặt hàng</h1>

    <!-- tìm kiếm -->
    <form action="" method="GET">
     <input type="text" name="timkiem">
     <input type="submit" value="Tìm">
    </form>
    <table  class="table table-striped  table-bordered">
       <tr>
       <td width="50px">STT</td>
       <td  width="200px">Tên hàng</td>
       <td  width="50px">Số lượng</td>
       <td  width="150px">Đơn giá</td>
       <td  width="450px">Giới thiệu</td>
       <td  width="450px">Hình ảnh</td>
       <!-- <td  width="150px">anh</td> -->
       <td  width="150px" style="text-align: center;">Chức năng</td>
      
       </tr>

     <?php 
     
     $timkiem='';
     echo $_SESSION['username'];
     if(isset($_GET['timkiem']))
     $timkiem=$_GET['timkiem'];
     $conn=mysqli_connect("localhost","root","","banhang") or die("Lỗi kết nối đến server");
     
     if(isset($_GET['id'])){
      $sql="SELECT * FROM hanghoa WHERE iddanhmuc=".$_GET['id'];
      $ketqua=mysqli_query($conn,$sql);
   
     }
   else{
     $sql="SELECT * FROM hanghoa WHERE tenmathang  like '%$timkiem%' ";
     $ketqua=mysqli_query($conn,$sql);
   }
     $i=1;
     while($row = mysqli_fetch_assoc($ketqua))
     {
         echo '<tr>';
          echo '<td>'.$i.'</td>';
        //  echo "<td>".$row['id'];
         echo '<td>'.$row['tenmathang'].'</td>';
         echo '<td>'.$row['soluong'].'</td>';
         echo '<td>'.$row['dongia'].'</td>';
         echo '<td>'.$row['gioithieu'].'</td>';
         ?>
       <td>  <img src="./uploads/<?php echo $row['hinhanh']  ?>" alt="" style="width:30% ; height:auto"> </td>
  
         <?php
        
         echo '<td><a href="xoahanghoa.php?id='.$row['id'].'">Delete</a> | <a href="suahanghoa.php?id='.$row['id'].'">Sửa hàng hóa</a> | <a href="themhanghoa.php?id='.$row['id'].'">Them</a></td>';
         echo '</tr>';
         $i++;
        }
      
     ?>  


    </table>
      </body>
</html>