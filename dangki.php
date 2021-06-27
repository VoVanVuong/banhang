<?php 
$mess="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $u=$_POST["username"];
    $p=md5($_POST["password"]);
    $conn=mysqli_connect("localhost","root","","banhang");
    $sql="SELECT id FROM user WHERE username='$u'";
    $kq=mysqli_query($conn,$sql);
    if(mysqli_num_rows($kq)>0){
        $mess="ten dang nhap nay da ton tai";
    }
    else{
        $sql="INSERT INTO user(username,password,role) VALUES('$u','$p','khach')";
        $ketqua=mysqli_query($conn,$sql);
        $mess="ban dang ki thanh cong";
    } 
}
?>

<form action="" method="POST">
name: <input type="text" name="username"><br>
password: <input type="password" name="password"><br>
<input type="submit" value="Thêm Người dùng">
</form>
<?php 
echo $mess;
?>