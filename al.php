<?php
include("config.php");
if(isset($_POST['input'])){
  $input = $_POST['input'];
   $query = "SELECT * FROM `villlages` WHERE `vname` LIKE '{$input}%' or `sname` LIKE '{$input}%'  or `mname` LIKE '{$input}%'  or `l1` LIKE '{$input}%'  or `l2` LIKE '{$input}%'  or `l3` LIKE '{$input}%'  or `description` LIKE '{$input}%'"; 
   $result = mysqli_query($conn,$query);
   if(mysqli_num_rows($result) > 0){?>
    <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Village Name</th>
                    <th scope="col">Sarpanch Name</th>
                    <th scope="col">Mantri Name</th>
                    <th scope="col">Leader-1</th>
                    <th scope="col">Leader-2</th>
                    <th scope="col">Leader-3</th>
                    <th scope="col">Description</th>
                    
                </tr>
            </thead>
            <tbody>
         <?php while($row = mysqli_fetch_assoc($result)){
            $sno = $row['sno'];
            $vname = $row['vname'];
            $sname = $row['sname'];
            $mname = $row['mname'];
            $l1 = $row['l1'];
            $l2 = $row['l2'];
            $l3 = $row['l3'];
            $description = $row['description'];
            ?>
            <tr>
            
            <td><?php echo $sno;?></td>
            <td><?php echo $vname;?></td>
            <td><?php echo $sname;?></td>
            <td><?php echo $mname;?></td>
            <td><?php echo $l1;?></td>
            <td><?php echo $l2;?></td>
            <td><?php echo $l3;?></td>
            <td><?php echo $description;?></td>
          
            <td><button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button> <button class='view btn btn-sm btn-primary' id=".$row['sno'].">View</button>  </td>
          </tr>
          <?php
         }?>
          </tbody>
        </table>
        <?php
   }else{
    echo"no data found";
   }
}
        
?>

