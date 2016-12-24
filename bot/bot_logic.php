
<?php

include '../vendor/autoload.php';
require '../vendor/mgp25/instagram-php/src/Instagram.php';


    /////// CONFIG ///////
    $stop = false;
    $debug = false;
    $running = false;
    $yourfollowers=0;

    # All counter.
    $like_counter = 0;
    $follow_counter = 0;
    $unfollow_counter = 0;
    $comments_counter = 0;

    
    $bot_follow_list = [];
    $user_info_list = [];
    $user_list = [];
    $ex_user_list = [];
    $unwanted_username_list = [];
    $is_checked = False;
    $is_active_user = False;
    $is_following = False;
    $is_follower = False;
    $is_follower_number = 0;


    $self_following = 0;
    $self_follower = 0;


    # Log setting.
    $log_file_path = '';
    $log_file = 0;

    //////////////////////

$user_session_is_valid = false;

/////////////////////// SESSION ///////////////////////
//Muss später ein eigenes script sein wo die session gespeichert wird//


$i = new \InstagramAPI\Instagram($debug);

$i->setUser($username, $password);

try {
    $i->login();
} catch (Exception $e) {
    echo 'something went wrong '.$e->getMessage()."\n";
    exit(0);
}

/////////////////////// SESSION END ////////////////////



/////////////////////// BOT LOOP ///////////////////////
while ($user_session_is_valid){

// Call Functions like, follow , unfollow, and comment in a loop
$yourfollowers = getFollowers($i);
//usleep($likes_per_day /*24*60)/1000 ~maximal*/;//~1,2min
//like_by_tag($i);

usleep(240000); // alle 4 minuten wird gefollowed
follow_by_tag($i);

}



/////////////////////// BOT LOOP END ///////////////////





/////////////////////// FUNCTIONS ///////////////////////



/////////////////////// FUNCTIONS END ///////////////////

//$i->tagFeed($tag);//js function textbox->$tag !


function follow_by_tag($I){

$hashtagString = '#design';

    try {
            $helper = null;
            $media = [];
            $users = [];
            $i=0;

            do {
                    if (is_null($helper)) {
                                //puts media id array into helper
                                $helper = $i->getHashtagFeed($hashtagString, $maxid = null);
                    } else {
                                $helper = $i->getHashtagFeed($helper->getNextMaxId());
                    }

                $media = array_merge($media, $helper->getMediaId());

                } while (!is_null($helper->getNextMaxId()));

            //get media likers
            foreach($media as $mediaId){
                $users = $i->getMediaLikers($mediaId);
            }
                                
            while(i<1){
                //Follow a user in the userlist
                foreach($users as $userId){
                    $i->follow($userId);
                    echo 'trying to follow user:'.$userId.'.';
                    $i++;
                }
            }
                    
        } catch (Exception $e) {
                echo $e->getMessage();
                echo 'failed to follow userID:'. $userId;
        }

}

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
function get_content_Hashtag(){
 var html = document.getElementById("hashTagText").innerHTML;

}
</script>