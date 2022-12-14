<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "shop";
$insert=false;
$update=false;
$delete=false;
$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("sorry failed to connect ".mysqli_connect_error());
}
if(isset($_GET['delete'])){
  $srno=$_GET['delete'];
  $delete=true;
  $sql="DELETE FROM `details` WHERE `srno` = $srno";
  $result = mysqli_query($conn,$sql);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['srnoEdit'])){
    $srno=$_POST["srnoEdit"];
    $medicine=$_POST["medicineEdit"];
    $expiry=$_POST["expiryEdit"];
    $quantity=$_POST["quantityEdit"];
    $remain=$_POST["remainEdit"];

    $sql = "UPDATE `details` SET `medicine` = '$medicine', `expiry` = '$expiry', `quantity` = '$quantity', `remain` = '$remain' WHERE `details`.`srno` = $srno;";
    $result = mysqli_query($conn,$sql);
    if($result){
      $update=true;
    }
    else{
      echo "Not update successfully";
    }
  }
  else{
    $medicine=$_POST['medicine'];
    $expiry=$_POST['expiry'];
    $quantity=$_POST['quantity'];
    $remain=$_POST['remain'];

    $sql = "INSERT INTO `details` ( `medicine`, `expiry`, `quantity`, `remain`) VALUES ( '$medicine', '$expiry', '$quantity', '$remain');";
    $result = mysqli_query($conn,$sql);

    if($result){
        $insert = true;
    }
    else{
        echo "The record was not saved successfully bcoz of error".mysqli_error($conn);
    }
  } 
}

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <title>Add Medicine</title>
    </head>
  <body>
  <!-- Button trigger modal
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
  Edit Modal
</button>  -->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/creator/db2.php"  method="POST">
      <div class="modal-body">
      <input type="hidden" name="srnoEdit" id="srnoEdit"> 
      <div class="form-group">
     <label for="medicine">Medicine Name</label>
     <input type="text" class="form-control" id="medicineEdit" name="medicineEdit" aria-describedby="emailHelp">
     </div>
     <div class="form-group">
     <label for="expiry">Batch</label>
     <input type="date" class="form-control" id="expiryEdit" name="expiryEdit" aria-describedby="emailHelp">
     </div>
     <div class="form-group">
     <label for="quantity">Quantity</label>
     <input type="number" class="form-control" id="quantityEdit" name="quantityEdit" aria-describedby="emailHelp">
     </div>
     <div class="form-group">
     <label for="remain">Remain</label>
     <input type="number" class="form-control" id="remainEdit" name="remainEdit" aria-describedby="emailHelp">
     </div>
      </div>
      <div class="modal-footer d-block mr-auto" >
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
 
<?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>??</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>??</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>??</span>
    </button>
  </div>";
  }
  ?>
  
<div class="container my-4">
<h2 style="text-align: center;">Medicine Inventory</h2>
<hr>
<form action="/creator/db2.php" method="POST">
  <div class="form-group">
    <label for="medicine">Medicine :</label>
    <input type="text" class="form-control" id="medicine" name="medicine" aria-describedby="emailHelp" placeholder="Medicine name">
  </div>
  <div class="form-group">
    <label for="expiry">Expiry :</label>
    <input type="date" class="form-control" id="expiry" name="expiry" aria-describedby="emailHelp" placeholder="Expiry Date..">
  </div>
  <div class="form-group">
    <label for="quantity">Quantity :</label>
    <input type="number" class="form-control" id="quantity" name="quantity" aria-describedby="emailHelp" placeholder="Quantity of medicine">
  </div>
  <div class="form-group">
    <label for="remain">Remain :</label>
    <input type="number" class="form-control" id="remain" name="remain" aria-describedby="emailHelp" placeholder="Remaining Quantity of medicine">
  </div>
  <button type="submit" class="btn btn-primary">Add Medicine</button>
  <a href="logout.php">Back</a>
</form>
</div>

<div class="container" >

<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Sr.no</th>
      <th scope="col">Medicine</th>
      <th scope="col">Expiry</th>
      <th scope="col">Quantity</th>
      <th scope="col">Remain</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php
$sql = "SELECT * FROM `details`";
$result = mysqli_query($conn,$sql);
$srno = 0;
while($row = mysqli_fetch_assoc($result)){
    $srno = $srno + 1;
    echo "<tr>
    <th scope='row'>". $srno . "</th>
    <td>". $row['medicine'] . "</td>
    <td>". $row['expiry'] . "</td>
    <td>". $row['quantity'] . "</td>
    <td>". $row['remain'] . "</td>
    <td><button class='edit btn btn-sm btn-primary' id=".$row['srno'].">Edit</button>  <button class='delete btn btn-sm btn-primary' id=d".$row['srno'].">Delete</button></td>
  </tr>";
    
}



?>
 </tbody>
   
</table>
<button onclick="myfunn()" style="background-color:  Dodgerblue; color: white;">Check For expiry</button> 
</div>
<hr>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );
    </script>
    <script>
    edits=document.getElementsByClassName('edit');
    Array.from(edits).forEach((elements)=>{
        elements.addEventListener("click",(e)=>{
            console.log("edit ");
            tr=e.target.parentNode.parentNode.parentNode.parentNode;
            medicine=tr.getElementsByTagName("td")[0].innerText;
            expiry=tr.getElementsByTagName("td")[1].innerText;
            quantity=tr.getElementsByTagName("td")[2].innerText;
            remain=tr.getElementsByTagName("td")[3].innerText;
            console.log(medicine,expiry,quantity,remain);
            medicineEdit.value=medicine;
            expiryEdit.value=expiry;
            quantityEdit.value=quantity;
            remainEdit.value=remain;
            srnoEdit.value=e.target.id;
            console.log(e.target.id)
            $('#editModal').modal('toggle');




        })


    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        srno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `/creator/db2.php?delete=${srno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>
  <script>
  function myfunn(){
    location.replace("expired.php");
  }
  </script>
  </body>
</html>
