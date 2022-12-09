<!DOCTYPE html>
<html>
<head>
<title>Open Dashboard</title>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style>
body {
  font-family: "Lato", monospace;
}

.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: black;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: slategray;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: mintcream;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: black;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: yellowgreen;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
  background-color: cyan;
}
.logi{
  cursor: pointer;
}
h1{
  text-align: center;
  font-size: 50px;
  font-style: italic;
  cursor: default;
}

img{
width: 100%;
position: absolute;
z-index: -1;
opacity: 1;

}
</style>
</head>
<body>
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="home.php">Home <i class='fas fa-user-friends'></i></a>
  <hr>
  <a href="db2.php" >Medicine Inventory <i class='fas fa-medkit'></i></a>
  <hr>
  <a href="new 2.html" >Stock Of Day <i class='fas fa-laptop-medical'></i></a>
  <hr>
  <a href="about.html">About Us <i class='far fa-id-card'></i></a>
  <hr>
  <a  onclick="log()" class="logi">Logout  <i class='fas fa-power-off'></i></a>
  <hr>
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">☰ Open Dashboard</button>
  <h1>Welcome To Pharmacy Store!</h1> 
  <img src="https://wallpaperaccess.com/full/1621424.jpg"> 
  
</div>
<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "270px";
  document.getElementById("main").style.marginLeft = "270px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
function log(){
  var r = confirm("Are You Sure Want To logout ?");
  if(r == true){
    location.replace("login.php");
  }

}
</script>
   
</body>
</html> 





<!--
<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <title>navigation bar</title>
  </head>
  <body>
    <div class="wrapper">
      <input type="checkbox" id="btn" hidden>
      <label for="btn" class="menu-btn">
        <i class="fas fa-bars"></i>
        <i class="fas fa-times"></i>
      </label>
      <nav id="sidebar">
        <div class="title">
 Menu</div>
<ul class="list-items">
<li><a href="#">Home</a></li>
<li><a href="#">My account</a></li>
<li><a href="db2.php">Medicine Inventory</a></li>
<li><a href="#">Stock of week</a></li>
<li><a href="about.html">About us</a></li>
<li><a href="login.php">Logout</a></li>
</ul>
</nav>
    </body>
</html>
<style>

@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
.wrapper{
  height: 100%;
  width: 300px;
  position: relative;
}
.wrapper .menu-btn{
  position: absolute;
  left: 10px;
  top: 10px;
  background: #fff;
  color: #fff;
  height: 45px;
  width: 45px;
  z-index: 10000;
  border: 1px solid #333;
  border-radius: 5px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
}
#btn:checked ~ .menu-btn{
  left: 247px;
}
.wrapper .menu-btn i{
  position: absolute;
  transform: ;
  font-size: 23px;
  transition: all 0.3s ease;
}
.wrapper .menu-btn i.fa-times{
  opacity: 1;
}
#btn:checked ~ .menu-btn i.fa-times{
  opacity: 1;
  transform: rotate(-180deg);
}
#btn:checked ~ .menu-btn i.fa-bars{
  opacity: 0;
  transform: rotate(180deg);
}
#sidebar{
  position: fixed;
  background: #404040;
  height: 100%;
  width: 270px;
  overflow: hidden;
  left: -270px;
  transition: all 0.3s ease;
}
#btn:checked ~ #sidebar{
  left: 0;
}
#sidebar .title{
  line-height: 65px;
  text-align: center;
  background: #333;
  font-size: 25px;
  font-weight: 600;
  color: #f2f2f2;
  border-bottom: 1px solid #222;
}
#sidebar .list-items{
  position: relative;
  background: #404040;
  width: 100%;
  height: 100%;
  list-style: none;
}
#sidebar .list-items li{
  padding-left: 40px;
  line-height: 50px;
  border-top: 1px solid rgba(255,255,255,0.1);
  border-bottom: 1px solid #333;
  transition: all 0.3s ease;
}
#sidebar .list-items li:hover{
  border-top: 1px solid transparent;
  border-bottom: 1px solid transparent;
  box-shadow: 0 0px 10px 3px #222;
}
#sidebar .list-items li:first-child{
  border-top: none;
}
#sidebar .list-items li a{
  color: #f2f2f2;
  text-decoration: none;
  font-size: 18px;
  font-weight: 500;
  height: 100%;
  width: 100%;
  display: block;
}
#sidebar .list-items li a i{
  margin-right: 20px;
}
#sidebar .list-items .icons{
  width: 100%;
  height: 40px;
  text-align: center;
  position: absolute;
  bottom: 100px;
  line-height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
}
#sidebar .list-items .icons a{
  height: 100%;
  width: 40px;
  display: block;
  margin: 0 5px;
  font-size: 18px;
  color: #f2f2f2;
  background: #4a4a4a;
  border-radius: 5px;
  border: 1px solid #383838;
  transition: all 0.3s ease;
}
#sidebar .list-items .icons a:hover{
  background: #404040;
}
.list-items .icons a:first-child{
  margin-left: 0px;
}
.content{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  color: #202020;
  z-index: -1;
  width: 100%;
  text-align: center;
}
.content .header{
  font-size: 45px;
  font-weight: 700;
}
.content p{
  font-size: 40px;
  font-weight: 700;
}
<img src="https://c0.wallpaperflare.com/preview/661/131/640/pharmacist-pharmacy-medicine-man.jpg">
echo '<script>alert("Username Is Not Valid Do Register First Please")</script>';
</style>
-->