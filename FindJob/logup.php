<?php require 'header.php' ?>
</div>
</div>
</div>
<?php
$name=$pass1=$email=$bdate=$phone=$age=$City=$exp=$Field=$qulf="";
$Err="<br/>";
$e=0;
if ($_SERVER["REQUEST_METHOD"] == "POST"){

  if (empty($_POST["name"])) {
    $Err = $Err."please enter name<br/>";
    $e=1;
  } else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["pass1"])) {
    $Err =$Err. "please enter password<br/>";
    $e=1;
  } else {
    $pass1 = test_input($_POST["pass1"]);
  }

  if (empty($_POST["pass2"])) {
    $Err = $Err."please enter Confirm password<br/>";
    $e=1;
  } else {
    $pass2 = test_input($_POST["pass2"]);

    if($_POST["pass1"]!=$_POST["pass2"]){
      $Err =$Err. "please not same password<br/>";
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

  if(!isset($_FILES['imguser'])){
    $Err =$Err. "please enter add img<br/>";
    $e=1;
  }
  //if(isset($_FILES['imguser'])){
  if($_FILES['imguser']['name']==""){
    $Err =$Err. "please enter add img<br/>";
    $e=1;
  }

  $type=$_FILES["imguser"]["type"][0];

  if($type=="image/jpg"||$type=="image/jpeg"||$type=="image/png"){
  }else {
    $Err =$Err. "please image JPG or PNG or JPEG<br/>";
    $e=1;
  }
  //}

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
           <form method="post" class="logup" enctype="multipart/form-data">
               <div class="register-top-grid">
                   <h3>PERSONAL INFORMATION</h3>
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
                     <span> Gender</span><br/>
                     <input type="radio" name="gender" value="0" checked> Male
                     <input type="radio" name="gender" value="1"> Female
                   </div>
                   <div>
                     <span>City</span>
                     <select name="City">
                       <option value=""></option>
                       <?php $crs->display_city_selected(); ?>
                     </select>
                   </div>
                   <div>
                     <span>Add image</span><br/>
                     <input type="file" name="imguser[]" accept="image/*">
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
                       <?php $crs->display_field_selected(); ?>
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
                     <span>Password</span>
                     <input type="password" name="pass1" required>
                   </div>
                   <div>
                     <span>Confirm Password</span>
                     <input type="password" name="pass2" required>
                   </div>





               </div>
               <div>
                  <input type="submit" name="btnLogup" value="submit">
                </div>
               <?php
                 if(isset($_POST['btnLogup'])&&$e==0){
                   $crs->logup();
                 }
                ?>
           </form>


     </div>
   </div>
   </div>
 </div>
</div>
<?php require'footer.php' ?>
