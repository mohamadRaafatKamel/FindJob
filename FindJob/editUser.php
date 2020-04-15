<?php require 'headerUser.php' ?>
</div>
</div>
</div>
<?php
if (session_status() == PHP_SESSION_NONE) {
    die("<script>location.href ='index.php'</script>");
}

$personEnter=$crs->set_person($_SESSION["id_person"]);
if(isset($_GET["id"]) && $personEnter['admin']==1)
{
    $id = $_GET["id"];
    $person=$crs->set_person($id);
}else {
  $id = $_SESSION["id_person"];
  $person=$crs->set_person($id);
}


$name=$person['name'];
$pass1=$pass2=$pass3="";
$email=$person['email'];
$bdate=$person['bdate'];
$phone=$person['phone'];
$age=$person['age'];
$City=$person['city'];
$exp=$person['Experience'];
$Field=$person['Field'];
$qulf=$person['Qualification'];

$Err="<br/>";
$e=0;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnEdit1'])){

  if (empty($_POST["name"])) {
    $Err = $Err."please enter name<br/>";
    $e=1;
  } else {
    $name = test_input($_POST["name"]);
  }

  if(!empty($_POST["pass1"])){
    if (empty($_POST["pass1"])) {
      $Err = $Err."please enter old password<br/>";
      $e=1;
    } else {
      $pass1 = test_input($_POST["name"]);
    }

    if (empty($_POST["pass2"])) {
      $Err =$Err. "please enter password<br/>";
      $e=1;
    }

    if (empty($_POST["pass3"])) {
      $Err = $Err."please enter Confirm password<br/>";
      $e=1;
    }

    if($_POST["pass1"]==$person['pass']){
      if($_POST["pass3"]!=$_POST["pass2"]){
        $Err =$Err. "please not same password<br/>";
        $e=1;
      }
      $Err =$Err. "please true old password<br/>";
      $e=1;
    }
  }

  if (empty($_POST["bdate"])) {
    $Err = $Err."please enter bdate<br/>";
    $e=1;
  } else {
    $bdate = test_input($_POST["bdate"]);
  }

  if (empty($_POST["email"])) {
    $Err =$Err. "please enter email<br/>";
    $e=1;
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["phone"])) {
    $Err = $Err."please enter phone <br/>";
    $e=1;
  } else if(strlen($_POST["phone"])!=11){
    $Err = $Err."please enter phone equle 11 digits<br/>";
    $e=1;
  }else {
    $phone = test_input($_POST["phone"]);
  }

  if (empty($_POST["age"])) {
    $Err =$Err. "please enter your Age <br/>";
    $e=1;
  } elseif ($_POST["age"]<20 || $_POST["age"]>60) {
    $Err =$Err. "the age is low 20 or high 60<br/>";
    $e=1;
  } else {
    $age = test_input($_POST["age"]);
  }

  if (empty($_POST["Qualification"])) {
    $Err =$Err. "please enter Qualification<br/>";
    $e=1;
  } else {
    $qulf = test_input($_POST["Qualification"]);
  }

  if (empty($_POST["Field"])) {
    $Err =$Err. "please enter Field<br/>";
    $e=1;
  } else {
    $Field = test_input($_POST["Field"]);
  }

  if (empty($_POST["Experience"])) {
    $Err =$Err. "please enter Experience<br/>";
    $e=1;
  } else {
    $exp = test_input($_POST["Experience"]);
  }

  if (empty($_POST["City"])) {
    $Err =$Err. "please enter City<br/>";
    $e=1;
  } else {
    $City = test_input($_POST["City"]);
  }



}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnEditImg'])){

  if(!isset($_FILES['imguser'])){
    $Err =$Err. "please enter add img<br/>";
    $e=1;
  }

  if(isset($_FILES['imguser'])){
    $type=$_FILES["imguser"]["type"][0];
    if($type=="image/jpg"||$type=="image/jpeg"||$type=="image/png"){
    }else {
      $Err =$Err. "please image JPG or PNG or JPEG<br/>";
      $e=1;
    }
  }
}
function test_input($data) {
  $data = trim($data);
  return $data;
}


 ?>

<div id="main-wrapper">
  <div class="container">
    <div class="row">
      <div class="12u">

        <div>
          <span class="error"><?php echo $Err ;?></span>
        </div>
           <form method="post" class="logup">
             <h3>Edit INFORMATION</h3>
               <div class="register-top-grid">
                   <div>
                     <span>Name</span>
                     <input type="text" name="name" value="<?php echo $name;?>" required>
                   </div>
                   <div>
                     <span>Phone</span>
                     <input type="number" name="phone" value="<?php echo $phone;?>" required>
                   </div>
                   <div>
                     <span>Email Address</span>
                     <input type="email" name="email" value="<?php echo $email;?>" required>
                   </div>
                   <div>
                     <span>Berth Date</span>
                     <input type="date" name="bdate" value="<?php echo $bdate;?>" required>
                   </div>
                   <div>
                     <span>Age</span>
                     <input type="number" name="age" value="<?php echo $age;?>" required>
                   </div>

                   <div>
                     <span>City</span>
                     <select name="City">
                       <option value=""></option>
                       <?php $crs->display_city_selected_E($City); ?>
                     </select>
                   </div>
                   <div>
                     <span>Experience</span>
                     <select name="Experience">
                       <option value=""></option>
                       <option value="Less 5 year" <?php if($exp=="Less 5 year")echo "selected";?>>Less 5 year</option>
                       <option value="From 5 to 10" <?php if($exp=="From 5 to 10")echo "selected";?>>From 5 to 10</option>
                       <option value="More 10 year" <?php if($exp=="More 10 year")echo "selected";?>>More 10 year</option>
                     </select>
                   </div>
                   <div>
                     <span>Field</span>
                     <select name="Field">
                       <option value=""></option>
                       <?php $crs->display_field_selected_E($Field); ?>
                     </select>
                   </div>
                   <div>
                     <span>Qualification</span>
                     <select name="Qualification">
                       <option value=""></option>
                       <option value="Diploma" <?php if($qulf=="Diploma")echo "selected";?>>Diploma</option>
                       <option value="Bachelor" <?php if($qulf=="Bachelor")echo "selected";?>>Bachelor</option>
                       <option value="MSc" <?php if($qulf=="MSc")echo "selected";?>>MSc</option>
                     </select>
                   </div>
                   <div>
                   </div>
                   <?php if($personEnter['admin']!=1){?>
                   <div>
                     <span>Last Password</span>
                     <input type="password" name="pass1">
                   </div>
                   <div>
                     <span>New Password</span>
                     <input type="password" name="pass2">
                   </div>
                   <div>
                     <span>Confirm New Password</span>
                     <input type="password" name="pass3">
                   </div>
                 <?php } ?>
               </div>
               <div>
                  <input type="submit" name="btnEdit1" value="submit">
                </div>
                <?php
                 if(isset($_POST['btnEdit1']) &&$e==0){
                   if($_POST['name']!=$person['name']){echo "string"; $crs->UPDATEuser("uname",$_POST['name'],$id);}
                   if($_POST['phone']!=$person['phone'])$crs->UPDATEuser("phone",$_POST['phone'],$id);
                   if($_POST['email']!=$person['email'])$crs->UPDATEuser("uemail",$_POST['email'],$id);
                   if($_POST['bdate']!=$person['bdate'])$crs->UPDATEuser("bday",$_POST['bdate'],$id);
                   if($_POST['age']!=$person['age'])$crs->UPDATEuser("age",$_POST['age'],$id);
                   if($_POST['City']!=$person['city'])$crs->UPDATEuser("cid",$_POST['City'],$id);
                   if($_POST['Experience']!=$person['Experience'])$crs->UPDATEuser("exper",$_POST['Experience'],$id);
                   if($_POST['Field']!=$person['Field'])$crs->UPDATEuser("fid",$_POST['Field'],$id);
                   if($_POST['Qualification']!=$person['Qualification'])$crs->UPDATEuser("qualif",$_POST['Qualification'],$id);

                   if(!empty($_POST['pass']))$crs->UPDATEuser("pass",$_POST['pass2'],$id);

                    die("<script>location.href ='editUser.php?id=".$id."'</script>");
                 }
                 ?>
           </form>
           <br/>

           <form method="post" class="logup" enctype="multipart/form-data">
             <h3>Edit your Image</h3>
               <div class="register-top-grid">
                 <div>
                   <br/>
                   <input type="file" name="imguser[]" accept="image/*">
                 </div>
                 <div>
                    <input type="submit" name="btnEditImg" value="New Image">
                  </div>
               </div>
               <?php
                if(isset($_POST['btnEditImg']) ){
                  $imgup=$crs->img("imguser","imgUP",$id);
                  $crs->UPDATEuser("img",$imgup,$id);
                }
                ?>
          </form>

    <?php if($personEnter['admin']==1 && $id!=$_SESSION["id_person"]){ ?>
          <br/><br/>
          <form method="post" class="logup">
              <div class="register-top-grid">
                <div>
                  <?php if($person['state']==1){ ?>
                   <input type="submit" name="btnNotActive" value="NotActive">
                 <?php }
                    if($person['state']==0){ ?>
                   <input type="submit" name="btnActive" value="Active">
                 <?php } ?>

                    <input type="submit" name="btnDeletUser" value="Delete">
                  </div>
              </div>
              <?php
               if(isset($_POST['btnNotActive']) ){
                 $crs->UPDATEuser("state","0",$id);
                 die("<script>location.href ='editUser.php?id=".$id."'</script>");
               }
               if(isset($_POST['btnActive']) ){
                 $crs->UPDATEuser("state","1",$id);
                 die("<script>location.href ='editUser.php?id=".$id."'</script>");
               }
               if(isset($_POST['btnDeletUser']) ){
                 $crs->deletuser($id);
                 die("<script>location.href ='index.php'</script>");
               }
               ?>
         </form>
    <?php } ?>

     </div>
   </div>
   </div>
 </div>
</div>
<?php require'footer.php' ?>
