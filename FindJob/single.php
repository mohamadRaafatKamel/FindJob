<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION["id_person"])){
	include 'headerUser.php' ;
}else {
	die("<script>location.href ='index.php'</script>");
}

if(isset($_GET["id"]))
{
    $id = $_GET["id"];
    $jobinfo=$crs->set_job($id);
}else {
  die("<script>location.href ='index.php'</script>");
}
?>
</div>
</div>
</div>
<div id="main-wrapper">
  <div class="container">
    <div class="row">
      <div class="9u">
        <div>
          <h3><?php echo $jobinfo["name"]; ?> </h3><br/>
          <p class="m_10"><?php echo $jobinfo["discription"]; ?></p>

          <p>Experience : <?php echo $jobinfo["Experience"]; ?><br/>
              Qualification : <?php echo $jobinfo["Qualification"]; ?><br/>
              Field : <?php echo $crs->set_Field($jobinfo["Field"]); ?><br/>
              City : <?php echo $crs->set_city($jobinfo["city"]); ?><br/>
              Avelable : <?php echo $jobinfo["avelable"]; ?> position<br/>
          </p>
        </div>

      </div>
      <div class="3u">
        <div class="btn_form">
           <form method="post">
             <?php
             if(!$crs->isapplyJob($id,$_SESSION['id_person']) ){?>
             <input type="submit" value="Apply now" name="BTNapply">
           <?php }else {
             echo "you Already Applied";
           } ?>
          </form>
        </div>
        <?php
        if(isset($_POST['BTNapply'])){
          $crs->applyJob($id,$_SESSION['id_person']);
        }
        ?>
      </div>
    </div>
  </div>
</div>



<?php include'footer.php' ?>
