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
  <li><a>Home</a></li>
  
  
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
$servername = "localhost";
$username = "root";
$password = "";
$database = "first";


$conn = mysqli_connect($servername, $username, $password, $database);


if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Dashboard Design</title>
    <style>
    .btn {
        position: absolute;
        bottom: 1px;
        width: 30%;
        margin-left: 90px;

    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .search-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    .search-container input {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid black;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
    }

    .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
    }

    .card {
        background-color: #fff;
        padding: 20px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
    }
    </style>
</head>

<body>

    <h1>Welcome to your CRM</h1>
    <div class="container">
        <div class="search-container">
            <input type="text" placeholder="Search..." id="search">
        </div>
        <div id="searchr"></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script>
        $(document).ready(function() {
            $("#search").keyup(function(){
                var input = $(this).val();
                // alert(input);
                if(input != ""){
                    $.ajax({
                       url:"al.php",
                       method:"POST",
                       data:{input:input},

                       success:function(data){
                        $("#searchr").html(data);
                       }
                    });
                }else{
                    $("searchr").css("display","none");
                }

            });
        });
        </script>
        <div class="card-container">
            <div class="card">
                <h2>Villagers Detail</h2>
                <p>Here we are providing detail about Villager like their name,gender and their village name..</p>
                <a href="user detail.php" class="btn btn-primary">Click Here</a>
            </div>
            <div class="card">
                <h2>Village Detail</h2>
                <p>Here we providing detail about Villages like sarpanch name,mantri name and leader's name</p>
                <a href="village detail.php" class="btn btn-primary">Click Here</a>
            </div>
            <div class="card">
                <h2>Add Villager</h2>
                <p>From here you can Add Villager Details</p>
                <a href="adduser.php" class="btn btn-primary">Click Here</a>
            </div>
            <div class="card">
                <h2>Add Village</h2>
                <p>From here you can Add Village Details</p>
                <a href="addvillage.php" class="btn btn-primary">Click Here</a>
            </div>
        </div>
    </div>
</body>

</html>