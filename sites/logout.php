<?php 
session_start();
session_destroy();
unset($_SESSION['userid']);

//Remove Cookies
setcookie("identifier","",time()-(3600*24*365)); 
setcookie("securitytoken","",time()-(3600*24*365)); 

require_once("../inc/config.inc.php");
require_once("../inc/functions.inc.php");

include("../templates/header.inc.php");
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.css">
<link rel="stylesheet" href="../css/style.css">
<style>
	.container{min-height: calc(100% - 70px)!important};
</style>
<div class="container main-container">
Der Logout war erfolgreich. <a href="../index.php">Zurück zum Login</a>.
</div>
<?php 
include("../templates/footer.inc.php")
?>