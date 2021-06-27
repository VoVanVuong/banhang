<?php 
if(isset($_POST['save'])){
    $conn=mysqli_connect("localhost","root","","banhang");
    $uID=$conn->real_escape_string($_POST['uID']);
    $ratedIndex=real_escape_string($_POST['ratedIndex']);
    $ratedIndex++;

    if($uID===0){
      
        
         $conn->query(query ;"INSERT INTO star (ratedIndex) VALUES ('$ratedIndex')");
        $sql=$conn->query(query ;"SELECT id FROM star ORDER BY id DESC LIMIT 1");
        $uData=$sql->fetch_assoc();
        $uID=$uData['id'];
    }else
   $conn->query(query:"UPDATE star SET ratedIndex='$ratedIndex' WHERE id='$uID'");
   exit(json_encode(array('id'=>$uID)));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Đánh giá</title>
</head>
<body>
    <div align="center" style="background:#000;padding:50px;">
    <i class="fas fa-star fa-2x" data-index="0" ></i>
    <i class="fas fa-star fa-2x" data-index="1" ></i>
    <i class="fas fa-star fa-2x" data-index="2" ></i>
    <i class="fas fa-star fa-2x" data-index="3" ></i>
    <i class="fas fa-star fa-2x" data-index="4" ></i>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var ratedIndex=-1, uID=0;
        $(document).ready(function(){
            resetStarColors();
            
            if(localStorage.getItem('ratedIndex') !=null)
             setStars(parseInt(localStorage.getItem('ratedIndex')));

        $('.fa-star').on('click',function(){
            ratedIndex=parseInt($(this).data('index'));
            localStorage.setItem(' ratedIndex',ratedIndex);
            saveToTheDB();
        });
            $('.fa-star').mouseover(function() {
                resetStarColors();
            
            var currentIndex=parseInt($(this).data('index'));
            setStars(currentIndex);
           
            });
            $('.fa-star').mouseleave(function() {
                resetStarColors();
              if(ratedIndex !=-1)
             setStars(ratedIndex);
            });
        });
        function  saveToTheDB(){
            $.ajax({
               url:"danhgia.php",
               method:"POST",
               dataType:'json',
               data:{
                   save:1,
                   uID:uID,
                   ratedIndex:ratedIndex
               },success: function(r){
                  uID=r.uid;
               }
            });
        }
        function setStars(max){
            for(var i=0;i<=max;i++)
            $('.fa-star:eq('+i+')').css('color','green');

        }
        function resetStarColors(){
            $('.fa-star').css('color','white');
        }
    </script>
</body>
</html>