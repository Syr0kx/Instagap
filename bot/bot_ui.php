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
    <div id="status_banner" class="ui top attached label red"style="margin-top:50px; font-size:1em;">
        stopped
    </div>


    </div>

<div class="ui centered one column grid" style="margin-top:50px">


    <div class="ui form">
        <div class="field" style="min-width: 400px;">
            <label>LOG</label>
            <div><textarea id="text" style="background:black; color:green; overflow:hidden; resize: none;" readonly></textarea></div>
        </div>
    </div>

    <div class="two column row">
        <button id="start_button" class="ui button tall green" onclick="startBot()">start bot</button>
        <button id="stop_button" class="ui button tall disabled red" onclick="stopBot()">stop bot</button>
    </div>

    <div class="one column row">
       <label id="follower_label">your followers: <?php echo $yourfollowers; ?></label>
    </div>

    <div>
        <div class="ui labeled action input">
            <div class="ui label">
                #
            </div>
            <input id="hashTagText" type="text" placeholder="follows by hashtag">
              <button class="ui icon button">Go</button>
  </button>
        </div>
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