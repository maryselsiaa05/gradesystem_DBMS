<?php
error_reporting(0);
session_start();
$conn = mysqli_connect("localhost","root","","grade");
if(!$conn){
  die("Error : ".mysqli_connect_error());
}
$sql = "SELECT * from department";
$result = mysqli_query($conn,$sql);
mysqli_close($conn);
if(isset($_POST["dept"])){
  $conn = mysqli_connect("localhost","root","","grade");
  $value = $_POST["dept"];
  $_SESSION["dept"] = $value;
  $sql = "SELECT * from course where dept_id='$value';";
  $result_get = mysqli_query($conn,$sql);
  $sql = "SELECT * from department where dept_id='$value';";
  $result_got = mysqli_fetch_assoc(mysqli_query($conn,$sql));
  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Selection</title>
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

.aside{
    width:30%;
    padding-bottom: 100px;
    background-color: ;
}

.aside h1{
    text-align: center;
    margin-top: 20px;
}

.content{
    width: 70%;
    padding-bottom: 100px;
    background-color: ;
    border-left: 2px solid rgba(0,0,0,0.2);
}

.content h1{
    text-align: center;
}

footer{
    font-size: 10px;
    bottom:0px;
}

footer h2{
  float: right;
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
  width: 90%;
  font-size: 17px;
  border-radius: 10px;
  border: 3px solid #0367fd;
  background: none;
}

.options:hover{
  border: 3px solid #ffc400ec;
}

.options:active{
  border: 3px solid #ffc400ec;
}

.content ul{
  position: absolute;
  width: 65%;
  padding-bottom: 50px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.content ul li{
  list-style: none;
  position: relative;
  padding: 20px 20px;
  border: 3px solid #ffc400ec;
  border-radius: 10px;
  top: 20px;
  left: 20px;
  cursor: pointer;
  width: 80%;
}

.content ul li:hover{
  border: 3px solid #0367fd;
}

.content ul li label{
  font-size: 18px;
  color: black;
  padding-left: 90px;
  cursor: pointer;
}

.content ul li label input{
  opacity: 0;
  cursor: pointer;
}

.check{
  position: absolute;
  top: 20px;
  left: 50px;
  width: 20px;
  height: 20px;
  background: #000;
  display: block;
  box-sizing: border-box;
  border-radius: 4px;
}

.check:before{
  content: '';
  position: absolute;
  top: 3px;
  bottom: 3px;
  right: 3px;
  left: 3px;
  background: transparent;
  border-radius: 2px;
  transition: 0.5s;
  transform: translateX(40px);
}

.content ul li label input:checked ~ .check:before{
  background: #adff00;
  box-shadow: 0 0 15px #adff00;
  transform: translateX(0);
}

.save{
  border-radius: 10px;
  color: #fff;
  background: #036;
  width: 90px;
  height:45px;
  font-size:15px;
}

.save_btn{
  top: 1.5vh;
  right: 2vh;
  position: absolute;
  top:10px;
}

.head{
  margin-top: 30px;
  margin-bottom: 40px;
}

</style>
</head>
<body>
    <div class="topnav">
        <img src="user.jpg" class="ele">
        <h1 class="ele admin">ADMIN</h1>   
        
          <div class="save_btn">
            <input type="submit" class="save" name="get" value="Save" form="together">
          </div>
        
    </div>

    <div class="content-area">
        <div class="aside">
          <h1>Department</h1>
            <form method='post' action="">
              <ul class="select_option">
                <!-- <li><button class="options" id="" name="dept" value="get">GET</button></li> -->
                <?php
                while($row=mysqli_fetch_assoc($result)){
                  $dept_name = $row["dept_name"];
                  $dept_id = $row["dept_id"];
                  echo '<li><button class="options" name="dept" value="'.$dept_id.'" onclick="">'.$dept_name.'</button></li>';
                }
                ?>
                <!-- <li><button class="options" name="dept" value="submit">SUBMIT</button></li>  -->
              </ul>  
            </form>
        </div>
        <div class="content">
          <h1 class="head"><?php echo $result_got["dept_name"]; ?></h1>
          <form method="post" id="together" action="update_selected.php">
          <ul>
            <!-- <li>
              <label>List Item 1
              <input type="checkbox" name="">
              <span class="check"></span>
              </label>
            </li> -->
          <?php
          if(isset($_POST["dept"])){
            while($row=mysqli_fetch_assoc($result_get)){
              echo '<li>';
              echo '<label>'.$row["course_name"];
              echo '<input type="checkbox" value="'.$row["course_id"].'" name="group[]">';
              echo '<span class="check"></span>';
              echo '</label>';
              echo '</li>';
              echo '<br>';              
            }
          }
          ?>
          </ul>
          </form>
        </div>
        <div class="last">
        </div>
    </div>

    <footer>
        <h2>&copy; Copyrights Reserved.</h2>
    </footer>
</body>

</html>