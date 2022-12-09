<html>
<head>
<title>Expired Medicines</title>
</head>
<body>
<h2 style="text-align: center;">The List Of Expired and Non-Expired Medicines Are : </h2>
</html>
<style>
h2{
    text-shadow: 2px 2px 5px yellow;
}
button[type=submit] {
  background-color:  Dodgerblue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
</style>




<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "shop";
$conn = mysqli_connect($servername,$username,$password,$database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT srno,medicine,expiry FROM details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc() ) {
        $sr=$row["srno"];
        $name=$row["medicine"];
        $expire=$row["expiry"];
        $date1=date("Y-m-d");
        $dr=strtotime($date1);
        $date2=date("$expire");
        $dt=strtotime($date2);
        if(($dr) == ($dt) || ($dr) > ($dt)){
        echo "<br> srno: ". $row["srno"]. " - Medicine name: ". $row["medicine"]. " ". " whose expiry date Is :- " . $row["expiry"] ."  ->    The given medicine Is  EXPIRED". "<br>" ."<br>";
        continue;
        }
        else{
            echo "<br> srno: ". $row["srno"]. " - Medicine name: ". $row["medicine"]. " ". " whose expiry date Is :- " . $row["expiry"]  ."  ->    The given medicine is not expired"."<br>";
            continue;
        }
    }
}else {
    echo "0 results";
}

$conn->close();
?>

<button type="submit" onclick="myfun()">Go Back</button>
<script>
function myfun(){
    location.replace("db2.php");
}
</script>