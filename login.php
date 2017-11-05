<?php
//Check that user is signed in and send to dashboard page
session_start();
if($_SESSION['username'] != null){
  header('Location: dashboard.php');
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
        <!-- Main -->
        <br />
        <div id="main">
          <!-- Introduction -->
            <section id="intro" class="main">
              <div class="spotlight">
                <div class="content">
                  <header class="major">
						<h1>Local Lending</h1>
						<h2>Login</h2>
                  </header>
                  <?php
                  	//Show login error if given ?authentication=error in URL
                  	if(isset($_GET['authentication']) == "error"){
                  		echo "<p>Yikes! Login Error! Check your Username or Password</p>";
                  	};
                  ?>
                  <form class="form" action='process.php' method='POST'>
                    <input type="text" placeholder="Username" name="username" required><br />
                    <input type="password" placeholder="Password" name="password" required><br />
                    <input type="hidden" name="formType" value="login" />
                    <?php
                      if(isset($_GET['item_id'])){
                        echo "<input type='hidden' name='redirect_item_id' value='" . $_GET['item_id'] . "'>";
                      };
                    ?>
                    <button id='submit-button' type='submit'>Submit</button>
                      <?php
                      echo "<a href='signup.php";
                        if(isset($_GET['item_id'])){
                          echo "?item_id=" . $_GET['item_id'];
                        };
                        echo "'><span style='color:deepskyblue;padding-left:15px;'>Or sign up</span></a>";
                      ?>
                  </form>
                </div>
              </div>
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
