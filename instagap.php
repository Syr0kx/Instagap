<?php
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");
include("templates/header.inc.php");
$user = check_user();
?>
<?php

///::PSEUDOCODE::

//IF ID VON USER IST VORHANDEN IN INSTAGRAM => BOTSTARTEN
//ELSE LOGINFENST		

$select = $pdo->prepare("SELECT username FROM instagram WHERE instagram.id = ".htmlentities($user['id']));
$select->execute();
$count = $select->rowCount();
if($count > 0)
{
    ?><h2>HIER IST DER BOT</h2>
<?php


}
else
{
    include("bot_login.php");
}
?>