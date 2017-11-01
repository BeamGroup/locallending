<?php
//Check that user is signed in or send back to login page
session_start();
if($_SESSION['username'] == null){
	header('Location: login.php');
	die();
};
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Trade Item</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<link rel="stylesheet" href="assets/css/trade.css" />
	</head>
	<body>
		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Header -->
					<header id="header">
						<p>Logged in as <?php echo $_SESSION['username']; ?></p>
						<?php 
						include 'connect.php';
						$sql = ("SELECT item_name, holder_username FROM `items` WHERE item_id ='".$_GET['item_id']."'");
						$stm = $con->prepare($sql);
						$stm->execute();
						$row = $stm->fetch();
						echo '<h1>Trade '.$row['item_name'].' with <span style="color:#a89cc8;">'.$row['holder_username'].' </span></h1>'; ?>
						<p>Make sure you are with the other person.</p>
					</header>
				<!-- Main -->
					<div id="main">
						<!-- Content -->
							<section id="content" class="main">
								<h2>When you are both ready, click trade on your individual screens.</h2>
								<p>This person-to-person trading ensures nobody gets scammed.</p>
								<button id="trade-button">Trade</button>
								<br />
								<h2>When you have both traded, click confim.</h2>
								<button id="confirm-button">Confirm</button>
							</section>
						<hr />
						<div style="margin-right: auto; margin-left: auto;text-align:center;">
					  		<a class="button special" href="dashboard.php">Dashboard</a> | 
					  		<a class="button special" href="search.php">Search</a> | 
					  		<a class="button special" href="new_item.php">Add Listing</a>
						</div>
						<br />
					</div>
			</div>

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.scrollex.min.js"></script>
		<script src="assets/js/jquery.scrolly.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="assets/js/main.js"></script>
	</body>
</html>
