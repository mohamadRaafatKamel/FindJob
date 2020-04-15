<!DOCTYPE HTML>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'fun.php';
$crs=new crs();
?>
<html>
	<head>
		<title>Find Job</title>
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
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
              <li ><a href="index.php">HOME</a></li>
              <li><a href="login.php"> Log In </a></li>
              <li><a href="logup.php">Create Account</a></li>
            </ul>
          </nav>
        </div>
      </div>
