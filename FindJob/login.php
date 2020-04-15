<?php require'header.php' ?>
</div>
</div>
</div>
<div id="main-wrapper">
  <div class="container">
    <div class="row">
      <div class="12u">

       <div>

           <?php
             if(isset($_POST['btnLogin'])){
               $crs->login();
             }
            ?>
       </div>
      <div class="login-title">
             <h5 class="title">Registered Customers</h5>
       <div id="loginbox" class="loginbox">
         <form action="" method="post" name="login" id="login-form">
           <fieldset class="input">
             <p id="login-form-username">
               <label for="modlgn_username">Email</label>
               <input id="modlgn_username" type="text" name="email" class="inputbox" autocomplete="off">
             </p>
             <p id="login-form-password">
               <label for="modlgn_passwd">Password</label>
               <input id="modlgn_passwd" type="password" name="pass" class="inputbox" autocomplete="off">
             </p>
             <div class="remember">
               <!-- <p id="login-form-remember">
                 <label for="modlgn_remember"><a href="#">Forget Your Password ? </a></label>
              </p> -->
               <input type="submit" name="btnLogin" class="button" value="Login"><div class="clear"></div>

            </div>
           </fieldset>
          </form>
       </div>
         </div>
     </div>
   </div>
   </div>
 </div>
</div>
<?php require'footer.php' ?>
