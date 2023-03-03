<?php
echo '<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="user detail.php">Villagers Detail</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="adduser.php">Add Villager</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="addvillage.php">Add Village</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="village detail.php">Village Detail</a>
      </li>
      
      

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Village Name
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="detail.php?village=Motirav">Moti Rav</a></li>
          <li><a class="dropdown-item" href="detail.php?village=Lodrani">Lodrani</a></li>
          <li><a class="dropdown-item" href="detail.php?village=Balasar">Balasar</a></li>
          <li><a class="dropdown-item" href="detail.php?village=Chitrod">Chitrod</a></li>
          <li><a class="dropdown-item" href="detail.php?village=Adesar">Adesar</a></li>
          
        </ul>
      </li>
      <button><a href="logout.php">Logout</a></button>
    </ul>
  </div>
</div>
</nav>';
?>