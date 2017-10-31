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
		<title>Local Lending</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<div id="wrapper">
			<header id="header" class="alt" style="padding-bottom: 10px;">
				<h1>Hello <?php echo $_SESSION['username']; ?></h1>
				<p>Meet up with friends to borrow or lend things!</p>
			</header>
			<!-- Main -->
			<div id="main">
				<!-- First Section -->
				<section id="results" class="main special">
					<header class="major">
						<h2>Search Results</h2>
					</header>
					
					<table class="alt">
						<thead>
							<tr>
								<td>Name</td>
								<td>Description</td>
								<td>Owner</td>
								<td>Holder</td>
							</tr>
						</thead>
						<tbody>
							<?php
								//Get search queries parse MySQL throw out the results

								//Include connection to MySQL File
								include 'connect.php';

								$toSearch = $_GET['query'];
								$cat = $_GET['cat'];

								//Make sure not null
								if(!isset($toSearch) || !isset($cat)){
									header('Location: search.php');
								};

								$sql = ("SELECT * FROM `items` WHERE item_name LIKE '%".$toSearch."%' or description LIKE '%".$toSearch."%'");
								$stm = $con->prepare($sql);
								$stm->execute();
								$records = $stm->fetchAll();

								//Output the records
								foreach($records as $row){
									echo "<tr onclick=document.location='trade.php?user=".$row['owner_username']."?itemid=".$row['item_id']."'>";
									echo "<td>".$row['item_name']."</td>";
									echo "<td>".$row['description']."</td>";
									echo "<td>".$row['owner_username']."</td>";
									echo "<td>".$row['holder_username']."</td></tr>";
								};
							?>
						</tbody>
					</table>
					<p id="ele"></p>
				</section>
					</div>
					<br />
				<!-- Footer -->
			</div> <br />
				<div style="margin-right: auto; margin-left: auto;text-align:center;">
					<a class="button special" href="dashboard.php">Dashboard</a> | 
					<a class="button special" href="search.php">Search</a> | 
					<a class="button special" href="new_item.php">Add Listing</a>
				</div>
		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.scrollex.min.js"></script>
		<script src="assets/js/jquery.scrolly.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="assets/js/main.js"></script>
			<script type="text/javascript">
				function parse(){
					document.getElementById('ele').innerHTML = window.location.href.split('?')[1];
				};
				//window.onload = parse();
			</script>
	</body>
</html>
