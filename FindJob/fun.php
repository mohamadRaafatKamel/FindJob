<?php
class crs{
  private $servername ;
  private $username ;
  private $password ;
  private $dbname;
  private $con;

  function __construct(){
    $GLOBALS['servername'] = 'localhost';
    $GLOBALS['username'] = 'root';
    $GLOBALS['password'] = '';
    $GLOBALS['dbname']='findjob';
    // $GLOBALS['servername'] = 'localhost';
    // $GLOBALS['username'] = 'id5287639_root';
    // $GLOBALS['password'] = '123456789';
    // $GLOBALS['dbname']='id5287639_crs';
    $GLOBALS['con']=mysqli_connect($GLOBALS['servername'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['dbname']);
  }

  function logup(){
    if($GLOBALS['con']){
    	mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
    	$bdate=$_POST['bdate'];
    	$name=$_POST['name'];
    	$email=$_POST['email'];
    	$age=$_POST['age'];
    	$phone=$_POST['phone'];
      $pass=$_POST['pass1'];
    	$gender=$_POST['gender'];
      $City=$_POST['City'];
      $Exp=$_POST['Experience'];
      $Field=$_POST['Field'];
      $Qualif=$_POST['Qualification'];
      $sql="INSERT INTO `user`(`uname`,`uemail`,`upass`,`age`,`phone`,`gender`,`bday`, `cid`, `exper`, `fid`, `img`, `qualif`)
            VALUES ('$name','$email','$pass','$age','$phone','$gender','$bdate','$City','$Exp','$Field',' ','$Qualif')";
      $query=mysqli_query($GLOBALS['con'],$sql);
      if($query===false){
        //die("<script>location.href ='logup.php'</script>");
        echo "This email have been used ";
      }else{
        $sql2="SELECT `uid` FROM `user`WHERE `uemail`='$email'";
        $query2=mysqli_query($GLOBALS['con'],$sql2);
        $row=mysqli_fetch_assoc($query2);
        if($query2!=false){
          $imgup=$this->img("imguser","imgUP",$row['uid']);
          //echo $imgup;
          $this->UPDATEuser("img",$imgup,$row['uid']);
          die("<script>location.href ='login.php'</script>");
        }
      }
      //printf("Errormessage2: %s\n", mysqli_error($GLOBALS['con']));
    }
  }

  function login(){
    if($GLOBALS['con']){
      mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
      $email=$_POST['email'];
    	$pass= $_POST['pass'];

    	$sql="SELECT * FROM `user` WHERE `uemail`='$email' and `upass`='$pass'";
    	$result=mysqli_query($GLOBALS['con'],$sql);
    	$count=mysqli_num_rows($result);
    	$row =mysqli_fetch_assoc($result);

    	if($count===1){
    		$_SESSION["id_person"]=$row['uid'];

    	  die("<script>location.href ='index.php'</script>");
      }else {
        echo "make sure password and email";
      }
    }
  }

  function display_city_selected(){
    if($GLOBALS['con']){
      mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
    	$sql="SELECT * FROM `city` ";
    	$result=mysqli_query($GLOBALS['con'],$sql);
    	$count=mysqli_num_rows($result);
    	if($count>0){
        while ($row =mysqli_fetch_assoc($result)) {
          $sel="";
          if (isset($_POST["City"]))
            if($_POST["City"]==$row['cname'])$sel="selected";
          echo "<option value=\" ".$row['cid']." \" ".$sel .">".$row['cname']."</option>";
        }
      }
    }
  }

  function display_field_selected(){
    if($GLOBALS['con']){
      mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
    	$sql="SELECT * FROM `field` ";
    	$result=mysqli_query($GLOBALS['con'],$sql);
    	$count=mysqli_num_rows($result);
    	if($count>0){
        while ($row =mysqli_fetch_assoc($result)) {
          $sel="";
          if (isset($_POST["Field"]))
            if($_POST["Field"]==$row['fname'])$sel="selected";
          echo "<option value=\"".$row['fid']."\" ".$sel .">".$row['fname']."</option>";
        }
      }
    }
  }

  function display_city_selected_E($mycity){
    if($GLOBALS['con']){
      mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
    	$sql="SELECT * FROM `city` ";
    	$result=mysqli_query($GLOBALS['con'],$sql);
    	$count=mysqli_num_rows($result);
    	if($count>0){
        while ($row =mysqli_fetch_assoc($result)) {
          $sel="";
          if($mycity==$row['cid']) $sel="selected";
          echo "<option value=\" ".$row['cid']." \" ".$sel .">".$row['cname']."</option>";
        }
      }
    }
  }

  function display_field_selected_E($myfield){
    if($GLOBALS['con']){
      mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
    	$sql="SELECT * FROM `field` ";
    	$result=mysqli_query($GLOBALS['con'],$sql);
    	$count=mysqli_num_rows($result);
    	if($count>0){
        while ($row =mysqli_fetch_assoc($result)) {
          $sel="";
          if($myfield==$row['fid'])$sel="selected";
          echo "<option value=\"".$row['fid']."\" ".$sel .">".$row['fname']."</option>";
        }
      }
    }
  }

  function img($namePost,$fileName,$id) {
    if(isset($_FILES[$namePost])){
      $name_array = $_FILES[$namePost]['name'];
      $tmp_name_array = $_FILES[$namePost]['tmp_name'];
      $type_array = $_FILES[$namePost]['type'];
      //print_r($tmp_name_array);
      $path="";
      $count=count($tmp_name_array);
      for($i = 0; $i <$count ; $i++){
            if(move_uploaded_file($tmp_name_array[$i], $fileName."/".$namePost.$id.$i)){
                $path=$path.$fileName."/".$namePost.$id.$i;
            } else {
            }
            if($count>1)$path=$path."*";
      }
      return $path;
    }else {
      echo "nothing";
    }
  }

  function UPDATEuser($col,$val,$idp){
    if($GLOBALS['con']){
      mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
    	$sql="SELECT * FROM `user` WHERE `uid`='$idp'";
    	$result=mysqli_query($GLOBALS['con'],$sql);
      $count=mysqli_num_rows($result);
      if($count==0){
        //printf("Errormessage: %s\n", mysqli_error($GLOBALS['con']));
        //die("<script>location.href ='logup.php'</script>");
      }else{
        $sql="UPDATE `user` SET `$col`='$val' WHERE `uid`='$idp'";
      	$result=mysqli_query($GLOBALS['con'],$sql);
      }
    }
  }

  function deletuser($idp){
    if($GLOBALS['con']){
      mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);

      $sql="DELETE FROM `user` WHERE `uid`='$idp'";
      $result=mysqli_query($GLOBALS['con'],$sql);

    }
  }

  function set_person($id){
    if($GLOBALS['con']){
      mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
    	$sql="SELECT * FROM `user` WHERE `uid`='$id'";
    	$result=mysqli_query($GLOBALS['con'],$sql);
    	$count=mysqli_num_rows($result);
    	$row =mysqli_fetch_assoc($result);
    	if($count===1){
    	  $person = array();
        $person['name']=$row['uname'];
        $person['phone']=$row['phone'];
        $person['bdate']=$row['bday'];
        $person['email']=$row['uemail'];
        $person['state']=$row['state'];
        $person['admin']=$row['admin'];
        $person['gender']=$row['gender'];
        $person['img']=$row['img'];
        $person['pass']=$row['upass'];
        $person['age']=$row['age'];
        $person['city']=$row['cid'];
        $person['Experience']=$row['exper'];
        $person['Field']=$row['fid'];
        $person['Qualification']=$row['qualif'];
        return $person;
      }
    }
  }

  function set_city($id){
    if($GLOBALS['con']){
      mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
    	$sql="SELECT * FROM `city` WHERE `cid`='$id'";
    	$result=mysqli_query($GLOBALS['con'],$sql);
    	$count=mysqli_num_rows($result);
    	$row =mysqli_fetch_assoc($result);
    	if($count===1){
        $program=$row['cname'];
        return $program;
      }
    }
  }

  function set_Field($id){
    if($GLOBALS['con']){
      mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
    	$sql="SELECT * FROM `Field` WHERE `fid`='$id'";
    	$result=mysqli_query($GLOBALS['con'],$sql);
    	$count=mysqli_num_rows($result);
    	$row =mysqli_fetch_assoc($result);
    	if($count===1){
        $program=$row['fname'];
        return $program;
      }
    }
  }

  function set_job($id){
    if($GLOBALS['con']){
      mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
    	$sql="SELECT * FROM job WHERE jid='$id'";
    	$result=mysqli_query($GLOBALS['con'],$sql);
    	$count=mysqli_num_rows($result);
    	$row =mysqli_fetch_assoc($result);
    	if($count===1){
    	  $program = array();
        $program["name"]=$row['jname'];
        $program["discription"]=$row['jdetals'];
        $program["Field"]=$row['fid'];
        $program["city"]=$row['cid'];
        $program["Experience"]=$row['exper'];
        $program["avelable"]=$row['no_avelable'];
        $program["Qualification"]=$row['qualif'];
        $program["state"]=$row['state'];
        return $program;
      }
    }
  }

  function set_gender($id){
    if($GLOBALS['con']){
      mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
    	$sql="SELECT gender FROM user WHERE uid='$id'";
    	$result=mysqli_query($GLOBALS['con'],$sql);
    	$count=mysqli_num_rows($result);
    	$row =mysqli_fetch_assoc($result);
    	if($count===1){
        if($row['gender']==0){
          return "Male";
        }else if($row['gender']==1){
          return "Female";
        }
      }
    }
  }

  function addJob(){
    if($GLOBALS['con']){
    	mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
    	$name=$_POST['name'];
    	$jAvel=$_POST['jAvel'];
      $Qualif=$_POST['Qualification'];
    	$Exp=$_POST['Experience'];
      $description=$_POST['description'];
    	$City=$_POST['City'];
      $Field=$_POST['Field'];

      $sql="INSERT INTO `job`(`jname`,`jdetals`,`fid`,`cid`,`exper`,`no_avelable`,`qualif`)
            VALUES ('$name','$description','$Field','$City','$Exp','$jAvel','$Qualif')";
      $query=mysqli_query($GLOBALS['con'],$sql);
      if($query===false){
          //printf("Errormessage: %s\n", mysqli_error($GLOBALS['con']));
        }else{
          die("<script>location.href ='aa_addJob'</script>");
        }
    }
  }

  function display_Jobs_user($fid,$qlf){
    if($GLOBALS['con']){
      mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
    	$sql="SELECT * FROM `job` where `fid`='$fid' and `qualif`='$qlf'";
    	$result=mysqli_query($GLOBALS['con'],$sql);
    	$count=mysqli_num_rows($result);

    	if($count>0){
        while ($row =mysqli_fetch_assoc($result)) {
          echo "
          <div class=\"4u 12u(mobile)\">
            <section class=\"box\">
              <header>
                <h3>".$row['jname']."</h3>
              </header>
              <footer>
                <a href=\"single.php?id=".$row['jid']."\" class=\"button alt\">More Details</a>
              </footer>
            </section>
          </div>";

        }
      }
    }
  }

  function display_Jobs(){
    if($GLOBALS['con']){
      mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
    	$sql="SELECT * FROM `job`";
    	$result=mysqli_query($GLOBALS['con'],$sql);
    	$count=mysqli_num_rows($result);

    	if($count>0){
        while ($row =mysqli_fetch_assoc($result)) {
          echo "
          <div class=\"4u 12u(mobile)\">
            <section class=\"box\">
              <header>
                <h3>".$row['jname']."</h3>
              </header>
              <footer>
                <a href=\"login\" class=\"button alt\">More Details</a>
              </footer>
            </section>
          </div>";

        }
      }
    }
  }

  function applyJob($jid,$uid){
    if($GLOBALS['con']){
      mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
      date_default_timezone_set('Africa/Cairo');
      $current_date = date('Y-m-d');
      $sql="INSERT INTO `joborder`(`uid`, `jid`, `date`) VALUES ('$uid','$jid','$current_date')";
      $query=mysqli_query($GLOBALS['con'],$sql);
      if($query===false){
        //printf("Errormessage: %s\n", mysqli_error($GLOBALS['con']));
        //die("<script>location.href ='logup.php'</script>");
      }else{
        die("<script>location.href ='index'</script>");
      }
    }
  }

  function isapplyJob($jid,$uid){
    if($GLOBALS['con']){
      mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
      $sql="SELECT * FROM `joborder` WHERE `uid`='$uid' and `jid`='$jid'";
      $result=mysqli_query($GLOBALS['con'],$sql);
      $count=mysqli_num_rows($result);
      $row =mysqli_fetch_assoc($result);
      if($count===1){
        return 1;
      }else {
        return 0;
      }
    }
  }

  function display_person(){
    if($GLOBALS['con']){
      mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
      $sql="SELECT * FROM user ";
      $result=mysqli_query($GLOBALS['con'],$sql);
      $count=mysqli_num_rows($result);
      if ($count >0) {
        while($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>".$row['uid']."</td><td>".$row['uname']."</td><td>".$row['uemail']."</td><td>"
          .$row['age']."</td><td>".$this->set_gender($row['uid'])."</td><td><a href=\"editUser.php?id=".$row['uid']." \">More</a></td>";
          echo "</tr>";
        }
      }else {
        echo "no member";
      }
    }
  }

  function display_City(){
    if($GLOBALS['con']){
      mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
      $sql="SELECT * FROM city ";
      $result=mysqli_query($GLOBALS['con'],$sql);
      $count=mysqli_num_rows($result);
      if ($count >0) {
        while($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>".$row['cid']."</td><td>".$row['cname']."</td>";
          echo "</tr>";
        }
      }else {
        echo "no City";
      }
    }
  }

  function add_city(){
    if($GLOBALS['con']){
    	mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
    	$name=$_POST['name_city'];
      $sql="INSERT INTO `city` (`cname`)VALUES ('$name')";
      $query=mysqli_query($GLOBALS['con'],$sql);
      if($query===false){
        //printf("Errormessage: %s\n", mysqli_error($GLOBALS['con']));
        //die("<script>location.href ='logup.php'</script>");
      }else{
        die("<script>location.href ='all_city'</script>");
      }
    }
  }

  function display_Field(){
    if($GLOBALS['con']){
      mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
      $sql="SELECT * FROM field ";
      $result=mysqli_query($GLOBALS['con'],$sql);
      $count=mysqli_num_rows($result);
      if ($count >0) {
        while($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>".$row['fid']."</td><td>".$row['fname']."</td>";
          echo "</tr>";
        }
      }else {
        echo "no Field";
      }
    }
  }

  function add_Field(){
    if($GLOBALS['con']){
    	mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
    	$name=$_POST['name_Field'];
      $sql="INSERT INTO `field` (`fname`)VALUES ('$name')";
      $query=mysqli_query($GLOBALS['con'],$sql);
      if($query===false){
        //printf("Errormessage: %s\n", mysqli_error($GLOBALS['con']));
        //die("<script>location.href ='logup.php'</script>");
      }else{
        die("<script>location.href ='all_field'</script>");
      }
    }
  }

  function display_Order(){
    if($GLOBALS['con']){
      mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
      $sql="SELECT * FROM joborder ";
      $result=mysqli_query($GLOBALS['con'],$sql);
      $count=mysqli_num_rows($result);
      if ($count >0) {
        while($row = mysqli_fetch_assoc($result)) {
          $job=$this->set_job($row['jid']);
          $user=$this->set_person($row['uid']);
          echo "<tr>";
          echo "<td>".$row['oid']."</td><td>".$user['name']."</td><td>".$job['name']."</td><td>".$row['date']."</td>";
          echo "</tr>";
        }
      }else {
        echo "no Order";
      }
    }
  }

  function display_note(){
    if($GLOBALS['con']){
      mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
      $sql="SELECT * FROM notification ";
      $result=mysqli_query($GLOBALS['con'],$sql);
      $count=mysqli_num_rows($result);
      if ($count >0) {
        while($row = mysqli_fetch_assoc($result)) {
          $user=$this->set_person($row['uid_user']);
          echo "<tr>";
          echo "<td>".$row['nid']."</td><td>".$user['name']."</td><td>".$row['note']."</td>";
          echo "</tr>";
        }
      }else {
        //echo "no Note";
      }
    }
  }

  function display_user_selected(){
    if($GLOBALS['con']){
      mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
    	$sql="SELECT * FROM `user` ";
    	$result=mysqli_query($GLOBALS['con'],$sql);
    	$count=mysqli_num_rows($result);
    	if($count>0){
        while ($row =mysqli_fetch_assoc($result)) {
          echo "<option value=\"".$row['uid']."\">".$row['uname']."</option>";
        }
      }
    }
  }

  function add_note(){
    if($GLOBALS['con']){
    	mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
      $note=$_POST['Comment'];
    	$userID=$_POST['userSelecter'];
      $admin=$_SESSION["id_person"];
      $sql="INSERT INTO `notification`(`uid_admin`, `uid_user`, `note`)VALUES ('$admin','$userID','$note')";
      $query=mysqli_query($GLOBALS['con'],$sql);
      if($query===false){
        printf("Errormessage: %s\n", mysqli_error($GLOBALS['con']));
        //die("<script>location.href ='logup.php'</script>");
      }else{
        die("<script>location.href ='all_note'</script>");
      }
    }
  }

  function display_nots_index($id){
    if($GLOBALS['con']){
      mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
      $sql="SELECT * FROM `notification` where `uid_user`='$id'";
      $result=mysqli_query($GLOBALS['con'],$sql);
      $count=mysqli_num_rows($result);
      if ($count >0) {
        while($row = mysqli_fetch_assoc($result)) {
          echo "<div class=\"alert alert-warning center\" role=\"alert\">";
          echo $row['note'];
          echo "</div>";
        }
      }else {
        //echo "no Note";
      }
    }
  }



}
 ?>
