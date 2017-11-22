<?
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>
            <?php
                switch ( basename($_SERVER['PHP_SELF']) ) {
                    case 'index.php':
                        echo 'Local Lending';
                        break;
                    case 'dashboard.php':
                        echo 'Dashboard';
                        break;
                    case 'login.php':
                        echo 'Log in to Local Lending';
                        break;
                    case 'new_item.php':
                        echo 'Add New Item';
                        break;
                    case 'search.php':
                        echo 'Search';
                        break;
                    case 'searchResults.php':
                        echo 'Search Results';
                        break;
                    case 'signup.php':
                        echo 'Sign Up';
                        break;
                    default:
                        echo 'Local Lending';
               }
            ?>
           </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <link rel="stylesheet" href="assets/css/locallending.css" />
        <link rel="stylesheet" href="
        <?php
        switch ( basename($_SERVER['PHP_SELF']) ) {
            case 'new_item.php':
                echo 'assets/css/new_item.css';
                break;
            case 'search.php':
                echo 'assets/css/search.css';
                break;
            case 'trade.php':
                echo 'assets/css/trade.css';
                break;
        }
        ?>
        " />
	</head>
    <body>
        <?php
        if isset($_SESSION['username']){
            echo "<div class=\"navbar\">
            <a class=\"navbar__name\" href=\"/\">Local Lending</a>
            <div class=\"navbar__navigation\">
                <a class=\"navbar__navbutton\" href=\"dashboard.php\">Dashboard</a>
                <a class=\"navbar__navbutton\" href=\"search.php\">Search</a>
                <a class=\"navbar__navbutton\" href=\"new_item.php\">New Item</a>
                <a class=\"navbar__navbutton navbar__navbutton--logout\" href=\"logout.php\">Logout</a>
            </div>
        </div>
        <div class=\"navbar--spacer\"></div>"
        }
        
        ?>
