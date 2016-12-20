<?php

include '../vendor/autoload.php';
require '../vendor/mgp25/instagram-php/src/Instagram.php';
if(isset($_POST['username'])&&isset($_POST['passwort'])) {
$username = $_POST['username'];
$password = $_POST['passwort'];
$user = check_user();
$debug = false;
$error = false;

$i = new \InstagramAPI\Instagram($debug);

$i->setUser($username, $password);

try {
    $i->login();

	if(!$error) { 
		$statement = $pdo->prepare("SELECT * FROM instagram WHERE username = :username");
		$result = $statement->execute(array('username' => $username));
		$user = $statement->fetch();
		
		if($user !== false) {
			echo 'Dieser Instagramaccount ist bereits verlinkt<br>';
			$error = true;
		}	
  }

  	if(!$error) { 
		$statement = $pdo->prepare("SELECT * FROM instagram WHERE id = :id");
		$result = $statement->execute(array('id' => htmlentities($user['id'])));
		$user = $statement->fetch();
		
		if($user !== false) {
			echo 'Dieser Account hat schon eine Instagram verknüpfung<br>';
			$error = true;
		}	
	}

  if(!$error)
  {
    $passwort_hash = password_hash($password, PASSWORD_DEFAULT);
    $statement = $pdo->prepare("INSERT INTO instagram (id, username, password) VALUES (:id, :username, :password)");
		$result = $statement->execute(array('id' => htmlentities($user['id']), 'username' => $username, 'password' => $passwort_hash));
		
		if($result) {		
        //refresh
		} else {
			echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
		}
  }

} catch (Exception $e) {
    echo 'something went wrong '.$e->getMessage()."\n";
    exit(0);
}
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
