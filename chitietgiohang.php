<?php
session_start();
?>
<html>
<head>
<title>Demo Shopping Cart - Created By My Kenny</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>Tất cả các món hàng bạn đã thêm vào giỏ hàng</h1>
<div id='cart'>
<?php
$ok=1;
if(isset($_SESSION['cart']))
{
foreach($_SESSION['cart'] as $k=>$v)
{
if(isset($v))
{
$ok=2;
}
}
}
if ($ok != 2)
{
echo '<p>Ban khong co mon hang nao trong gio hang</p>';
}
else
{
$items = $_SESSION['cart'];
echo '<p>Ban dang co <a href="cart.php">'.count($items).' mon hang trong
gio hang</a></p>';
echo "<hr>";
echo "<hr>";
}
?>
</div>
<?php
$connect=mysqli_connect("localhost","root","","banhang");

$sql="select * from hanghoa";
$query=mysqli_query($connect,$sql);
if(mysqli_num_rows($query) > 0)
{
while($row=mysqli_fetch_array($query))
{
echo "<div id=cart>";
echo "<h3>$row[tenmathang]</h3>";
echo "Số lượng còn: $row[soluong] <br/> ";
echo "Gia: ".number_format($row['dongia'],3)."VND<br /> <br />";
echo "<p align='left'><a href='xemchitiettrangweb.php?id=$row[id]'>Xem chi tiết món hàng</a></p>";
echo "<p align='right'><a href='addcart.php?item=$row[id]'>Thêm vào giỏ hàng</a></p>";
echo "</div>";
echo "<hr>";
}
}
?>