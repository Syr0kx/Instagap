
<?php

include '../vendor/autoload.php';
require '../vendor/mgp25/instagram-php/src/Instagram.php';


    /////// CONFIG ///////
    $stop = false;
    $debug = false;
    $running = false;
    $yourfollowers=0;




    # If instagram ban you - query return 400 error.
    $error_400 = 0;
    # If you have 3 400 error in row - looks like you banned.
    $error_400_to_ban = 3;
    # If InstaBot think you are banned - going to sleep.
    $ban_sleep_time = 2 * 60 * 60;

    # All counter.
    $bot_mode = 0;
    $like_counter = 0;
    $follow_counter = 0;
    $unfollow_counter = 0;
    $comments_counter = 0;
    $current_user ='hajka';
    $current_index = 0;
    current_id = 'abcds';
    # List of user_id, that bot follow
    $bot_follow_list = [];
    $user_info_list = [];
    $user_list = [];
    $ex_user_list = [];
    $unwanted_username_list = [];
    $is_checked = False;
    $is_active_user = False;
    $is_following = False;
    $is_follower = False;
    $is_rejected = False;
    $is_self_checking = False;
    $is_by_tag = False;
    $is_follower_number = 0;

    $self_following = 0;
    $self_follower = 0;


    # Log setting.
    $log_file_path = '';
    $log_file = 0;

    # Other.
    $user_id = 0;
    $media_by_tag = 0;
    $media_on_feed = [];
    $media_by_user = [];
    $login_status = False;


    //////////////////////



$i = new \InstagramAPI\Instagram($debug);

$i->setUser($username, $password);

try {
    $i->login();
} catch (Exception $e) {
    echo 'something went wrong '.$e->getMessage()."\n";
    exit(0);
}
$yourfollowers = getFollowers($i);
function getFollowers($i){
        try {
                $helper = null;
                $followers = [];

                do {
                    if (is_null($helper)) {
                        $helper = $i->getSelfUserFollowers();
                    } else {
                        $helper = $i->getSelfUserFollowers($helper->getNextMaxId());
                    }

                    $followers = array_merge($followers, $helper->getUsers());
                } while (!is_null($helper->getNextMaxId()));

                $yourfollowers = count($followers);
        } catch (Exception $e) {
            echo $e->getMessage();
    }
    return $yourfollowers;
}


 //get followercount
//--> hier werden die settings gefetcht

?>
<script src="http://code.jquery.com/jquery-latest.js"></script> 



<script type="text/javascript">    
var refreshIntervalId = null;
var i = 0;
function updateLoop() {
    document.getElementById('text').innerHTML +=  ""+ i++ +" loading followers...\n";
    var textarea = document.getElementById('text');
    textarea.scrollTop = textarea.scrollHeight;
}
function startBot(){
    document.getElementById('status_banner').innerHTML = "running...";
    document.getElementById("status_banner").className = "ui top attached label green";
    document.getElementById("start_button").className = "ui button tall disabled green";
    document.getElementById("stop_button").className = "ui button tall red";
    refreshIntervalId = setInterval(updateLoop,2000);
}
function stopBot(){
    document.getElementById('status_banner').innerHTML = "stopped";
    document.getElementById("status_banner").className = "ui top attached label red";
    document.getElementById("stop_button").className = "ui button tall disabled red";
    document.getElementById("start_button").className = "ui button tall green";
    clearInterval(refreshIntervalId);
}



</script>