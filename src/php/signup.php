<!DOCTYPE HTML>
<html>
	<head>
		<title>Local Lending</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]>
        <script src="../../assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../../assets/css/main.css" />
		<!--[if lte IE 9]>
        <link rel="stylesheet" href="../../assets/css/ie9.css"/><![endif]-->
		<!--[if lte IE 8]>
        <link rel="stylesheet" href="../../assets/css/ie8.css"/><![endif]-->
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
						<h2>Signup</h2>
                  </header>
                  <form class="form" action='process.php' method='POST'>
                    <div class="row uniform">
						<div class="6u 12u$(xsmall)">
							<input placeholder="First Name" name="firstName" type="text" required>
						</div>
						<div class="6u$ 12u$(xsmall)">
							<input placeholder="Last Name" name="lastName" type="text" required>
						</div>
					</div>
						<br />
					<input type="text" placeholder="Username" name="username" required><br />
                    <input type="email" placeholder="Email" name="email" required><br />
					<input type="password" placeholder="Password" name='password' required><br />
					<input type="password" placeholder="Confirm Password" name='confirmPassword' required><br />
                    <input type="hidden" name="formType" value="signup" />
                    <button id='submit-button' type='submit'>Submit</button>
                  </form>
                </div>
              </div>
            </section>
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