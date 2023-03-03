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
  <li><a>Add Villager</a></li>
  
</ul>

</body>
</html>

' ;?>
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
  $sql = "DELETE FROM `user` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    // echo "<pre>";
    // print_r($_POST);
    // exit();
  $name = $_POST["name"];
  $phone = $_POST["phone"];
  $gender = $_POST["gender"];
  $comm = $_POST["comm"];
  $tags = $_POST["tags"];
  $vname = $_POST["vname"];
  $designation = $_POST["designation"];
  $face = $_POST["face"];
  $insta = $_POST["insta"];
  $youtube = $_POST["youtube"];
  if (isset($_POST['submit']) && isset($_FILES['image'])) {
	
    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];

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


                $sql = "INSERT INTO `user` (`name`, `phone`, `gender`, `comm`, `tags`, `vname`, `designation`, `image`, `face`, `insta`, `youtube`) VALUES ('$name', '$phone', '$gender', '$comm', '$tags', '$vname', '$designation', '$new_img_name', '$face', '$insta', '$youtube');";
                $result = mysqli_query($conn, $sql);
header("Location:user detail.php");

}else {
$em = "You can't upload files of this type";
echo '<script>alert("'.$em.'")</script>';
}
}
}else {
$em = "unknown error occurred in file upload!";
echo '<script>alert("'.$em.'")</script>';
}
}
 }

?>

<!doctype html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Add Villagers Detail</title>
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
        text-align: center;
        font-weight: bold;
        margin: 5px;
    }

    input {
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1rem;
        margin: 5px;
    }


    nav {

        top: 0;
        width: 100%;

    }

    #sbm {
        margin-top: 5px;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 0.5rem;
        cursor: pointer;
    }
    </style>
</head>

<body>

    <div class="container my-4" id="bdy">
        <form action="" method="POST" id="prog" enctype="multipart/form-data">
            <h2>Add Villagers Detail</h2>
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="title">Phone no</label>
                <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone No"
                    aria-describedby="emailHelp">
            </div>
            <script>
            const textarea = document.getElementById('phone');

            textarea.addEventListener('input', event => {
                if (event.target.value.length > 10) {
                    alert("You can only enter 10 digit number")
                }

            });
            </script>
            <div>
                <label for="password"><b>Gender :</b></label>
                <input type="radio" id="male" name="gender" value="male">
                <label for="html">Male</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="css">Female</label>
                <input type="radio" id="other" name="gender" value="other">
                <label for="javascript">Other</label>
            </div>
            <div class="form-group">
                <label for="title">Reference</label>
                <input type="text" class="form-control" id="comm" name="comm" placeholder="Enter Your Reference"
                    aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="title">Tags</label>
                <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter Tags"
                    aria-describedby="emailHelp" multiple data-role="tagsinput">
            </div>
                <script>
                $('#tags').tagsinput({
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
                <script src="custom_tags_input.js"></script>
                <div>
                    <label for="password">Village</label>
                    <select name="vname" class="form-control" aria-label="Village Name">
                        <option class="form-control" selected>
                            <center>Select Your Village</center>
                        </option>
                        <option value="Motirav">Moti Rav</option>
                        <option value="Adesar">Adesar</option>
                        <option value="Chitrod">Chitrod</option>
                        <option value="Balasar">Balasar</option>
                        <option value="Lodrani">Lodrani</option>
                    </select>
                </div>
                <div>
                    <label for="password">Designation</label>
                    <select aria-label="Your Designation" class="form-control" name="designation">
                        <option class="form-control" selected>Select Your Designation</option>
                        <option value="Sarpanch">Sarpanch</option>
                        <option value="Mantri">Mantri</option>
                        <option value="Leader">Leader</option>
                        <option value="Businessman">Businessman</option>
                        <option value="Farmer">Farmer</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Enter Your Picture</label>
                    <input type="file" class="form-control" id="image" name="image" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="title">Facebook</label>
                    <input type="text" class="form-control" placeholder="Enter Your Facebook Link" id="face" name="face"
                        aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="title">Intagram</label>
                    <input type="text" class="form-control" placeholder="Enter Your Instagram Link" id="insta"
                        name="insta" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="title">Youtube</label>
                    <input type="text" class="form-control" placeholder="Enter Your Youtube" id="youtube" name="youtube"
                        aria-describedby="emailHelp">
                </div>
                <button type="submit" id="sbm" name="submit" class="btn btn-primary">Add</button>

        </form>
    </div>
    </div>
</body>

</html>