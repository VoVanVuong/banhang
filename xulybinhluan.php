<?php
session_start();

if ($_SERVER["REQUEST_METHOD"]=="POST"){
$conn=mysqli_connect("localhost","root","","banhang");
$noidung=$_POST['noidung'];
$id=$_POST['idsach'];
$tennguoidung=$_SESSION['username'];;
// $traloibinhluan=$_POST['traloibinhluan'];
$sql="INSERT INTO binhluan(idsach,tennguoidung,noidung) VALUES ($id,'$tennguoidung','$noidung')";
$ketqua=mysqli_query($conn,$sql);
}
?>