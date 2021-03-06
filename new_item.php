<?php
//Check that user is signed in or send back to login page
session_start();
if($_SESSION['username'] == null){
	header('Location: login.php');
	die();
};

include 'header.php';
?>
		<!-- Wrapper -->
		<div id="wrapper">
			<!-- Header -->
			<header id="header">
				Logged in as <?php echo $_SESSION['username']; ?>
				<h1>Add an Item</h1>
				<p>Offer an item to your community.</p>
			</header>
			<!-- Main -->
			<div id="main">
				<form id="new-item-form" action="process.php" method="POST">
					<h2>Item Name</h2>
						<input type="text" name="item-title" id="item-title" placeholder="Enter a name" autofocus required/>
					<h2>Item Description</h2>
						<textarea name="item-description" id="item-description" placeholder="Enter a description..." required></textarea>
					<div id="category-wrapper">
						<h2>Category (choose one)</h2>
						<select name="item-category" id="item-category" required>
							<option value="Appliances">Appliances</option>
							<option value="Bikes">Bikes</option>
							<option value="Boats">Boats</option>
							<option value="Books">Books</option>
							<option value="Camping">Camping</option>
							<option value="Cellphones">Cell Phones</option>
							<option value="Clothing">Clothing</option>
							<option value="Computers">Computers</option>
							<option value="Gardening">Gardening</option>
							<option value="Furniture">Furniture</option>
							<option value="Photo/Video">Photo/Video</option>
							<option value="Instruments">Musical Instruments</option>
							<option value="Sports">Sports</option>
							<option value="Toys/Games">Toys/Games</option>
							<option value="Other">Other</option>
						</select>
					</div>
					<div id="add-item-wrapper">
						<input type="submit" value="Add Item">
					</div>
					<input type="hidden" name="formType" value="new_item">
				</form>
				<br />
				<div style="margin-right: auto; margin-left: auto;text-align:center;">
					<a class="button special" href="dashboard.php">Dashboard</a> |
					<a class="button special" href="search.php">Search</a> |
					<a class="button special" href="new_item.php">Add Listing</a>
				</div>
			</div>
			<br />
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
