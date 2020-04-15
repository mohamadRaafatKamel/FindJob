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
  <h4 class="title">All Comment</h4>
  <table id="ShowTable" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th class="th-sm">ID</th>
        <th class="th-sm">Member</th>
        <th class="th-sm">Comment</th>
      </tr>
    </thead>

    <tbody>

        <?php $crs->display_note(); ?>

    </tbody>

    <tfoot>
      <tr>
      <th>ID</th>
      <th>Member</th>
      <th>Comment</th>
    </tr>
    </tfoot>
  </table>
</div>
</div>

<div id="main-wrapper">
  <div class="container">
    <h4>Add Comment </h4>
    <div>
      <form method="post" class="logup">
        <div class="register-top-grid">
          <div>
            Comment
            <input id="modlgn_username" type="text" name="Comment" class="inputbox" autocomplete="off">
          </div>
          <div>
            <span>Member</span>
            <select name="userSelecter">
              <option ></option>
              <?php $crs->display_user_selected(); ?>
            </select>
          </div>
          <input type="submit" name="btnAddnote" class="button" value="Add City">
        </div>
      </form>

      <span class="error">
        <?php
        if(isset($_POST['btnAddnote'])&& !empty($_POST['userSelecter']) && !empty($_POST['Comment'])){
          $crs->add_note();
        }
        ?>
      </span>
    </div>

  </div>
</div>
<?php require 'footer.php' ;?>
