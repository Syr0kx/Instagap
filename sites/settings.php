<?php
session_start();
require_once("../inc/config.inc.php");
require_once("../inc/functions.inc.php");


//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
$user = check_user();

include("../templates/header.inc.php");

if(isset($_GET['save'])) {
	$save = $_GET['save'];
	
	if($save == 'personal_data') {
		$vorname = trim($_POST['vorname']);
		$nachname = trim($_POST['nachname']);
		
		if($vorname == "" || $nachname == "") {
			$error_msg = "Bitte Vor- und Nachname ausfüllen.";
		} else {
			$statement = $pdo->prepare("UPDATE users SET vorname = :vorname, nachname = :nachname, updated_at=NOW() WHERE id = :userid");
			$result = $statement->execute(array('vorname' => $vorname, 'nachname'=> $nachname, 'userid' => $user['id'] ));
			
			$success_msg = "Daten erfolgreich gespeichert.";
		}
	} else if($save == 'email') {
		$passwort = $_POST['passwort'];
		$email = trim($_POST['email']);
		$email2 = trim($_POST['email2']);
		
		if($email != $email2) {
			$error_msg = "Die eingegebenen E-Mail-Adressen stimmten nicht überein.";
		} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error_msg = "Bitte eine gültige E-Mail-Adresse eingeben.";
		} else if(!password_verify($passwort, $user['passwort'])) {
			$error_msg = "Bitte korrektes Passwort eingeben.";
		} else {
			$statement = $pdo->prepare("UPDATE users SET email = :email WHERE id = :userid");
			$result = $statement->execute(array('email' => $email, 'userid' => $user['id'] ));
				
			$success_msg = "E-Mail-Adresse erfolgreich gespeichert.";
		}
		
	}else if($save == 'username') {//her fehlt noch eine überprüfung, ob der Benutzername schon vorhanden ist..
		$passwort = $_POST['passwort'];
		$username = trim($_POST['username']);
		$username2 = trim($_POST['username2']);
		
		if($username != $username2) {
			$error_msg = "Die eingegebenen Benutzernamen stimmten nicht überein.";
		} else if(!password_verify($passwort, $user['passwort'])) {
			$error_msg = "Bitte korrektes Passwort eingeben.";
		} else {
			$statement = $pdo->prepare("UPDATE users SET username = :username WHERE id = :userid");
			$result = $statement->execute(array('username' => $username, 'userid' => $user['id'] ));
				
			$success_msg = "Benutzername erfolgreich gespeichert.";
		}
		
	} else if($save == 'passwort') {
		$passwortAlt = $_POST['passwortAlt'];
		$passwortNeu = trim($_POST['passwortNeu']);
		$passwortNeu2 = trim($_POST['passwortNeu2']);
		
		if($passwortNeu != $passwortNeu2) {
			$error_msg = "Die eingegebenen Passwörter stimmten nicht überein.";
		} else if($passwortNeu == "") {
			$error_msg = "Das Passwort darf nicht leer sein.";
		} else if(!password_verify($passwortAlt, $user['passwort'])) {
			$error_msg = "Bitte korrektes Passwort eingeben.";
		} else {
			$passwort_hash = password_hash($passwortNeu, PASSWORD_DEFAULT);
				
			$statement = $pdo->prepare("UPDATE users SET passwort = :passwort WHERE id = :userid");
			$result = $statement->execute(array('passwort' => $passwort_hash, 'userid' => $user['id'] ));
				
			$success_msg = "Passwort erfolgreich gespeichert.";
		}
		
	}else if($save == 'instagram') {
		
		$sql = "DELETE FROM instagram WHERE ID = :ID";
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':ID',htmlentities($user['id']));
		$stmt->execute();
	}
}

$user = check_user();

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.css">
<link rel="stylesheet" href="../css/style.css">

<div class="container main-container">
<h1>Einstellungen</h1>

<?php 
if(isset($success_msg) && !empty($success_msg)):
?>
	<div class="alert alert-success">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  	<?php echo $success_msg; ?>
	</div>
<?php 
endif;
?>

<?php 
if(isset($error_msg) && !empty($error_msg)):
?>
	<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  	<?php echo $error_msg; ?>
	</div>
<?php 
endif;
?>

<div>

  <!-- Nav tabs -->
  <!--ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#data" aria-controls="home" role="tab" data-toggle="tab">Persönliche Daten</a></li>
	<li role="presentation"><a href="#username" aria-controls="profile" role="tab" data-toggle="tab">Benutzername</a></li>
    <li role="presentation"><a href="#email" aria-controls="profile" role="tab" data-toggle="tab">E-Mail</a></li>
    <li role="presentation"><a href="#passwort" aria-controls="messages" role="tab" data-toggle="tab">Passwort</a></li>
	<li role="presentation"><a href="#instagram" aria-controls="messages" role="tab" data-toggle="tab">Instagram verknüpfung</a></li>
  </ul-->

  <!-- Persönliche Daten-->
    	<br>
		<h3 style="text-align:center">Namen ändern</h3>
    	<form action="?save=personal_data" method="post" class="form-horizontal">
    		<div class="form-group">
    			<label for="inputVorname" class="col-sm-2 control-label">Vorname</label>
    			<div class="col-sm-10">
    				<input class="form-control" id="inputVorname" name="vorname" type="text" value="<?php echo htmlentities($user['vorname']); ?>" required>
    			</div>
    		</div>
    		
    		<div class="form-group">
    			<label for="inputNachname" class="col-sm-2 control-label">Nachname</label>
    			<div class="col-sm-10">
    				<input class="form-control" id="inputNachname" name="nachname" type="text" value="<?php echo htmlentities($user['nachname']); ?>" required>
    			</div>
    		</div>
    		
    		<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="ui button fluid large blue">Speichern</button>
			    </div>
			</div>
    	</form>
    <!-- Änderung der E-Mail-Adresse -->
    	<br>
    	<h3 style="text-align:center">E-Mail ändern</h3>
    	<form action="?save=email" method="post" class="form-horizontal">
    		<div class="form-group">
    			<label for="inputPasswort" class="col-sm-2 control-label">Passwort</label>
    			<div class="col-sm-10">
    				<input class="form-control" id="inputPasswort" name="passwort" type="password" required>
    			</div>
    		</div>
    		
    		<div class="form-group">
    			<label for="inputEmail" class="col-sm-2 control-label">E-Mail</label>
    			<div class="col-sm-10">
    				<input class="form-control" id="inputEmail" name="email" type="email" value="<?php echo htmlentities($user['email']); ?>" required>
    			</div>
    		</div>
    		
    		
    		<div class="form-group">
    			<label for="inputEmail2" class="col-sm-2 control-label">E-Mail (wiederholen)</label>
    			<div class="col-sm-10">
    				<input class="form-control" id="inputEmail2" name="email2" type="email"  required>
    			</div>
    		</div>
    		
    		<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="ui button fluid large blue">Speichern</button>
			    </div>
			</div>
    	</form>

	    <!-- Änderung des Benutzernamens -->
    	<br>
    	<h3 style="text-align:center">Benutzernamen ändern</h3>
    	<form action="?save=username" method="post" class="form-horizontal">
    		<div class="form-group">
    			<label for="inputPasswort" class="col-sm-2 control-label">Passwort</label>
    			<div class="col-sm-10">
    				<input class="form-control" id="inputPasswort" name="passwort" type="password" required>
    			</div>
    		</div>
    		
    		<div class="form-group">
    			<label for="inputEmail" class="col-sm-2 control-label">Benutzername</label>
    			<div class="col-sm-10">
    				<input class="form-control" id="inputusername" name="username" type="text" required>
    			</div>
    		</div>
    		
    		
    		<div class="form-group">
    			<label for="inputEmail2" class="col-sm-2 control-label">Benutzername (wiederholen)</label>
    			<div class="col-sm-10">
    				<input class="form-control" id="inputusername2" name="username2" type="text"  required>
    			</div>
    		</div>
    		
    		<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="ui button fluid large blue">Speichern</button>
			    </div>
			</div>
    	</form>
    
    <!-- Änderung des Passworts -->
    	<br>
    	<h3 style="text-align:center">Passwort ändern</h3>
    	<form action="?save=passwort" method="post" class="form-horizontal">
    		<div class="form-group">
    			<label for="inputPasswort" class="col-sm-2 control-label">Altes Passwort</label>
    			<div class="col-sm-10">
    				<input class="form-control" id="inputPasswort" name="passwortAlt" type="password" required>
    			</div>
    		</div>
    		
    		<div class="form-group">
    			<label for="inputPasswortNeu" class="col-sm-2 control-label">Neues Passwort</label>
    			<div class="col-sm-10">
    				<input class="form-control" id="inputPasswortNeu" name="passwortNeu" type="password" required>
    			</div>
    		</div>
    		
    		
    		<div class="form-group">
    			<label for="inputPasswortNeu2" class="col-sm-2 control-label">Neues Passwort (wiederholen)</label>
    			<div class="col-sm-10">
    				<input class="form-control" id="inputPasswortNeu2" name="passwortNeu2" type="password"  required>
    			</div>
    		</div>
    		
    		<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="ui button fluid large blue">Speichern</button>
			    </div>
			</div>
    	</form>
	<!-- Instagram verknüpfung -->
	<br>
	<h3 style="text-align:center">Instagram-Konto</h3>
<?php
$select = $pdo->prepare("SELECT username FROM instagram WHERE instagram.id = ".htmlentities($user['id']));
$select->execute();
$result = $select->fetchColumn();
$count = $select->rowCount();
if($count > 0)
{
	
    ?>
	
	<p style="text-align:center">Sie sind verbunden mit <?php echo $result;?><p>

	<form action="?save=instagram" method="post" class="form-horizontal">
		<div class="form-group">
			<div class="col-sm-offset-5 col-sm-10">
				<button style="color:white" class="ui button large red">Entknüpfen</button>
			</div>
		</div>
	</form>
<?php


}
else
{
	?>
		<p style="text-align:center">Momentan mit keinem Instagram Konto verknüpft :(</p>
		
    	<form action="instagap.php" method="post" class="form-horizontal">
			<div class="form-group">
				<div class="col-sm-offset-5 col-sm-10">
					<button style="color:white" class="ui button large green">Verknüpfen</button>
				</div>
			</div>
		</form>
		<?php
}
?>

		

    </div>

</div>


</div>
<?php 
include("../templates/footer.inc.php")
?>
