
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

 //get followercount
//--> hier werden die settings gefetcht

?>