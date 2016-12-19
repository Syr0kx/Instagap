<?php 
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");
include("templates/header.inc.php");
$vorname = "";
$nachname = "";
$email = "";
$username = "";
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.css">
<div class="ui one column center aligned grid">
  <div class="column six wide form-holder">
    <h2 class="center aligned header form-head">Registrierung</h2>
<?php
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
 
if(isset($_GET['register'])) {
	$error = false;
	$username = trim($_POST['username']);
	$vorname = trim($_POST['vorname']);
	$nachname = trim($_POST['nachname']);
	$email = trim($_POST['email']);
	$passwort = $_POST['passwort'];
	$passwort2 = $_POST['passwort2'];
	
	if(empty($vorname) || empty($nachname) || empty($email)) {
		echo 'Bitte alle Felder ausfüllen<br>';
		$error = true;
	}
  
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
		$error = true;
	} 	
	if(strlen($passwort) == 0) {
		echo 'Bitte ein Passwort angeben<br>';
		$error = true;
	}
	if($passwort != $passwort2) {
		echo 'Die Passwörter müssen übereinstimmen<br>';
		$error = true;
	}
	
	//Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
	if(!$error) { 
		$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
		$result = $statement->execute(array('email' => $email));
		$user = $statement->fetch();
		
		if($user !== false) {
			echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
			$error = true;
		}	
	}
		//Überprüfe, dass der Benutzername noch nicht registriert wurde
	if(!$error) { 
		$statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
		$result = $statement->execute(array('username' => $username));
		$user = $statement->fetch();
		
		if($user !== false) {
			echo 'Dieser Benutzername ist bereits vergeben<br>';
			$error = true;
		}	
	}
	
	//Keine Fehler, wir können den Nutzer registrieren
	if(!$error) {	
		$passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
		
		$statement = $pdo->prepare("INSERT INTO users (email, passwort, vorname, nachname) VALUES (:email, :passwort, :vorname, :nachname)");
		$result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash, 'vorname' => $vorname, 'nachname' => $nachname));
		
		if($result) {		
			echo 'Du wurdest erfolgreich registriert. <a href="index.php">Zum Login</a>';
			$showFormular = false;
		} else {
			echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
		}
	} 
}
 
if($showFormular) {
?>

    <form class="navbar-form navbar-center" action="?register=1" method="post">
    <div class="ui form">
      <div class="field">
        <input type="text" name="username" size="40" maxlength="250" placeholder="Benutzername" value="<?php echo $username?>" required>
      </div>
	        <div class="field">
        <input type="text" name="vorname" size="40" maxlength="250" placeholder="Vorname" value="<?php echo $vorname?>" required>
      </div>
	        <div class="field">
        <input type="text" name="nachname" size="40" maxlength="250" placeholder="Nachname" value="<?php echo $nachname?>" required>
      </div>
	        <div class="field">
        <input type="text" name="email" size="40" maxlength="250" placeholder="Email" value="<?php echo $email?>" required>
      </div>
      <div class="field">
        <input type="password" name="passwort" size="40" maxlength="250" placeholder="Passwort" required>
      </div>
	        <div class="field">
        <input type="password" name="passwort2" size="40" maxlength="250" placeholder="Passwort wiederholen" required>
      </div>
      <div class="field">
        <input type="submit" value="Registrieren" class="ui button large fluid green">
      </div>
    </div>
    </form>
  </div>
</div>

 
<?php
} //Ende von if($showFormular)
	

?>
</div>
<?php 
include("templates/footer.inc.php")
?>