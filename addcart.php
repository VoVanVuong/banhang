<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <h1>Đã thêm thành công </h1>
     <table border="1px"> 
     <tr>
     <td width="50px">STT</td>
     <td width="200px">Tên máy</td>
     <td width="200px">Giá</td>
     <td width="200px">Số lượng</td>
     </tr>
    

<?php
session_start();
$id=$_GET['item'];
   $connect=mysqli_connect("localhost","root","","banhang");
   $sql="select * from hanghoa where id=".$id;
   $query=mysqli_query($connect,$sql);
   if(mysqli_num_rows($query) > 0)
   {
   while($row=mysqli_fetch_array($query))
   {
    if(isset($_SESSION['cart'][$id]))
    {
        $qty = $_SESSION['cart'][$id] + 1;
       }
       else
       {
        $qty=1;
       }
       $_SESSION['cart'][$id]=$qty;
       

   echo "<div id=cart>";
   echo "<h3>$row[tenmathang]</h3>";
   echo "Tac Gia: sssss  <br>" ;
   echo " Gia: ".number_format($row['dongia'],3)."
   VND<br />";
   echo "<p align='right'><a href='addcart.php?item=$row[id]'>Mua Sach
   Nay</a></p>";
   echo "</div>";

   echo "<tr>";
   echo " <td width='50px'>$row[id]</td>";
   echo  "<td width='200px'>$row[tenmathang]</td>";
   echo "<td width='200px'>".number_format($row['dongia'],3)." VND </td> ";
   echo "<td width='200px'>Soluong</td>";
   echo "</tr>";
   }
   }
   ?>
   <a href="chitietgiohang.php">Mua tiep</a>

    </table> 
</body>
</html>