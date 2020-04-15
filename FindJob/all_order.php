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
  <h4 class="title">All Applys</h4>
  <table id="ShowTable" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th class="th-sm">ID</th>
        <th class="th-sm">Memeber</th>
        <th class="th-sm">job</th>
        <th class="th-sm">Date</th>
      </tr>
    </thead>

    <tbody>

        <?php $crs->display_Order(); ?>

    </tbody>

    <tfoot>
      <tr>
        <th>ID</th>
        <th>Memeber</th>
        <th>job</th>
        <th>Date</th>
    </tr>
    </tfoot>
  </table>
</div>
</div>


<?php require 'footer.php' ;?>
