<?php
session_start();
require_once("../inc/config.inc.php");
require_once("../inc/functions.inc.php");
include("../templates/header.inc.php");
$user = check_user();
$userid  = htmlentities($user['id']);
//überpüfung ob instagram account verbunden ist
$select = $pdo->prepare("SELECT username, password FROM instagram WHERE instagram.id = ".htmlentities($user['id']));
$select->execute();
$count = $select->rowCount();
if($count > 0)
{

    include("../bot/bot.php");


}
else
{
    include("../bot/bot_login.php");
}

    include("../templates/footer.inc.php");
?>

    
</div>
