<!DOCTYPE HTML>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION["id_person"])){
  die("<script>location.href ='index.php'</script>");
}
include 'fun.php';
$crs=new crs();
$user=$crs->set_person($_SESSION["id_person"]);
?>
<html>
	<head>
		<title>Find Job</title>
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/mystyle.css"/>
	</head>
	<body class="homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<div id="header">

						<!-- Logo -->
							<h1><a size="15px" href="index.php">Find Job</a></h1>

						<!-- Nav -->
							<nav id="nav">
								<ul>
                  <?php if($user['admin']==1){?>
                  <li>
										<a href="#">Admin</a>
										<ul>
                      <li><a href="all_member.php">Member</a></li>
                      <li><a href="all_field.php">Field</a></li>
                      <li><a href="all_city.php">City</a></li>
                      <li><a href="all_order.php">Order</a></li>
                      <li><a href="all_note.php">Comment</a></li>
                      <li><a href="aa_addJob.php">Add Job</a></li>
                    </ul>
									</li>
                <?php } ?>
									<li ><a href="index.php">HOME</a></li>
									<li><a href="ABOUTUS.php">ABOUT Site</a></li>
                  <li>
										<a href="#" class="imgInNav"><img style="border-radius: 19px;"  src="<?php echo $user['img']; ?>" height="42px" width="42px"> </a>
										<ul>
                      <li><a href="#"><?php echo $user['name']; ?></a></li>
											<li><a href="editUser.php">Edit Profile</a></li>
											<li><a href="logout.php">LogOut</a></li>

										</ul>
									</li>
								</ul>
							</nav>
            </div>
          </div>
