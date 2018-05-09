<?php
session_start(); 
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 60*60,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
unset($_SESSION['alogin']);
session_destroy(); // destroy session

echo "<!DOCTYPE html>\n";
echo "<html lang=\"en\"><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n";
echo "\n";
echo "    <!-- Bootstrap core CSS -->\n";
echo "    <link href=\"css/loading/bootstrap.min.css\" rel=\"stylesheet\">\n";
echo "    <!-- Custom styles for this template -->\n";
echo "<link href=\"bootstrap/font-awesome-4.1.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">";
echo "	<link rel=\"stylesheet\" href=\"css/loading/fontello.css\">\n";
echo "    <link rel=\"stylesheet\" href=\"css/loading/animation.css\"><!--[if IE 7]><link rel=\"stylesheet\" href=\"css/loading/fontello-ie7.css\"><![endif]-->\n";
echo "    \n";
echo "<body>\n";
echo "<div class=\"container\">\n";
echo "	<div class=\"row\">\n";
echo "		<div class=\"col-xs-3\">\n";
echo "		</div>\n";
echo "		<div class=\"col-xs-6 \">\n";

echo "		<h4><p style=\"color:#FF4A43\"> Logout Successful. Redirecting to Login Page...<i class=\"fa fa-spinner animate-spin\" style=\"font-size:28px;\"></i></p></h4>\n";
echo "		\n";
echo "		</div>\n";
echo "		<div class=\"col-xs-3\">\n";
echo "		</div>\n";
echo "	</div>\n";
echo "</div>\n";
echo "\n"; 
echo "\n";

header('Refresh: 3;url=index.php');

echo "</body></html>";





?>

