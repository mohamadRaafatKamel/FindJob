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
  <h4 class="title">all member</h4>
  <table id="ShowTable" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th class="th-sm">ID</th>
        <th class="th-sm">Name</th>
        <th class="th-sm">Email</th>
        <th class="th-sm">Age</th>
        <th class="th-sm">Gender</th>
        <th class="th-sm">More</th>
      </tr>
    </thead>
    <tbody>
      <?php $crs->display_person(); ?>
    </tbody>
    <tfoot>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Age</th>
      <th>Gender</th>
      <th>More</th>
    </tfoot>
  </table>
</div>
</div>


<?php require'footer.php' ;?>
