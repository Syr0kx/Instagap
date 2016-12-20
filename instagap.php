<?php
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");
include("templates/header.inc.php");
$user = check_user();

//überpüfung ob instagram account verbunden ist
$select = $pdo->prepare("SELECT username FROM instagram WHERE instagram.id = ".htmlentities($user['id']));
$select->execute();
$count = $select->rowCount();
if($count > 0)
{
    ?>
    
    
    <!--Hier ist der BOT-->
    <div class="ui icon message">
  <i class="inbox icon"></i>
  <div class="content">
    <div class="header">
      Have you checked your messages yet?
    </div>
    <p>There might be a gift for you!</p>
  </div>
</div>


<div class="ui centered one column grid">

    <div>
    <div class="one column row"><h1>Instagap</h1></div>
     </div>
 
    <div class="one column row">
       
    </div>
    
    <div class="one column row">
        <h2>Bot Status:  <br></h2>
        <div> 
            <div class="ui buttons"> 
                <button class="ui button green">  running</button>
                <button class="ui button loading"></button>
            </div> 
        </div>
    </div>

    <div class="one column row">
        <button class="ui button tall ">stop bot</button>
    </div>
    
    <div class="one column row">
        <div class="ui slider checkbox">
            <input type="checkbox" name="likes">
            <label>likes</label>
        </div>
    </div>
    <div class="one column row">
        <div class="ui slider checkbox">
            <input type="checkbox" name="likes">
            <label>comments</label>
        </div>
    </div>
    <div class="one column row">
        <div class="ui slider checkbox">
            <input type="checkbox" name="likes">
            <label>follow</label>
        </div>
    </div>
    <div class="one column row">
        <div class="ui slider checkbox">
            <input type="checkbox" name="likes">
            <label>unfollow</label>
        </div>
    </div>


    
</div>






<?php


}
else
{
    include("bot_login.php");
}
?>

    
</div>
