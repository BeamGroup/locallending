<?php
//Check that user is signed in or send back to login page
session_start();
if($_SESSION['username'] == null){
	header('Location: login.php');
	die();
};

include 'header.php';
?>
	<body>
		<div id="wrapper">
			<header id="header" class="alt">
				Logged in as <?php echo $_SESSION['username']; ?>
				<h1>Local Lending</h1>
				<p>Meet up with friends to borrow or lend things!</p>
			</header>
			<!-- Main -->
			<div id="main">
				<!-- First Section -->
				<section id="first" class="main special">
					<header class="major">
						<h2>Dashboard</h2>
        	        </header>
            	    <ul class="actions fit">
                		<li>
                    		<a class='button big fit' href="search.php" style='margin:15px;'>Search</a>
                  		</li>
                  		<li>
                    		<a class='button big fit' href="new_item.php" style='margin:15px;'>Add listing</a>
                  		</li>
                	</ul>
                	<a class="button" href="logout.php">Log Out</a>
				</section>
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
