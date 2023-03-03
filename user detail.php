<?php require 'navbar.php';
echo'

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="extnl.css">
</head>
<body>

<ul class="breadcrumb">
  <li><a href="dashbord.php">Home</a></li>
  <li><a>Villagers Detail</a></li>
  
</ul>

</body>
</html>

' ?>
<?php  
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){

}else{
  header("Location:login.php");
}?>
<?php
$insert = false;
$update= false;
$delete = false;

$servername = "localhost";
$username = "root";
$password = "";
$database = "first";


$conn = mysqli_connect($servername, $username, $password, $database);


if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}


if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `user` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
  
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if (isset( $_POST['snoEdit'])){
  
      $sno = $_POST["snoEdit"];
      $name = $_POST["nameEdit"];
      $phone = $_POST["phoneEdit"];
      $comm = $_POST["commEdit"];
      $tags = $_POST["tagsEdit"];
      $vname = $_POST["vnameEdit"];
      $designation = $_POST["designationEdit"];
      $image = $_POST["imageEdit"];
      $face = $_POST["faceEdit"];
      $insta = $_POST["instaEdit"];
      $youtube = $_POST["youtubeEdit"];
  }


else{
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $comm = $_POST["comm"];
    $tags = $_POST["tags"];
    $vname = $_POST["vname"];
    $designation = $_POST["designation"];
    $image = $_POST["image"];
    $face = $_POST["face"];
    $insta = $_POST["insta"];
    $youtube = $_POST["youtube"];


  
    $sql = "INSERT INTO `user` (`name`, `phone`, `gender`, `comm`, `tags`, `vname`, `designation`, `image`, `face`, `insta`, `youtube`) VALUES ('$name', '$phone', '$gender', '$comm', '$tags', '$vname', '$designation', '$image', '$face', '$insta', '$youtube');";
  $result = mysqli_query($conn, $sql);

   
  if($result){ 
      $insert = true;
  }
  else{
      echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
  } 

}}

?>
<?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
<?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <title>Villagers Detail</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    table {
        border:2px solid black;
  width: 100%;
  border-collapse: collapse;
}



tbody {
  display: block;
  width: 100%;
  overflow-x: auto;
  white-space: nowrap;
  
}

td, th {
  padding: 0.5rem;
  text-align: left;
  border:1px solid black;
}


  tbody {
    display: table-row-group;
    overflow-x: hidden;
    white-space: normal;
  }
  
  tr {
    display: table-row;
    text-align: center;
  
  }
  
  td, th {
    display: table-cell;
    padding: 0.75rem;
    text-align: center;
  }
  
  button{
    margin: 2px;
    display: inline-block;
    text-align: center;
  }


    </style>
</head>

<body>

<div class="container my-4">
    <center>
        <h1>Villagers Detail</h1>
        
    </center>

    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Name</th>
                <th scope="col">Phone no</th>
                <th scope="col">Gender</th>
                <th scope="col">Reference</th>
                
                <th scope="col">Village</th>
                <th scope="col">Designation</th>
                <th scope="col">image</th>

                <th scope="col">Actions</th>

            </tr>
        </thead>
        <tbody>
            <?php 
          $sql = "SELECT * FROM `user`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". ucfirst($row['name']) . "</td>
            <td>". ucfirst($row['phone']) . "</td>
            <td>". ucfirst($row['gender']) . "</td>
            <td>". ucfirst($row['comm']) . "</td>
            
            <td>". ucfirst($row['vname']) . "</td>
            <td>". ucfirst($row['designation']) . "</td>
            <td><img src='camera/".$row['image']."' width='100' height='100'></td>
            <td> <button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button> <button class='view btn btn-sm btn-primary' id=".$row['sno'].">View</button>  </td>
          </tr>";
        } 
          ?>


        </tbody>
    </table>
    </div>
    </div>
    <hr>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();

    });
    </script>
    <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ");
            tr = e.target.parentNode.parentNode;

            console.log(e.target.id)
            var sno = e.target.id;
            window.location = `useredit.php?update=${sno}`;
            // $('#editModal').modal('toggle');
        })
    })
    view = document.getElementsByClassName('view');
    Array.from(view).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ");
            tr = e.target.parentNode.parentNode;

            console.log(e.target.id)
            var sno = e.target.id;
            window.location = `userview.php?view=${sno}`;

        })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ");
            sno = e.target.id.substr(1);

            if (confirm("Are you sure you want to delete this note!")) {
                console.log("yes");
                window.location = `user detail.php?delete=${sno}`;

            } else {
                console.log("no");
            }
        })
    })
    </script>

</body>

</html>