    <!--Hier ist der BOT-->
  <?php
    include 'bot_logic.php'; 
  ?>

     <style>
	.container{min-height: calc(100% - 70px)!important};
    </style>

    <div class="container">
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
       <label>your followers: <?php echo $yourfollowers; ?></label>
    </div>
    <div class="two column row">
        <div class="ui labels">
            <h2>Bot Status: </h2>
        </div>
        <div class="ui buttons"> 
            <button class="ui button green">running</button>
            <button class="ui button loading"></button>
        </div> 
    </div>

    <div class="ui form">
        <div class="field" style="min-width: 400px;">
            <label>LOG</label>
            <textarea style="background:black; color:green;">farming...</textarea>
        </div>
    </div>

    <div class="one column row">
        <button class="ui button tall red">stop bot</button>
    </div>
<div class="centered four column row">

    <div class="two column row">
        <div class="ui slider checkbox">
            <input style="margin-left:0px" type="checkbox" name="likes">
            <label>likes</label>
        </div>
        <br/>
        <div  class="ui slider checkbox">
            <input style="margin-left:0px" type="checkbox" name="comments">
            <label>comments</label>
        </div>
    </div>
    <div class="two column row">
        <div class="ui slider checkbox">
            <input style="margin-left:0px" type="checkbox" name="follow">
            <label>follow</label>
        </div>
        <br/>
        <div class="ui slider checkbox">
            <input style="margin-left:0px" type="checkbox" name="unfollow">
            <label>unfollow</label>
        </div>
    </div>
    </div>
    
</div>
</div>