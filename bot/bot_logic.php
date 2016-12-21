
<?php

include '../vendor/autoload.php';
require '../vendor/mgp25/instagram-php/src/Instagram.php';
/////// CONFIG ///////
$stop = false;
$debug = false;
$running = false;
$yourfollowers=0;
//////////////////////

// THIS IS AN EXAMPLE OF HOW TO USE NEXT_MAX_ID TO PAGINATE
// IN THIS EXAMPLE, WE ARE RETRIEVING SELF FOLLOWERS
// BUT THE PROCESS IS SIMILAR IN OTHER REQUESTS

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