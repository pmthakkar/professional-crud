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
  <li><a href="village detail.php">Village Detail</a></li>
  <li><a>Edit Village Detail</a></li>
  
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


$servername = "localhost";
$username = "root";
$password = "";
$database = "first";


$conn = mysqli_connect($servername, $username, $password, $database);


if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

$sno=$_GET['update'];
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $vname = $_POST["vnameEdit"];
    $sname = $_POST["snameEdit"];
    $mname = $_POST["mnameEdit"];
    $l1 = $_POST["l1Edit"];
    $l2 = $_POST["l2Edit"];
    $l3 = $_POST["l3Edit"];
    $description = $_POST["descriptionEdit"];
    $sql = "UPDATE `villlages` SET `vname` = '$vname' , `sname` = '$sname' , `mname` = '$mname' , `l1` = '$l1' , `l2` = '$l2' ,`l3` = '$l3' ,  `description` = '$description' WHERE `villlages`.`sno` = $sno";
    $result = mysqli_query($conn, $sql);
    header("Location:village detail.php");
    if($result){
      $update = true;
  }
  else{
      echo "We could not update the record successfully";
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
    <title>Edit Village Detail</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
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
    }

    input {
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1rem;
    }

    button {
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 0.5rem;
        cursor: pointer;
    }
    </style>
</head>

<body>
<div class="container my-4">
        <?php
        $sno=$_GET['update'];
        $sql = "SELECT * FROM `villlages` WHERE sno='$sno'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){ 
            echo'<form action="" method="POST">';
            $vname=$row['vname'];
            if($vname=="Motirav"){
            echo'<div>
                <label for="password">Village</label>
                <select name="vnameEdit" id="vnameEdit"  class="form-control" aria-label="Village Name">
                    <option class="form-control">
                        <center>Select Your Village</center>
                    </option>
                    <option value="Motirav" selected>Moti Rav</option>
                    <option value="Adesar">Adesar</option>
                    <option value="Chitrod">Chitrod</option>
                    <option value="Balasar">Balasar</option>
                    <option value="Lodrani">Lodrani</option>
                </select>
            </div><br>';}
            if($vname=="Adesar"){
            echo'<div>
                <label for="password">Village</label>
                <select name="vnameEdit" id="vnameEdit"  class="form-control" aria-label="Village Name">
                    <option class="form-control">
                        <center>Select Your Village</center>
                    </option>
                    <option value="Motirav">Moti Rav</option>
                    <option value="Adesar" selected>Adesar</option>
                    <option value="Chitrod">Chitrod</option>
                    <option value="Balasar">Balasar</option>
                    <option value="Lodrani">Lodrani</option>
                </select>
            </div><br>';}
            if($vname=="Chitrod"){
            echo'<div>
                <label for="password">Village</label>
                <select name="vnameEdit" id="vnameEdit"  class="form-control" aria-label="Village Name">
                    <option class="form-control">
                        <center>Select Your Village</center>
                    </option>
                    <option value="Motirav">Moti Rav</option>
                    <option value="Adesar">Adesar</option>
                    <option value="Chitrod" selected>Chitrod</option>
                    <option value="Balasar">Balasar</option>
                    <option value="Lodrani">Lodrani</option>
                </select>
            </div><br>';}
            if($vname=="Balasar"){
            echo'<div>
                <label for="password">Village</label>
                <select name="vnameEdit" id="vnameEdit"  class="form-control" aria-label="Village Name">
                    <option class="form-control">
                        <center>Select Your Village</center>
                    </option>
                    <option value="Motirav">Moti Rav</option>
                    <option value="Adesar">Adesar</option>
                    <option value="Chitrod">Chitrod</option>
                    <option value="Balasar" selected>Balasar</option>
                    <option value="Lodrani">Lodrani</option>
                </select>
            </div><br>';}
            if($vname=="Lodrani"){
            echo'<div>
                <label for="password">Village</label>
                <select name="vnameEdit" id="vnameEdit"  class="form-control" aria-label="Village Name">
                    <option class="form-control">
                        <center>Select Your Village</center>
                    </option>
                    <option value="Motirav">Moti Rav</option>
                    <option value="Adesar">Adesar</option>
                    <option value="Chitrod">Chitrod</option>
                    <option value="Balasar">Balasar</option>
                    <option value="Lodrani" selected>Lodrani</option>
                </select>
            </div><br>';}
            echo'<div class="form-group">
                <label for="title">Sarpanch Name</label>
                <input type="text" class="form-control" value="'.$row['sname'].'" placeholder="Enter Sarpanch Name" id="snameEdit" name="snameEdit"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="title">Mantri Name</label>
                <input type="text" class="form-control" value="'.$row['mname'].'" placeholder="Enter Mantri Name" id="mnameEdit" name="mnameEdit"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="title">Leader-1</label>
                <input type="text" class="form-control" value="'.$row['l1'].'" placeholder="Enter Leader-1 Name" id="l1Edit" name="l1Edit"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="title">Leader-2</label>
                <input type="text" class="form-control" value="'.$row['l2'].'" placeholder="Enter Leader-2 Name" id="l2Edit" name="l2Edit"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="title">Leader-3 </label>
                <input type="text" class="form-control" value="'.$row['l3'].'" placeholder="Enter Leader-3 Name" id="l3Edit" name="l3Edit"
                    aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="desc">Village Description</label>
                <textarea class="form-control" placeholder="Enter Village Description" id="descriptionEdit"
                    name="descriptionEdit" rows="3">'.$row['description'].'</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>';}
?>

</body>
        </html>