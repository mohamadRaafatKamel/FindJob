<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
require 'headerUser.php' ;
if($user['admin']!=1){
  die("<script>location.href ='index.php'</script>");
}
?>
</div>
</div>
</div>
<!-- Main -->
<div id="main-wrapper">
<div class="container mb-3 mt-3">
  <h4 class="title">All City</h4>
  <table id="ShowTable" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th class="th-sm">ID</th>
        <th class="th-sm">City</th>
      </tr>
    </thead>

    <tbody>

        <?php $crs->display_City(); ?>

    </tbody>

    <tfoot>
      <tr>
      <th>ID</th>
      <th>City</th>
    </tr>
    </tfoot>
  </table>
</div>
</div>

<div id="main-wrapper">
  <div class="container">

    <div>
      <form method="post" class="logup">
        <div class="register-top-grid">
          <div>
            City Name
            <input id="modlgn_username" type="text" name="name_city" class="inputbox" autocomplete="off">
          </div>
          <input type="submit" name="btnAddCity" class="button" value="Add City">
        </div>
      </form>

      <span class="error">
        <?php
        if(isset($_POST['btnAddCity'])){
          $crs->add_city();
        }
        ?>
      </span>
    </div>

  </div>
</div>
<?php require 'footer.php' ;?>
