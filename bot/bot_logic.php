
<?php

include '../../../../vendor/autoload.php';
require '../src/Instagram.php';

/////// CONFIG ///////

$debug = false;
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

//--> hier werden die settings gefetcht
?>