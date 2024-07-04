<?php
session_start();
try{
    $conn = mysqli_connect("localhost","root","","grade");
    $dept = $_SESSION["dept_entry1"];
    $sql = "SELECT * from students where dept_id='$dept';";
    $stu = mysqli_query($conn,$sql);
    $check = 0;
    while($row=mysqli_fetch_assoc($stu)){
        $reg_no = $row["reg_no"];
        $course_id = $_SESSION["course"];
        $se1 = $_POST[$row["reg_no"]][0];
        $se2 = $_POST[$row["reg_no"]][1];
        $end = $_POST[$row["reg_no"]][2];
        if($se1!=null && $se2!=null && $end!=null){
            $sql = "DELETE from marks where course_id='$course_id' and reg_no='$reg_no'";
            $del_row = mysqli_query($conn,$sql);
            if($del_row){
                $total = ($se1/2)+($se2/2)+($end/2);
                $grade = grade($total);
                $sql = "INSERT into marks values('$course_id','$reg_no',$se1,$se2,$end,$total,'$grade');";
                $row = mysqli_query($conn,$sql);
                if(!$row){
                    echo "<center><h1>Something Went Wrong to Update the Marks..</h1></center>";
                    break;
                }
            }
            else{
                $sql="SELECT name from students where reg_no='$reg_no';";
                $name = mysqli_fetch_assoc(mysqli_query($conn,$sql));
                echo "<center><h1>ALERT : Can't able to upload the mark of ".$name["name"]."</h2></center>";
            }
        }
        else{
            $check = $check+1;
            $sql = "SELECT name from students where reg_no='$reg_no';";
            $name = mysqli_fetch_assoc(mysqli_query($conn,$sql));
            echo "<center><h2>CHECK : Incomplete Column has found in ".$name["name"]."</h2></center>";
        }
    }
    if($check==0){
        echo "<center><h1> Marks are Uploaded</h1></center>";
    }
    mysqli_close($conn);
}
catch(Exception $e){
    echo $e;
}

function grade($total){
    if($total>=90){
        return 'S';
    }
    else if($total>=80 and $total<90){
        return 'A';
    }
    else if($total>=70 and $total<80){
        return 'B';
    }
    else if($total>=60 and $total<70){
        return 'C';
    }
    else if($total>=50 and $total<60){
        return 'D';
    }
    else if($total>=40 and $total<50){
        return 'E';
    }
    else if($total<40){
        return 'F';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mark Entry</title>
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
<form method="post" action="entry.php">
  <center><button name="button" class="save">close</button></center>
</form>
</body>
</html>