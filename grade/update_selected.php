<?php

try{
    $conn = mysqli_connect("localhost","root","","grade");
    session_start();
    if(array_key_exists("get",$_POST)){
        $dept = $_SESSION['dept'];
        $sql = "DELETE from selected where dept_id='$dept';";
        $delete = mysqli_query($conn,$sql);
        if($delete){
            foreach($_REQUEST["group"] as $selected){
                if(!empty($selected)){
                    $sql = "INSERT into selected values('$selected','$dept');";
                    $row = mysqli_query($conn,$sql);
                    if(!$row){
                        echo "<center><h1>Something Went Wrong to select courses</h1></center>";
                        break;
                    }
                }
                else{
                    echo "<center><h1>Atleast one Course must be select</h1></center>";
                }
            }
            if($row){
                echo "<center><h1>Courses are successfully selected to $dept</h1></center>";
            }
        }
        else{
            echo "<center><h1>Something went Wrong</h1></center>";
        }
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
<form method="post" action="selection.php">
  <center><button name="button" class="save">close</button></center>
</form>
</body>
</html>