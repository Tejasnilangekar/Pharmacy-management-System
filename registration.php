<?php
if(isset($_POST['username'])){
   $server = "localhost";
   $username = "root";
   $password = "";
   $c=false;
   $con = mysqli_connect($server,$username,$password);

   if(!$con){
       die("connection to the database failed".mysqli_connect_error());
   }

   $username = $_POST['username'];
   $password = $_POST['password'];
   $email = $_POST['email'];
   $city = $_POST['city'];
   $state = $_POST['state'];


   $sql ="INSERT INTO `pharm`. `register` ( `username`, `password`, `email`, `city`, `state`, `date`) VALUES ( '$username', '$password', '$email', '$city', '$state', current_timestamp());";
   // echo $sql;

   if($con->query($sql) == true){
     $c = true;
   }
   else{
       echo  " ERROR: $sql <br> $con->error";
   }

   $con->close();

}
  

?>


<!DOCTYPE html>
<html>
<head>
<title>User Registration</title>
</head>
<body>
<script>
function myfun(){
  var x = document.getElementById("inputUname4");
  var y =  document.getElementById("inputPass4");
  var z = document.getElementById("inputPassword4");
  var a =document.getElementById("inputCity4");
  var b =document.getElementById("inputState4");
  var regx1= /^([a-zA-Z]{4,9})([@#?!$%^&*]{1,2})([0-9]{3,4})$/;
  var regx2 = /^([a-zA-Z0-9\.-]+)@([a-z[a-zA-Z0-9-]+).([a-z]{2,8})(.[a-z]{2,8})$/;
   if(x.value.trim() == ""){
    alert("Please Enter Valid Username");
    return false;
     }
    else if(regx1.test(y.value) != true){
    alert("Please Enter Correct Password as mention in form  otherwise it will be considered as invalid");
    return false;
      }
        else if(regx2.test(z.value) != true){
          alert("Please Enter Your Email With Correct Pattern");
          return false;
        }
        else if(a.value.trim() == ""){
            alert("Please Enter City Name");
            return false;
        }
        else if(b.value.trim() == ""){
        alert("Please Enter State Name");
        return false;
        }
     else{
      return true;
        }
}
</script>   
<img id="demo" src="https://img.freepik.com/free-psd/medical-capsules-mock-up-top-view_23-2148478002.jpg?size=626&ext=jpg"> 
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<h2>Register Here <i class='fas fa-clinic-medical' style='font-size:36px'></i></h2>
<hr>
<form onsubmit="return myfun();" action="registration.php" autocomplete="off" method="post">
  <div class="form-row">
    <div class="form-group">
      <input type="text" class="form-control" name= "username" id="inputUname4" placeholder="Enter your Username..." >
    </div>
    <br>
    <div class="form-group ">
      <input type="password" class="form-control" name="password" id="inputPass4"  placeholder="Create your Password..." >
    </div>
    <br>
    <div class="form-group ">
      <input type="email" class="form-control" name="email" id="inputPassword4"  placeholder="Enter your Email..." >
    </div>
    <br>
    <div class="form-group ">
      <input type="text" class="form-control" id="inputCity4" name="city"  placeholder="Enter your City Name...">
    </div>
    <br>
    <div class="form-group ">
      <input type="text" class="form-control" id="inputState4" name="state" placeholder="Enter your State Name..." >
    </div>
  <button type="submit">Submit</button>
  <p style="text-align: center;">Already Register ? <a href="login.php">Log In</a></p>
  <hr>
  <br>
  <p><strong>Note For Password :</strong>
  <li>At least 8 characters—the maximum of 15 characters, the better</li>
  <li>A mixture of both uppercase and lowercase letters</li>
  <li> Inclusion of at least one special character, e.g., ! @ # ? ]</li>
  <li>A mixture of numbers atleast 2 at end after using special characters</li>
   <li>do not use < or > in your password, as both can cause problems in Web browsers</li></p>
  </div>
</form>
</body>
</html>
<?php
$s=false;
if($c==true){
  echo '<script>"Done"</script>';
  $s=true;
}
?>


<?php
if($s==true){
  header("Location: login.php"); 
  exit;
}
?>


<style>
.form-row{
  height:750px;
  width:600px;
  padding: 12px 20px;
  
  margin-left: 450px;
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
#demo{
width: 100%;
position: absolute;
z-index: -1;
opacity: 0.2;
}
a{
  text-decoration: none;
}
</style>
