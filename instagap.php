<?php
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");
include("templates/header.inc.php");
?>


<!-- hier muss überprüft werden ob der instagram account mit dem user account verknüpft is_string -->

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




