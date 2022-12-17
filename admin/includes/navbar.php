<?php 
if($_SERVER['REQUEST_URI'] !="/bootstrab/regester.php"){
    
 
?>

<div style="position:absolute ; width: auto; z-index:4; left:20px; top:73px; " class="row mt-3 d-md-none d-lg-none">

  
<button  id="nav-btn" class="main-btn rounded" onclick="" ><i id="nav-btn-icon" class="fa-solid fa-bars"></i></button>


</div>

<?php
}else{
}
    
?>  
<div style="
    width: 100%;
">
<?php

include('db.php');
?>
<nav class="navbar navbar-expand sticky-top">
  <div class="container">
  <a class="btn" href="index.php">
    <h1 style="color: #a3c7d6 ;">admin panel</h1>
  </a>
    <button
      class="navbar-toggler"
      type="button" 
      data-bs-toggle="collapse" 
      data-bs-target="#navbarNavDropdown" 
      aria-controls="navbarNavDropdown" 
      aria-expanded="false" 
      aria-label="Toggle navigation">

      <i class="fa-solid fa-bars"></i>

    </button>
    <div class="collapse navbar-collapse nv " id="navbarNavDropdown">
      
      
      <div class="position-absolute end-0 pe-1">
      <div class="ps-1 d-flex justify-content-end align-middle">
      <?php
    

?>
   
      
  
    

    
    <?php 
    if(isset($_SESSION['name']) and isset($_SESSION['picture'])and $_SESSION['picture'] != NULL ){
      
      echo('<div class="text-center ms-auto" >
      <a href="profile_card.php">
      <img src="../users-images/'.$_SESSION['picture'].'"  class="rounded-circle c_profile_pic">
      </a>
      </div>
      <div class="d-none d-md-flex align-items-center ps-3 text-center  text-light d-flex">'.$_SESSION['name'].'</div>');
      echo '<a class="d-none d-md-flex align-items-center rounded-pill btn  ms-3 me-1  c-section" href="logout.php" type="button" >logout</a>';

    }
    else{
      if(isset($_SESSION['name']) and  !isset($_SESSION['picture'])){
        echo('
        <div class="text-center " >
        <a href="profile_card.php">
        <img src="../imgs/avatar.png" alt="Avatar" class="rounded-circle c_profile_pic">
        </a>
        </div>
        <div class="d-none d-md-flex align-items-center ps-3 text-center  text-light">'.$_SESSION['name'].'</div>');
        echo '<a class="d-none d-md-flex align-items-center rounded-pill btn  ms-3 me-1 c-section" href="logout.php" type="button" >logout</a>';
        
      }
      else{
        if(isset($_SESSION['name'])){
          
          echo'<div class="text-center " ><a href="profile_card.php"><img src="../imgs/avatar.png" alt="Avatar" class="me-1 rounded-circle c_profile_pic"></a></div>';
          echo '<div class="d-none d-md-flex align-items-center ps-3 text-center text-light ">'.$_SESSION['name'].'</div>';
          echo '<a class="d-none d-md-flex align-items-center rounded-pill btn  ms-3 me-1 c-section" href="logout.php" type="button" >logout</a>';
      }
      else{
        echo'<div class="text-center " ><img src="../imgs/avatar.png" alt="Avatar" class="rounded-circle c_profile_pic"></div>';
        if($_SERVER['REQUEST_URI']!='/bootstrab/login.php'){
          echo '<a class="d-none d-md-flex align-items-center rounded-pill btn  ms-3  c-section" href="login.php" type="button" >login</a>';
        }
      }
    }}
    ?>
    

  </div>
      </div>
      
  </div>
  </div>
</nav>

</div>



