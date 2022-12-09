<?php
if(isset($_POST['username'])){
   $servername = "localhost";
   $username = "root";
   $password = "";
   $database = "pharm";
   $c=0;
   $conn = mysqli_connect($servername,$username,$password,$database);
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT id,username,password FROM register";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc() ) {
        $sr=$row["id"];
        $uname=$row["username"];
        $pass=$row["password"];
        if(($uname) == ($username) && ($pass) == ($password)){
        $c=1;
        break;
        }
        else{
            continue;
        }
    }
    }else {
    echo "0 results";
    }


    if($c){
      header("Location: logout.php"); 
      exit;
    }
    
$conn->close();
}
?>










<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
</head>
<body>
<script>
function myfun(){
  var x = document.getElementById("inputUname4");
  var y =  document.getElementById("inputPass4");
   if(x.value.trim() == ""){
    alert("Please Enter Valid Username");
    return false;
     }
    else if(y.value.trim() == ""){
     alert("Please Enter Password");
     return false;
        }
     else{
      return true;
        }
}
</script>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>   
<img class="image" src="https://c1.wallpaperflare.com/preview/839/207/808/pill-tablet-pharmacy-medicine.jpg">
<h2>Login Here <i class='fas fa-pills' style='font-size:36px'></i></h2>
<hr>
<form onsubmit="return myfun();" action="login.php" autocomplete="off" method="post">
  <div class="form-row">
    <div class="form-group">
      <input type="text" class="form-control" name= "username" id="inputUname4" placeholder="Enter your Username..." >
    </div>
    <br>
    <div class="form-group ">
      <input type="password" class="form-control" name="password" id="inputPass4"  placeholder="Enter your Password..." >
    </div>
    <br>
    <button type="submit" value="Submit">Log In</button>
    <p style="text-align: center;"> <a href="forgot.php">Forgot Password ?</a> </p>
    <br><br>
  <p id="demo" style="text-align: center;"><strong>Don't Have An Account ? </strong><a href="registration.php">Sign Up</a> </p>
  </div>
</form>
</body>
</html>
<style>
.form-row{
  height:300px;
  width:600px;
  padding: 12px 20px;
  margin-top: 100px;
  margin-left: 500px;
  margin-bottom: 10px;
  display: inline-block;
  border: 5px solid orange;
  border-radius: 4px;
  box-sizing: border-box;
 }
 .form-control{
  height:50px;
  width:550px;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 5px solid lightgray;
  border-radius: 4px;
  box-sizing: border-box;
}
button[type=submit] {
  height:50px;
  width:550px;
  background-color:  Dodgerblue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
h2{
  text-align: center;
  color: red;
}

button[type=submit]:hover {
  background-color: purple;
}
body,.image{
    width: 100%;
    position: absolute;
    z-index: -1;
    opacity: 1;
}
#demo{
  height: 50px;
  width: 580px;
  padding: 10px 0px 10px 0px;
  border: solid;
  display: inline-block;
  border: 5px solid orange;
  border-radius: 4px;
  box-sizing: border-box;
}
a{
  text-decoration: none;
}
</style>



<!--
  https://previews.123rf.com/images/samarttiw/samarttiw1504/samarttiw150400069/39538149-medical-background-and-icons-to-treat-patients-.jpg
  https://i.pinimg.com/736x/47/a3/d0/47a3d0090826ddb473ac1afefbafe575.jpg
  -->