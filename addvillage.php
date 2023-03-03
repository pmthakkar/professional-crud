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
  <li><a>Add Village</a></li>
  
</ul>

</body>
</html>

' ?>
<?php  
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){

}else{
  header("Location:login.php");
}
$insert = false;
$update = false;
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
  $sql = "DELETE FROM `villlages` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if (isset( $_POST['snoEdit'])){

    $sno = $_POST["snoEdit"];
    $vname = $_POST["vnameEdit"];
    $sname = $_POST["snameEdit"];
    $mname = $_POST["mnameEdit"];
    $l1 = $_POST["l1Edit"];
    $l2 = $_POST["l2Edit"];
    $l1 = $_POST["l3Edit"];
    $description = $_POST["descriptionEdit"];


  $sql = "UPDATE `villlages` SET `vname` = '$vname' , `sname` = '$sname' , `mname` = '$mname' , `l1` = '$l1' , `l2` = '$l2' ,`l3` = '$l3' ,  `description` = '$description' WHERE `villlages`.`sno` = $sno";
  $result = mysqli_query($conn, $sql);
  if($result){
    $update = true;
}
else{
    echo "We could not update the record successfully";
}
}
else{
    $vname = $_POST["vname"];
    $sname = $_POST["sname"];
    $mname = $_POST["mname"];
    $l1 = $_POST["l1"];
    $l2 = $_POST["l2"];
    $l3 = $_POST["l3"];
    $description = $_POST["description"];


  // Sql query to be executed
  $sql = "INSERT INTO `villlages` (`vname`, `sname`, `mname`, `l1`, `l2`, `l3`, `description`) VALUES ('$vname', '$sname', '$mname', '$l1', '$l2', '$l3', '$description');";
  $result = mysqli_query($conn, $sql);
  header("Location:village detail.php");
   
  if($result){ 
      $insert = true;
  }
  else{
      echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
  } 
}
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Add Village Detail</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
	margin: 0;
	padding: 0;
}
    form {

        grid-template-columns: 1fr;
        gap: 2rem;
        max-width: 500px;
        margin: 0 auto;
    }

    @media screen and (min-width: 768px) {
        form {
            grid-template-columns: 1fr 1fr;
        }
    }

    label {
        font-weight: bold;
        margin-top: 2px;
    }

    input {
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1rem;
        margin-top: 2px;
    }

    #sbm {
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 0.5rem;
        cursor: pointer;
        max-width: 500px;
        margin-top: 5px;
    }
    
    </style>
</head>

<body>
    
    <?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>


    <div class="container my-4">
        <center>
            <h2>Add a Village Detail</h2>
        </center>
        <form action="" method="POST">
        <div>
                <label>Village</label>
                <select name="vname" id="vname" class="form-control" aria-label="Village Name" required>
                    <option class="form-control" selected>
                        <center>Select Your Village</center>
                    </option>
                    <option value="Motirav">Moti Rav</option>
                    <option value="Adesar">Adesar</option>
                    <option value="Chitrod">Chitrod</option>
                    <option value="Balasar">Balasar</option>
                    <option value="Lodrani">Lodrani</option>
                </select>
            </div><br>
            <div class="form-group">
                <label for="title">Sarpanch Name</label>
                <input type="text" class="form-control" placeholder="Enter Sarpanch Name" id="sname" name="sname"
                    aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="title">Mantri Name</label>
                <input type="text" class="form-control" placeholder="Enter Mantri Name" id="mname" name="mname"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="title">Leader-1</label>
                <input type="text" class="form-control" placeholder="Enter Leader-1 Name" id="l1" name="l1"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="title">Leader-2</label>
                <input type="text" class="form-control" placeholder="Enter Leader-2 Name" id="l2" name="l2"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="title">Leader-3 </label>
                <input type="text" class="form-control" placeholder="Enter Leader-3 Name" id="l3" name="l3"
                    aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="desc">Village Description</label>
                <textarea class="form-control" placeholder="Enter Village Description" id="description"
                    name="description" rows="3"></textarea>
            </div>
            <button type="submit" name="submit" id="sbm" class="btn btn-primary">Add</button>

        </form>
    </div>
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
            vname = tr.getElementsByTagName("td")[0].innerText;
            sname = tr.getElementsByTagName("td")[1].innerText;
            mname = tr.getElementsByTagName("td")[2].innerText;
            l1 = tr.getElementsByTagName("td")[3].innerText;
            l2 = tr.getElementsByTagName("td")[4].innerText;
            l3 = tr.getElementsByTagName("td")[5].innerText;
            description = tr.getElementsByTagName("td")[6].innerText;
            console.log(vname, sname, mname, l1, l2, l3, description);
            vnameEdit.value = vname;
            snameEdit.value = sname;
            mnameEdit.value = mname;
            l1Edit.value = l1;
            l2Edit.value = l2;
            l3Edit.value = l3;
            descriptionEdit.value = description;
            snoEdit.value = e.target.id;
            console.log(e.target.id)
            $('#editModal').modal('toggle');
        })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ");
            sno = e.target.id.substr(1);

            if (confirm("Are you sure you want to delete this note!")) {
                console.log("yes");
                window.location = `village detail.php?delete=${sno}`;

            } else {
                console.log("no");
            }
        })
    })
    </script>

</body>

</html>