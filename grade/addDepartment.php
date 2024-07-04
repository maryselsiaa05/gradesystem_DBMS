<?php
try{  
    if(array_key_exists('Submit',$_POST)){
        $conn = mysqli_connect("localhost","root","","grade");
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $sql = "INSERT into department values('$id','$name');";
        try{
            $result = mysqli_query($conn,$sql);
            if($result){
                echo "<center><h1>Department: $name has been Added</h1></center>";
            }
            else{
                echo "<center><h1>Adding Department has been Failed</h1></center>";
            }
        }
        catch(Exception $a){
            echo "<center><h1>Department Already Exists</h1></center>";
        }
        mysqli_close($conn);
    }
       
}
catch(Exception $e){
        echo "<center><h1>Not able to connect with DATABASE</h1></center>";
}
    
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RESULT</title>
<style>
.save{
  border-radius: 10px;
  color: #fff;
  background: #036;
  width: 90px;
  height:45px;
  font-size:15px;
}
</style>
</head>
<body>
<form method="post" action="department.php">
  <center><button name="button" class="save">close</button></center>
</form>
</body>
</html>