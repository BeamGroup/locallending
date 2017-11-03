<?php
//Check that user is signed in or send back to login page
/*
session_start();
if($_SESSION['username'] == null){
	header('Location: login.php');
	die();
};
*/
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Local Lending</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]>
        <script src="../../assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../../assets/css/main.css" />
		<link rel="stylesheet" href="../../assets/css/search.css" />
		<!--[if lte IE 9]>
        <link rel="stylesheet" href="../../assets/css/ie9.css"/><![endif]-->
		<!--[if lte IE 8]>
        <link rel="stylesheet" href="../../assets/css/ie8.css"/><![endif]-->
	</head>
	<body>
		<div id="wrapper">
			<header id="header" class="alt" style="padding-bottom: 10px;">
				<h1>Hello <?php echo $_SESSION['username']; ?></h1>
				<p>Meet up with friends to borrow or lend things!</p>
				<?php
					if(isset($_GET['message']) == "thankyou"){
						echo "<a disabled='disabled' style='margin-left: auto;margin-right: auto;' class='button special fit'>Thanks for sharing!</a>";
					};
				?>				
			</header>
				<!-- Main -->
				<div id="main">
					<div id="searchwrapper">
						<h2>Search for items to borrow</h2>
						<form id="search-form" action="searchResults.php" method="GET">
							<div id="search-bar-wrapper">
								<input type="text" name="query" placeholder="Search for anything" id="searchbar" autofocus required>
								<button id="search-button">Search</button>
							</div>
							<div id="cat-toggle-wrapper" onclick="document.getElementById('search-cats').style.display='block'";>
								<span id="cat-toggle">Categories</span>
							</div>
							<div id="search-cats" style="display:none">
								<input type="radio" name="cat" id="cat-all" value='All' checked><label for="cat-all">All</label>
								<input type="radio" name="cat" id="cat-appliances" value='Appliances'><label for="cat-appliances">Appliances</label>
								<input type="radio" name="cat" id="cat-bikes" value="Bikes"><label for="cat-bikes">Bikes</label>
								<input type="radio" name="cat" id="cat-boats" value="Boats"><label for="cat-boats">Boats</label>
								<input type="radio" name="cat" id="cat-books" value="Books"><label for="cat-books">Books</label>
								<input type="radio" name="cat" id="cat-camping" value="Camping"><label for="cat-camping">Camping</label>
								<input type="radio" name="cat" id="cat-clothes" value="Clothes"><label for="cat-clothes">Clothes</label>
								<input type="radio" name="cat" id="cat-cellphones" value="Cell Phones"><label for="cat-cellphones">Cellphones</label>
								<input type="radio" name="cat" id="cat-computers" value="Computers"><label for="cat-computers">Computers</label>
								<input type="radio" name="cat" id="cat-gardening" value="Gardening"><label for="cat-gardening">Gardening</label>
								<input type="radio" name="cat" id="cat-furniture" value="Furniture"><label for="cat-furniture">Furniture</label>
								<input type="radio" name="cat" id="cat-photovideo" value="Photo/Video"><label for="cat-photovideo">Photo/Video</label>
								<input type="radio" name="cat" id="cat-instruments" value="Musical Instruments"><label for="cat-instruments">Musical Instruments</label>
								<input type="radio" name="cat" id="cat-sports" value="Sports"><label for="cat-sports">Sports</label>
								<input type="radio" name="cat" id="cat-toysgames" value="Toys/Games"><label for="cat-toysgames">Toys/Games</label>
								<input type="radio" name="cat" id="cat-other" value="Other"><label for="cat-other">Other</label>
							</div>
						</form>
					</div>
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
		<script src="../../assets/js/jquery.min.js"></script>
		<script src="../../assets/js/jquery.scrollex.min.js"></script>
		<script src="../../assets/js/jquery.scrolly.min.js"></script>
		<script src="../../assets/js/skel.min.js"></script>
		<script src="../../assets/js/util.js"></script>
		<!--[if lte IE 8]>
        <script src="../../assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="../../assets/js/main.js"></script>
	</body>
</html>
