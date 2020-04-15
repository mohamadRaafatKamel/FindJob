<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION["id_person"])){
	include 'headerUser.php' ;
  $Login=1;
  $state=$user['state'];
}else {
	include 'header.php';
  $Login=0;
  $state=1;
}
?>



			<!-- Main -->
				<div id="main-wrapper">
					<div class="container">
						<div class="row">
							<div class="12u">

                <?php
                if($Login !=0){
                  $crs->display_nots_index($_SESSION["id_person"]);
                }
                if($state==0){
                ?>
                <div class="alert alert-danger center" role="alert">
                  Your Account is not Active Call Admin to see Jobs
                </div>
              <?php } else { ?>
                <!-- Portfolio -->
									<section>
										<header class="major">
											<h2>Jobs</h2>
										</header>
										<div class="row">

                      <?php
                      if(isset($_SESSION["id_person"])){
                        $crs->display_Jobs_user($user['Field'],$user['Qualification']);
                      }else {
                        $crs->display_Jobs();
                      }
                      ?>

										</div>
									</section>
                <?php } ?>
							</div>
						</div>
					</div>
				</div>
<?php include'footer.php' ?>
