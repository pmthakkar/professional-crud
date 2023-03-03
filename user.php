<?php  

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
if (isset( $_POST['snoEdit'])){

    $sno = $_POST["snoEdit"];
    $name = $_POST["nameEdit"];
    $phone = $_POST["phoneEdit"];
    $comm = $_POST["commEdit"];
    $tags = $_POST["tagsEdit"];
    $village = $_POST["villageEdit"];
    $designation = $_POST["designationEdit"];
    $image = $_POST["imageEdit"];
    $face = $_POST["faceEdit"];
    $insta = $_POST["instaEdit"];
    $youtube = $_POST["youtubeEdit"];


    $sql = "UPDATE `user` SET `name` = '$name' , `phone` = '$phone' , `comm` = '$comm' , `tags` = '$tags' ,`village` = '$village' ,  `designation` = '$designation',`image` = '$image' ,`face` = '$face' ,`insta` = '$insta' ,`youtube` = '$youtube' WHERE `user`.`sno` = $sno";
  $result = mysqli_query($conn, $sql);
  if($result){
    $update = true;
}
else{
    echo "We could not update the record successfully";
}
}
else{
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $comm = $_POST["comm"];
    $tags = $_POST["tags"];
    $village = $_POST["village"];
    $designation = $_POST["designation"];
    $image = $_POST["image"];
    $face = $_POST["face"];
    $insta = $_POST["insta"];
    $youtube = $_POST["youtube"];


  
    $sql = "INSERT INTO `user` (`name`, `phone`, `comm`, `tags`, `village`, `designation`, `image`, `face`, `insta`, `youtube`) VALUES ('$name', '$phone', '$comm', '$tags', '$village', '$designation', '$image', '$face', '$insta', '$youtube');";
  $result = mysqli_query($conn, $sql);

   
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
    <title>Village Detail</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0 bd-example">

    
    
    
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Detail</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="title">Name</label>
              <input type="text" class="edit" id="nameEdit" name="nameEdit" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="title">Phone no</label>
              <input type="text" class="edit" id="phoneEdit" name="phoneEdit" aria-describedby="emailHelp">
            </div>
            
            <div class="form-group">
              <label for="title">Community</label>
              <input type="text" class="edit" id="commEdit" name="commEdit" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="title">Tags</label>
              <input type="text" class="edit" id="tagsEdit" name="tagsEdit" aria-describedby="emailHelp">
            </div>
            <div>
                            <label for="password" class="edit">Village</label>
                            <select class="form-select" name="villageEdit" aria-label="Village Name">
                                <option selected>Select Your Village</option>
                                <option value="Motirav">Moti Rav</option>
                                <option value="Adesar">Adesar</option>
                                <option value="Chitrod">Chitrod</option>
                                <option value="Balasar">Balasar</option>
                                <option value="Lodrani">Lodrani</option>
                            </select>
                        </div><br>
                        <div>
                            <label for="password" class="edit">Designation</label>
                            <select class="form-select" aria-label="Your Designation" name="designationEdit">
                                <option selected>Select Your Designation</option>
                                <option value="Sarpanch">Sarpanch</option>
                                <option value="Mantri">Mantri</option>
                                <option value="Leader">Leader</option>
                                <option value="Businessman">Businessman</option>
                                <option value="Farmer">Farmer</option>
                            </select>
                        </div><br>
            <div class="form-group">
              <label for="title">Enter Your Picture</label>
              <input type="file" class="edit" id="imageEdit" name="imageEdit" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="title">Facebook</label>
              <input type="text" class="edit" id="faceEdit" name="faceEdit" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="title">Intagram</label>
              <input type="text" class="edit" id="instaEdit" name="instaEdit" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="title">Youtube</label>
              <input type="text" class="edit" id="youtubeEdit" name="youtubeEdit" aria-describedby="emailHelp">
            </div>
            
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
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
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
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
  <div class="container my-4">
    <h2>Add a Villagers Detail</h2>
    <form action="" method="POST">
    <div class="form-group">
              <label for="title">Name</label>
              <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="title">Phone no</label>
              <input type="text" class="form-control" id="phone" name="phone" aria-describedby="emailHelp">
            </div>
        
            <div class="form-group">
              <label for="title">Community</label>
              <input type="text" class="form-control" id="comm" name="comm" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="title">Tags</label>
              <input type="text" class="form-control" id="tags" name="tags" aria-describedby="emailHelp">
            </div>
            <div>
                            <label for="password" class="form-control">Village</label>
                            <select class="form-select" name="village" aria-label="Village Name">
                                <option selected>Select Your Village</option>
                                <option value="Motirav">Moti Rav</option>
                                <option value="Adesar">Adesar</option>
                                <option value="Chitrod">Chitrod</option>
                                <option value="Balasar">Balasar</option>
                                <option value="Lodrani">Lodrani</option>
                            </select>
                        </div><br>
                        <div>
                            <label for="password" class="form-control">Designation</label>
                            <select class="form-select" aria-label="Your Designation" name="designation">
                                <option selected>Select Your Designation</option>
                                <option value="Sarpanch">Sarpanch</option>
                                <option value="Mantri">Mantri</option>
                                <option value="Leader">Leader</option>
                                <option value="Businessman">Businessman</option>
                                <option value="Farmer">Farmer</option>
                            </select>
                        </div><br>
            <div class="form-group">
              <label for="title">Enter Your Picture</label>
              <input type="file" class="form-control" id="image" name="image" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="title">Facebook</label>
              <input type="text" class="form-control" id="face" name="face" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="title">Intagram</label>
              <input type="text" class="form-control" id="insta" name="insta" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="title">Youtube</label>
              <input type="text" class="form-control" id="youtube" name="youtube" aria-describedby="emailHelp">
            </div>
      <button type="submit" class="btn btn-primary">Add</button>
    </form>
  </div>

  <div class="container my-4">


    <table class="table" id="myTable">
      <thead>
      <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone no</th>
                    <th scope="col">Community</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Village</th>
                    <th scope="col">Designation</th>
                    <th scope="col">image</th>
                    <th scope="col">Facebook</th>
                    <th scope="col">Instagram</th>
                    <th scope="col">Youtube</th>
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
            <td>". $row['name'] . "</td>
            <td>". $row['phone'] . "</td>
            <td>". $row['comm'] . "</td>
            <td>". $row['tags'] . "</td>
            <td>". $row['village'] . "</td>
            <td>". $row['designation'] . "</td>
            <td>". $row['image'] . "</td>
            <td>". $row['face'] . "</td>
            <td>". $row['insta'] . "</td>
            <td>". $row['youtube'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button>  </td>
          </tr>";
        } 
          ?>


      </tbody>
    </table>
  </div>
  <hr>
  
  
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>
  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        name = tr.getElementsByTagName("td")[0].innerText;
            phone = tr.getElementsByTagName("td")[1].innerText;
            comm = tr.getElementsByTagName("td")[2].innerText;
            tags = tr.getElementsByTagName("td")[3].innerText;
            village = tr.getElementsByTagName("td")[4].innerText;
            designation = tr.getElementsByTagName("td")[5].innerText;
            image = tr.getElementsByTagName("td")[6].innerText;
            face = tr.getElementsByTagName("td")[7].innerText;
            insta = tr.getElementsByTagName("td")[8].innerText;
            youtube = tr.getElementsByTagName("td")[9].innerText;
            console.log(name, phone, comm, tags, village, designation, image, face,
                insta, youtube);
            nameEdit.value = name;
            phoneEdit.value = phone;
            commEdit.value = comm;
            tagsEdit.value = tags;
            villageEdit.value = village;
            designationEdit.value = designation;
            imageEdit.value = image;
            faceEdit.value = face;
            instaEdit.value = insta;
            youtubeEdit.value = youtube;
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
          window.location = `user.php?delete=${sno}`;
          
        }
        else {
          console.log("no");
        }
      })
    })
    </script>
    
  </body>
</html>