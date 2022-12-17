<?php 
if($_SERVER['REQUEST_URI'] !="/bootstrab/regester.php"){
    
 
?>

<div style="position:absolute ; width: auto; z-index:2; left:20px; top:73px; " class="row d-md-none d-lg-none">

  
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
  <a class="navbar-brand" href="index.php"><img src="imgs/shoppy2.png" alt=""></a>
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
      <ul class="navbar-nav  nv">
        <li class="nav-item ms-3">
          <a class="nav-link active p-lg-3" aria-current="page" href="index.php"><i class="fa-solid fa-house"></i></a>
        </li>
        <li class="nav-item ms-3">
          <a class="nav-link p-lg-3" href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
        </li>
        <li class="nav-item ms-3">
          <a class="nav-link p-lg-3" href="fav.php"><i class="fa-regular fa-bookmark"></i></a>
        </li>
        <li class="nav-item ms-3">
          <a class="nav-link p-lg-3 " href="offers.php"><i class="fa-solid fa-percent"></i></a>
        </li>
      </ul>
      
      <div class="position-absolute end-0 pe-1">
      <div class="ps-1 d-flex justify-content-end align-middle">
      <?php
    // if(isset($_SESSION['id'])) {
    //         $session_id=$_SESSION['id'];
    //         $time = "SELECT `time` FROM `sessions` WHERE `id`= ".$session_id.";";
    //         $time_expire=new DateTime(date(mysqli_fetch_array(mysqli_query($conn, $time))[0]));
    //         $time_now=new DateTime(date('y-m-d'));
    //         if($time_expire>$time_now){
              
    //         }
    //         else{
    //             session_destroy();
    //             echo('
    //                 <a class=" btn main-btn rounded-pill my-2 mx-2 d-md-none" href="logout.php">logout</a>
    //                 <a class=" btn main-btn rounded-pill my-2 mx-2 d-md-none " href="regester.php">regester</a>
    //             ');
    //         }

    // }
    // else{
    //     echo('
    //     <a class=" btn main-btn rounded-pill my-2 mx-2 d-md-none" href="login.php">login</a>
    //     <a class=" btn main-btn rounded-pill my-2 mx-2 d-md-none " href="regester.php">regester</a>
       

    // ');
    //     }

?>
   
      
  
    

    
    <?php 
    if(isset($_SESSION['name']) and isset($_SESSION['picture'])and $_SESSION['picture'] != NULL ){
      
      echo('<div class="text-center ms-auto" >
      <a href="profile_card.php">
      <img src="users-images/'.$_SESSION['picture'].'"  class="rounded-circle c_profile_pic">
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
        <img src="imgs/avatar.png" alt="Avatar" class="rounded-circle c_profile_pic">
        </a>
        </div>
        <div class="d-none d-md-flex align-items-center ps-3 text-center  text-light">'.$_SESSION['name'].'</div>');
        echo '<a class="d-none d-md-flex align-items-center rounded-pill btn  ms-3 me-1 c-section" href="logout.php" type="button" >logout</a>';
        
      }
      else{
        if(isset($_SESSION['name'])){
          
          echo'<div class="text-center " ><a href="profile_card.php"><img src="imgs/avatar.png" alt="Avatar" class="me-1 rounded-circle c_profile_pic"></a></div>';
          echo '<div class="d-none d-md-flex align-items-center ps-3 text-center text-light ">'.$_SESSION['name'].'</div>';
          echo '<a class="d-none d-md-flex align-items-center rounded-pill btn  ms-3 me-1 c-section" href="logout.php" type="button" >logout</a>';
      }
      else{
        echo'<div class="text-center " ><img src="imgs/avatar.png" alt="Avatar" class="rounded-circle c_profile_pic"></div>';
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



