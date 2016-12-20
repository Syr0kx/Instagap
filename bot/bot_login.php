<?php

include '../vendor/autoload.php';
require '../vendor/mgp25/instagram-php/src/Instagram.php';
if(isset($_POST['username'])&&isset($_POST['passwort'])) {
$username = $_POST['username'];
$password = $_POST['passwort'];
$debug = false;

$i = new \InstagramAPI\Instagram($debug);

$i->setUser($username, $password);

try {
    $i->login();
    echo "login erfolgreich";
} catch (Exception $e) {
    echo 'something went wrong '.$e->getMessage()."\n";
    exit(0);
}



echo "Benutzername: ".$username."\n";
echo "Passwort: ".$passwort;
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.css">
<link rel="stylesheet" href="../css/style.css">
   <style>
	.container{min-height: calc(100% - 70px)!important};
   body{background: #fafafa;}
   .ui.form .field{margin-right: 30px; margin-left: 30px; margin-top: 1em}
   p{font-family:Billabong;font-size:50px;margin-bottom:-10px; padding-top:10px;}
   .column.six.wide.form-holder{padding:0.0.0.0; background-color: #fff; border-radius: 1px; border: 1px solid #efefef}
   </style>
   <div class="container">
   <div class="ui one column center aligned grid">
    <div class="column six wide form-holder" style="width:350px!important;">
    <p>Instagram</p>
    <form action="../sites/instagap.php" method="post">
    <div class="ui form">
      <div class="field">
        <input type="text" style="margin:0.0.0.0" name="username" placeholder="Benutzername" autocomplete="off" required>
      </div>
      <div class="field">
        <input type="password" style="margin:0.0.0.0" name="passwort" placeholder="Passwort" autocomplete="off" required>
      </div>
      <div class="field">
        <input style="font-size:15px; background: #3897f0;color:white; margin-bottom: 30px" type="submit" value="Anmelden" class="ui button fluid large ">
      </div>
    </div>
    </form>
</div>
</div>
</div>
