<?php
if(isset($_POST['username'])){
   $servername = "localhost";
   $username = "root";
   $password = "";
   $database = "pharm";
   $c=0;
   $update=0;
   $conn = mysqli_connect($servername,$username,$password,$database);
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpass = $_POST['confirmpassword'];
    $sql = "SELECT id,username FROM register";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc() ) {
        $sr=$row["id"];
        $uname=$row["username"];
        if(($uname) == ($username) && ($password) == ($confirmpass)){
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
      $sql="UPDATE `register` SET `password` = '$password' WHERE `register`.`id` = $sr";
      $result = mysqli_query($conn,$sql);
    if($result){
      $update=true;
    }
    else{
      echo "Not update successfully";
    }
    }

    if($update){
  
      header("Location: login.php"); 
      exit;
    }
    
$conn->close();
}
?>





<!DOCTYPE html>
<html>
<head>
<title>Change Password</title>
</head>
<body>
<script>
  function myfun(){
  var x = document.getElementById("inputUname4");
  var y =  document.getElementById("pass1");
  var z =  document.getElementById("pass2");
   if(y.value.trim() == ""){
    alert("Please Enter Valid Username");
    return false;
     }
    else if(z.value.trim() == ""){
     alert("Please Enter Password");
     return false;
        }
    else if(y.value != z.value){
     alert("Please Enter Password");
     return false;
        }
     else{
      return true;
        }
}
</script>
<img class="image" src="https://image.freepik.com/free-vector/caduceus-medical-symbol-abstract-geometric-with-medicine-science-concept-background_41814-395.jpg">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<h2>Change Password Here <i class='fas fa-pills' style='font-size:36px'></i></h2>
<hr>
<form onsubmit="return myfun()" action="forgot.php" method="post">
  <div class="form-row">
  <div class="form-group">
      <input type="text" class="form-control" name= "username" id="inputUname4" placeholder="Enter Username..." >
    </div>
    <br>
    <div class="form-group">
      <input type="password" class="form-control" name= "password" id="pass1" placeholder="New Password..." >
    </div>
    <br>
    <div class="form-group ">
      <input type="password" class="form-control" name="confirmpassword" id="pass2"  placeholder="Confirm Password..." >
    </div>
    <br>
    <button type="submit" value="Submit">Submit</button>
  </div>
</form>
</body>
</html>
<style>
.form-row{
  height:350px;
  width:600px;
  padding: 12px 20px;
  margin-top: 100px;
  margin-left: 500px;
  margin-bottom: 10px;
  display: inline-block;
  border: 5px solid mediumseagreen;
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
  color: orange;
}

button[type=submit]:hover {
  background-color: purple;
}
.image{
    width: 100%;
    position: absolute;
    z-index: -1;
    opacity: 0.6;
}

</style>


<!--
  function myfun(){
  var x = document.getElementById("pass1");
  var y =  document.getElementById("pass2");
  var t = x.value.length;
   if(x.value.trim() == "" || t<3 || t>6 ){
    alert("Please Enter Valid Username");
    return false;
     }
    else if(y.value.trim() == ""){
     alert("Please Enter Password");
     return false;
        }
     else if(x.value != y.value){
      alert("Confirm Password not match with new password");
      return false;
        }
        else{
            alert("Success!Your Password has changed");
            return true;
        }
}


<script>
function myfun(){
  var x = document.getElementById("inputUname4");
  var y =  document.getElementById("pass1");
  var z =  document.getElementById("pass2");
   if(x.value.trim() == ""){
    alert("Please Enter Valid Username");
    return false;
     }
    else if(y.value.trim() == ""){
     alert("Please Enter Password");
     return false;
        }
    else if(y.value != z.value){
      alert("Confirm Password not match with new password");
      return false;
     else{
      return true;
        }
}
</script>   

-->