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
  <li><a href="user detail.php">Villagers Detail</a></li>
  <li><a>Edit Villagers Detail</a></li>
  
</ul>

</body>
</html>

'?>
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

    $name = $_POST["nameEdit"];
    $phone = $_POST["phoneEdit"];
    $gender = $_POST["genderEdit"];
    $comm = $_POST["commEdit"];
    $tags = $_POST["tagsEdit"];
    $vname = $_POST["vnameEdit"];
    $designation = $_POST["designationEdit"];
    
    $face = $_POST["faceEdit"];
    $insta = $_POST["instaEdit"];
    $youtube = $_POST["youtubeEdit"];
    $result=false;
    
    
    if (isset($_POST['submit']) && isset($_FILES['imageEdit'])) {
	
        $img_name = $_FILES['imageEdit']['name'];
        $img_size = $_FILES['imageEdit']['size'];
        $tmp_name = $_FILES['imageEdit']['tmp_name'];
        $error = $_FILES['imageEdit']['error'];
    
        if ($error === 0) {
            if ($img_size > 5000000) {
                $em = "Sorry, your file is too large.";
                echo '<script>alert("'.$em.'")</script>';
            }else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
    
                $allowed_exs = array("jpg", "jpeg", "png"); 
    
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = 'camera/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
    
    
                    $sql = "UPDATE `user` SET `name` = '$name' , `phone` = '$phone' ,`gender`='$gender', `comm` = '$comm' , `tags` = '$tags' ,`vname` = '$vname' ,  `designation` = '$designation',`image` = '$new_img_name' ,`face` = '$face' ,`insta` = '$insta' ,`youtube` = '$youtube' WHERE `user`.`sno` = $sno";
                    $result = mysqli_query($conn, $sql);
                    header("Location:user detail.php");
                }
            }
        }
    else{
                    $sql = "UPDATE `user` SET `name` = '$name' , `phone` = '$phone' ,`gender`='$gender', `comm` = '$comm' , `tags` = '$tags' ,`vname` = '$vname' ,  `designation` = '$designation',`face` = '$face' ,`insta` = '$insta' ,`youtube` = '$youtube' WHERE `user`.`sno` = $sno";
                    $result = mysqli_query($conn, $sql);
                    header("Location:user detail.php");
                }

                    if($result){
                      $update = true;
                  }
                  else{
                      echo "We could not update the record successfully";
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
    <script src="js/jquery.min.js"></script>

    <title>Edit Villagers Detail</title>
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

    <center><button><a href="village detail.php">Home</a></button></center>
    <div class="container my-4" id="bdy">
        <?php
        $sno=$_GET['update'];
        $sql = "SELECT * FROM `user` WHERE sno='$sno'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){ 
            
        echo' <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <input type="hidden" name="snoEdit" id="snoEdit">
                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" class="form-control" value="'.$row['name'].'" id="nameEdit" name="nameEdit" placeholder="Enter Your Name"
                        aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                <label for="title">Phone no</label>
                <input type="text" class="form-control" id="phoneEdit" value="'.$row['phone'].'" name="phoneEdit" placeholder="Enter Your Phone No"
                    maxlength="10" aria-describedby="emailHelp">
            </div>';
            $gender=$row['gender'];
            if($gender=="male"){
            echo'<div>
                <label for="password"><b>Gender :</b></label>
                <input type="radio" id="male" name="genderEdit" value="male" checked>
                <label for="html">Male</label>
                <input type="radio" id="female" name="genderEdit" value="female">
                <label for="css">Female</label>
                <input type="radio" id="other" name="genderEdit" value="other">
                <label for="javascript">Other</label>
            </div>';
            }
            else if($gender=="female"){
            echo'<div>
                <label for="password"><b>Gender :</b></label>
                <input type="radio" id="male" name="genderEdit" value="male">
                <label for="html">Male</label>
                <input type="radio" id="female" name="genderEdit" value="female" checked>
                <label for="css">Female</label>
                <input type="radio" id="other" name="genderEdit" value="other">
                <label for="javascript">Other</label>
            </div>';
            }
            else {
            echo '<div>
                <label for="password"><b>Gender :</b></label>
                <input type="radio" id="male" name="genderEdit" value="male">
                <label for="html">Male</label>
                <input type="radio" id="female" name="genderEdit" value="female">
                <label for="css">Female</label>
                <input type="radio" id="other" name="genderEdit" value="other" checked>
                <label for="javascript">Other</label>
            </div>';
            }
            
           echo '<div class="form-group">
                <label for="title">Reference</label>
                <input type="text" class="form-control" id="commEdit" name="commEdit" value="'. $row['comm'] .'" placeholder="Enter Your Reference"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="title">Tags</label>
                <input type="text" class="form-control" id="tagsEdit" value="'. $row['tags'] .'" name="tagsEdit" placeholder="Enter Tags"
                    aria-describedby="emailHelp" multiple data-role="tagsinput">
            </div>';
            echo'<script>
                $("#tagsEdit").tagsinput({
                    confirmKeys: [13, 44],
                    maxTags: 20
                });
                </script>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                <link rel="stylesheet"
                    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js">
                </script>
                <script src="custom_tags_input.js"></script>';
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
            $designation=$row['designation'];
            if($designation=="Sarpanch"){
           echo' <div>
                <label for="password">Designation</label>
                <select aria-label="Your Designation" class="form-control" name="designationEdit" id="designationEdit">
                    <option class="form-control">Select Your Designation</option>
                    <option value="Sarpanch" selected>Sarpanch</option>
                    <option value="Mantri">Mantri</option>
                    <option value="Leader">Leader</option>
                    <option value="Businessman">Businessman</option>
                    <option value="Farmer">Farmer</option>
                </select>
            </div><br>';}
            if($designation=="Mantri"){
           echo' <div>
                <label for="password">Designation</label>
                <select aria-label="Your Designation" class="form-control" name="designationEdit" id="designationEdit">
                    <option class="form-control" selected>Select Your Designation</option>
                    <option value="Sarpanch">Sarpanch</option>
                    <option value="Mantri" selected>Mantri</option>
                    <option value="Leader">Leader</option>
                    <option value="Businessman">Businessman</option>
                    <option value="Farmer">Farmer</option>
                </select>
            </div><br>';}
            if($designation=="Leader"){
           echo' <div>
                <label for="password">Designation</label>
                <select aria-label="Your Designation" class="form-control" name="designationEdit" id="designationEdit">
                    <option class="form-control" selected>Select Your Designation</option>
                    <option value="Sarpanch">Sarpanch</option>
                    <option value="Mantri">Mantri</option>
                    <option value="Leader" selected>Leader</option>
                    <option value="Businessman">Businessman</option>
                    <option value="Farmer">Farmer</option>
                </select>
            </div><br>';}
            if($designation=="Businessman"){
           echo' <div>
                <label for="password">Designation</label>
                <select aria-label="Your Designation" class="form-control" name="designationEdit" id="designationEdit">
                    <option class="form-control" selected>Select Your Designation</option>
                    <option value="Sarpanch">Sarpanch</option>
                    <option value="Mantri">Mantri</option>
                    <option value="Leader">Leader</option>
                    <option value="Businessman" selected>Businessman</option>
                    <option value="Farmer">Farmer</option>
                </select>
            </div><br>';}
            if($designation=="Farmer"){
           echo' <div>
                <label for="password">Designation</label>
                <select aria-label="Your Designation" class="form-control" name="designationEdit" id="designationEdit">
                    <option class="form-control" selected>Select Your Designation</option>
                    <option value="Sarpanch">Sarpanch</option>
                    <option value="Mantri">Mantri</option>
                    <option value="Leader">Leader</option>
                    <option value="Businessman">Businessman</option>
                    <option value="Farmer" selected>Farmer</option>
                </select>
            </div><br>';}
            echo'<div class="form-group">
                <label for="title">Enter Your Picture</label>
                <input type="file" class="form-control" id="imageEdit" name="imageEdit" aria-describedby="emailHelp">
            </div>
            <img src="camera/'. $row['image'].'" width="100" height="100">
            <div class="form-group">
                <label for="title">Facebook</label>
                <input type="text" class="form-control" value="'. $row['face'] .'" placeholder="Enter Your Facebook Link" id="faceEdit" name="faceEdit"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="title">Intagram</label>
                <input type="text" class="form-control" value="'. $row['insta'] .' " placeholder="Enter Your Instagram Link" id="instaEdit" name="instaEdit"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="title">Youtube</label>
                <input type="text" class="form-control" value="'. $row['youtube'] .' " placeholder="Enter Your Youtube" id="youtubeEdit" name="youtubeEdit"
                    aria-describedby="emailHelp">
            </div>


            </div>

            <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
            </form>';}
            ?>


</body>

</html>