    <!--Hier ist der BOT-->
  <?php
    include 'bot_logic.php'; 
    if(isset($_POST['startstop']))
    if($_POST['startstop']=='start')
    {
        $running = true;
    }
    else
    {
        $running = false;
    }
  ?>

     <style>
	.container{min-height: calc(100% - 70px)!important};
    </style>
    <div class="container">
    <div class="one column row">
    <div class="ui top attached label <?php if($running){echo 'green';}else{echo 'red';}?>"style="margin-top:50px; font-size:1em;">
        <?php if($running){echo 'running...';}else{echo 'stopped';}?>
    </div>


    </div>
    
<!--div class="ui icon message" style="margin-top:20px">
  <i class="inbox icon"></i>
  <div class="content">
    <div class="header">
      Have you checked your messages yet?
    </div>
    <p>There might be a gift for you!</p>
  </div>
</div-->


<div class="ui centered one column grid" style="margin-top:50px">


    <div class="ui form">
        <div class="field" style="min-width: 400px;">
            <label>LOG</label>
            <textarea style="background:black; color:green;">farming...</textarea>
        </div>
    </div>

    <div class="two column row">
        <form action="instagap.php" method="post">
        <button type="submit" name="startstop" value="start" class="ui button tall <?php if($running){echo 'disabled';}else{echo '';}?> green">start bot</button>
        <button type="submit" name="startstop" value="stop" class="ui button tall <?php if($running){echo '';}else{echo 'disabled';}?> red">stop bot</button>
        </form>
    </div>

    <div class="one column row">
       <label>your followers: <?php echo $yourfollowers; ?></label>
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