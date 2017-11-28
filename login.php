<?php
//Check that user is signed in and send to dashboard page
session_start();
if(isset($_SESSION['username'])){
  header('Location: dashboard.php');
  die();
};

include 'header.php';
?>
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
                      	$_GET['item_id'] = filter_var($_GET['item_id'],FILTER_SANITIZE_STRING); //FILTER!!!
                        echo "<input type='hidden' name='redirect_item_id' value='" . $_GET['item_id'] . "'>";
                      };
                    ?>
                    <button id='submit-button' type='submit'>Log In</button>
                      <?php
                      echo "<a href='signup.php";
                        if(isset($_GET['item_id'])){
                        	$_GET['item_id'] = filter_var($_GET['item_id'],FILTER_SANITIZE_STRING); //FILTER!!!
                          	echo "?item_id=" . $_GET['item_id'];
                        };
                        echo "'><span style='color:deepskyblue;padding-left:15px;'>or Sign Up</span></a>";
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
