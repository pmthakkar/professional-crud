
<?php
$server="localhost";
$username = "root";
$password="";
$database = "first";

$conn= mysqli_connect($server,$username,$password,$database);
if (!$conn){
    die("Error". mysqli_connect_error());
}

?>
<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
   
        $sql = "SELECT * FROM `login` WHERE username='$username';";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num==1){
            while($row=mysqli_fetch_assoc($result)){
                if($password==$row['password']){

                  $login = true;
                  session_start();
                  $_SESSION['loggedin'] = true;
                  $_SESSION['username'] = $username;
                  header("location: dashbord.php");
                }
                else{
                  $showError = "invalid credentials";
              }
            }
    }
    
}
    
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
}

.container {
  width: 100%;
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: none;
  border-radius: 5px;
  background-color: #f2f2f2;
}

button[type="submit"] {
  display: block;
  width: 100%;
  padding: 10px;
  margin-top: 20px;
  border: none;
  border-radius: 5px;
  background-color: #4CAF50;
  color: #fff;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
}

@media only screen and (max-width: 600px) {
  .container {
    padding: 10px;
  }
  
  input[type="text"],
  input[type="password"] {
    padding: 5px;
  }
  
  button[type="submit"] {
    padding: 5px;
  }
}
</style>
  </head>
  <body>
    
    
    <div class="container my-4">
      <h3 class = "text-center my-4">Login to CRM</h3>
      <center><div class="container" id="crn">
    <form action="login.php" method="post">
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control-sm" id="username" name="username" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control-sm" id="password" name="password">
  </div>

  <button type="submit" id="bbtt" class="btn btn-primary">Login</button>
</form>
</center>
</div>
</div>
<script>
      login=document.getElementById('bbtt');
      login.addEventListener("click", () => {
        username=document.getElementById('username').value;
      if (username==""){
        alert("Please Enter Your User Name");
      }
      password=document.getElementById('password').value;
      if(password==""){
        alert("Please Enter Your Password");
      }
    })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>