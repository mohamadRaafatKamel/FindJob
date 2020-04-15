<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'headerUser.php' ;
if($user['admin']!=1){
  die("<script>location.href ='index.php'</script>");
}
?>
</div>
</div>
</div>

<!-- Main -->
  <div id="main-wrapper">
    <div class="container">

      <form method="post" class="logup" enctype="multipart/form-data">
          <div class="register-top-grid">
              <h3>Add Job</h3>
              <div>
                <span>Name</span>
                <input type="text" name="name" required>
              </div>

              <div>
                <span>Job Avelabe</span>
                <input type="number" name="jAvel" >
              </div>

              <div>
                <span>Qualification</span>
                <select name="Qualification">
                  <option value=""></option>
                  <option value="Diploma">Diploma</option>
                  <option value="Bachelor">Bachelor</option>
                  <option value="MSc">MSc</option>
                </select>
              </div>

              <div>
                <span>Experience</span>
                <select name="Experience">
                  <option value=""></option>
                  <option value="Less 5 year">Less 5 year</option>
                  <option value="From 5 to 10">From 5 to 10</option>
                  <option value="More 10 year">More 10 year</option>
                </select>
              </div>

              <div>
                <span>City</span>
                <select name="City">
                  <option value=""></option>
                  <?php $crs->display_city_selected(); ?>
                </select>
              </div>

              <div>
                <span>Field</span>
                <select name="Field">
                  <option value=""></option>
                  <?php $crs->display_field_selected(); ?>
                </select>
              </div>

              <div>
                <span>description</span>
                <textarea name="description" cols="60"></textarea>
              </div>

            </div>

          <input type="submit" name="btnAddApp" value="add">
          <?php
            if(isset($_POST['btnAddApp'])){
              $crs->addJob();
            }
           ?>
      </form>

</div>
</div>
<?php include'footer.php' ;?>
