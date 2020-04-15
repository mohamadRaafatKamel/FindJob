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
  <h4 class="title">All Field</h4>
  <table id="ShowTable" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th class="th-sm">ID</th>
        <th class="th-sm">Field</th>
      </tr>
    </thead>

    <tbody>

        <?php $crs->display_Field(); ?>

    </tbody>

    <tfoot>
      <tr>
      <th>ID</th>
      <th>Field</th>
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
            Field Name
            <input id="modlgn_username" type="text" name="name_Field" class="inputbox" autocomplete="off">
          </div>
          <input type="submit" name="btnAddField" class="button" value="Add Field">
        </div>
      </form>

      <span class="error">
        <?php
        if(isset($_POST['btnAddField'])){
          $crs->add_Field();
        }
        ?>
      </span>
    </div>

  </div>
</div>
<?php require 'footer.php' ;?>
