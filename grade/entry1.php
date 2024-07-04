<?php
session_start();
$conn = mysqli_connect("localhost","root","","grade");
if(!$conn){
    die("Error : ".mysqli_connect_error());
}
$sql = "SELECT * from department";
$result = mysqli_query($conn,$sql);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mark Entry</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

.topnav,footer{
    position: fixed;
    background-color: #000;
    color: white;
    overflow:hidden;
    width: 100%;
    z-index: 1;
}

.topnav{
    height: 70px;
}

.ele{
    float: left;
    text-align: center;
    padding: 14px 16px;
    font-size: 17px;
}

img{
    height: 100%;
    width: 80px;
    border-radius: 50%;
}

.admin{
    margin-top: 10px;
}

.content-area{
    display: flex;
    padding-top: 70px;
    z-index: -1;
}

footer{
    font-size: 10px;
    bottom:0px;
}

footer h2{
  float: right;
}

.head{
    width:100%;
    padding-bottom: 100px;
    text-align:center;
    background-color: ;
}

.head h1{
    margin-top: 50px;
    background-color:;
}

.list{
    padding: 30px;
}

.select_option{
  list-style: none;
  margin-top: 7vh;
  background-color: ;
}

.select_option li{
  padding: 2vh 5vh;
  display:flex;
  justify-content: center;
}

.options{
  padding: 15px;
  width: 40%;
  font-size: 17px;
  border-radius: 10px;
  border: 3px solid #0367fd;
  background: none;
  cursor: pointer;
}

.options:active{
  border: 3px solid #ffc400ec;
}

</style>
</head>
<body>
    <div class="topnav">
        <img src="user.jpg" class="ele">
        <h1 class="ele admin">ADMIN</h1>           
    </div>

    <div class="content-area">
        <div class="head">
            <h1>Choose Department</h1>
            <form method='post' action="">
                <ul class="select_option">
                    <?php
                    while($row=mysqli_fetch_assoc($result)){
                    $dept_name = $row["dept_name"];
                    $dept_id = $row["dept_id"];
                    echo '<li><button type="submit" class="options" name="dept" value="'.$dept_id.'" onclick="">'.$dept_name.'</button></li>';
                    }
                    if(isset($_POST["dept"])){
                        $_SESSION["dept_entry1"] = $_POST["dept"];
                        $conn = mysqli_connect("localhost","root","","grade");
                        header("location:entry.php");
                    }
                    ?>
                </ul>
            </form>
        </div>
    </div>  

    <footer>
        <h2>&copy; Copyrights Reserved.</h2>
    </footer>
</body>