<div class="d-flex justify-content-center align-items-center m-3">

<div class=" slids">


<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators color">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
  <?php
    
$active =0;
    $get_cat_i = "SELECT * FROM `posters` WHERE 1";
    $run_cat_i = mysqli_query($conn, $get_cat_i);
    while($row_cat_i = mysqli_fetch_array($run_cat_i))
    {
      
      $name = $row_cat_i['name'];
      $img = $row_cat_i['path'];
      
        ?>
        <div class="carousel-item <?php if($active==0){echo "active";} ?>">
          <img src="imgs/<?php echo $img ?>" class="d-block w-100" alt="<?php echo $$name ?>">
        </div>
    
        <?php $active=1;}?>
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

</div>

</div>

