<?php

try{
    $conn = mysqli_connect("localhost","root","","grade");
    if(!$conn){
        die("Error : ".mysqli_connect_error());
    }

    $name = $_REQUEST["name"];
    $reg_no = $_REQUEST["reg_no"];
    $dept = $_POST["dept"];
    $gender = $_REQUEST["Gender"];
    try{
        $sql = "INSERT into students values('$reg_no','$name','$gender','$dept');";
        if(mysqli_query($conn,$sql)){
            echo "<center><h1>Student Record Added</h1><center>";
        }
        else{
            echo "<center><h1>Failed to Add</h1></center>";
        }
    }
    catch(Exception $e){
        echo "<center><h1>This Register Number has already Exists...</h1></center>";
    }
    mysqli_close($conn);
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
<form method="post" action="signin.php">
  <center><button name="button" class="save">close</button></center>
</form>
</body>
</html>