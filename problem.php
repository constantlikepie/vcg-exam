<?php
    include_once("layout_head.php");
    $id = isset($_GET['id']) ? $_GET['id'] : "1";
?>

<main role="main">
  <div class="jumbotron">
    <div class="container">
      <h2 class="display-5">Problem <?=$id?></h2>
      
        <?php
            if($id == 1){
                include_once("problems/first_problem.php");
            }else if($id == 2){
                include_once("problems/second_problem.php");
            }else if($id == 3){
              include_once("problems/third_problem.php");
            }else if($id == 4){
              include_once("problems/fourth_problem.php");
            }else if($id == 5){
              include_once("problems/fifth_problem.php");
            }
        ?>
      
    </div>
  </div>
</main>
<?php include_once("layout_foot.php"); ?>