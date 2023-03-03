<?php require 'navbar.php';
?>
<?php 
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){

}else{
  header("Location:login.php");
} 

$servername = "localhost";
$username = "root";
$password = "";
$database = "first";


$conn = mysqli_connect($servername, $username, $password, $database);


if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>View Village Detail</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    form {
        
        grid-template-columns: 1fr;
        gap: 2rem;
        max-width: 600px;
        margin: 50px auto;
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
        background-color:grey;
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
        $village=$_GET['village'];
        $sql = "SELECT * FROM `villlages` WHERE vname='$village'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){ 
            $vname=$row['vname'];
            if($vname=="Motirav"){
            echo'<form>
            <div>
                <label for="password">Village</label>
                <select name="vnameEdit" id="vnameEdit"  class="form-control" aria-label="Village Name" disabled>
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
            echo'<form><div>
                <label for="password">Village</label>
                <select name="vnameEdit" id="vnameEdit"  class="form-control" aria-label="Village Name" disabled>
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
            echo'<form><div>
                <label for="password">Village</label>
                <select name="vnameEdit" id="vnameEdit"  class="form-control" aria-label="Village Name" disabled>
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
            echo'<form><div>
                <label for="password">Village</label>
                <select name="vnameEdit" id="vnameEdit"  class="form-control" aria-label="Village Name" disabled>
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
            echo'<form><div>
                <label for="password">Village</label>
                <select name="vnameEdit" id="vnameEdit"  class="form-control" aria-label="Village Name" disabled>
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
                    aria-describedby="emailHelp" readonly>
            </div>
            <div class="form-group">
                <label for="title">Mantri Name</label>
                <input type="text" class="form-control" value="'.$row['mname'].'" placeholder="Enter Mantri Name" id="mnameEdit" name="mnameEdit"
                    aria-describedby="emailHelp" readonly>
            </div>
            <div class="form-group">
                <label for="title">Leader-1</label>
                <input type="text" class="form-control" value="'.$row['l1'].'" placeholder="Enter Leader-1 Name" id="l1Edit" name="l1Edit"
                    aria-describedby="emailHelp" readonly>
            </div>
            <div class="form-group">
                <label for="title">Leader-2</label>
                <input type="text" class="form-control" value="'.$row['l2'].'" placeholder="Enter Leader-2 Name" id="l2Edit" name="l2Edit"
                    aria-describedby="emailHelp" readonly>
            </div>
            <div class="form-group">
                <label for="title">Leader-3 </label>
                <input type="text" class="form-control" value="'.$row['l3'].'" placeholder="Enter Leader-3 Name" id="l3Edit" name="l3Edit"
                    aria-describedby="emailHelp" readonly>
            </div>

            <div class="form-group">
                <label for="desc">Village Description</label>
                <textarea class="form-control" placeholder="Enter Village Description" id="descriptionEdit"
                    name="descriptionEdit" rows="3" readonly>'.$row['description'].'</textarea>
            </div>
        </form><hr>';}
?>

</body>
        </html>