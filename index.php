<?php 

session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");
//include("templates/header.inc.php")

$error_msg = "";
if(isset($_POST['username']) && isset($_POST['passwort'])) {
	$username = $_POST['username'];
	$passwort = $_POST['passwort'];
	$statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
	$result = $statement->execute(array('username' => $username));
	$user = $statement->fetch();
	//Überprüfung des Passworts
	if ($user !== false && password_verify($passwort, $user['passwort'])) {
		$_SESSION['userid'] = $user['id'];

		//Möchte der Nutzer angemeldet beleiben?
		if(isset($_POST['angemeldet_bleiben'])) {
			$identifier = random_string();
			$securitytoken = random_string();
				
			$insert = $pdo->prepare("INSERT INTO securitytokens (user_id, identifier, securitytoken) VALUES (:user_id, :identifier, :securitytoken)");
			$insert->execute(array('user_id' => $user['id'], 'identifier' => $identifier, 'securitytoken' => sha1($securitytoken)));
			setcookie("identifier",$identifier,time()+(3600*24*365)); //Valid for 1 year
			setcookie("securitytoken",$securitytoken,time()+(3600*24*365)); //Valid for 1 year
		}

		header("location: internal.php");
		exit;
	} else {
		$error_msg =  "Benutzername oder Passwort war ungültig<br><br>";
	}

}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.css">
<link rel="stylesheet" href="style.css">

<div class="ui one column center aligned grid">
  <div class="column six wide form-holder">
    <h2 class="center aligned header form-head">Sign in</h2>
    <?php 
if(isset($error_msg) && !empty($error_msg)) {
	echo $error_msg;
}
?>
    <form class="navbar-form navbar-right" action="index.php" method="post">
    <div class="ui form">
      <div class="field">
        <input type="text" name="username" placeholder="username" required>
      </div>
      <div class="field">
        <input type="password" name="passwort" placeholder="password" required>
      </div>
      <div class="field">
        <input type="submit" value="sign in" class="ui button large fluid green">
      </div>
      <div class="inline field">
        <div class="ui checkbox">
          <input type="checkbox">
          <label>an mich erinnern</label>
        </div>
      </div>
      <div class="inline field">
        <div class="ui label">
          <label><a href="register.php">noch keinen Account?</a></label>
        </div>
      </div>
    </div>
    </form>
  </div>
</div>





    <!-- Main jumbotron for a primary marketing message or call to action 
    <div class="jumbotron">
      <div class="container">
        <h1>Loginscript</h1>
        <p>Herzlich Willkommen zum Loginscript von PHP-Einfach.de. Details zu diesem Script sowie eine Schritt-für-Schritt Anleitung findet ihr auf <a href="http://www.php-einfach.de/experte/php-codebeispiele/loginscript/" target="_blank">PHP-Einfach.de &raquo; Loginscript</a>.
        
        Das Design wurde mittels <a href="http://getbootstrap.com" target="_blank">Bootstrap v3.3.6</a> erstellt.<br><br>
        
        Dieser Code ist unter der GPLv3 lizenziert. Ihr könnt ihn also nach belieben auf eure eigene Website stellen und auch verändern, nur der kommerzielle Verkauf des Scripts ist ausgeschlossen. Über einen Link auf <a href="http://www.php-einfach.de" target="_blank">www.php-einfach.de</a> würden wir uns freuen.
        
        </p>
        <p><a class="btn btn-primary btn-lg" href="register.php" role="button">Jetzt registrieren</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns 
      <div class="row">
        <div class="col-md-4">
          <h2>Features</h2>
          <ul>
          	<li>Registrierung & Login</li> 
          	<li>Interner Mitgliederbereich</li>
          	<li>Neues Zusenden eines Passworts</li>
          	<li>Programmcode leicht verständlich und erweiterbar</li>
          	<li>Responsive Webdesign, ideal für PC, Tablet und Smartphone</li>
          </ul>
         
        </div>
        <div class="col-md-4">
          <h2>Dokumentation</h2>
          <p>Auf unserer Website erhaltet ihr eine umfangreiche Einführung in das Loginscript. Ziel ist es nicht einfach nur dieses Script zu dokumentieren, sondern euch zu befähigen eigene Login- und Mitgliederscripts zu erstellen. In den verschiedenen Artikeln auf unserer Website erhaltet umfangreiche Informationen dazu. </p>
          <p><a class="btn btn-default" href="http://www.php-einfach.de/experte/php-codebeispiele/loginscript/" target="_blank" role="button">Weitere Informationen &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Webhosting</h2>
          <p>Möchtet ihr diesen Loginscript für eure Website nutzen, so benötigt ihr PHP fähigen Webspace. Auf unserer Website haben wir die verschiedenen Webhosting-Angebote ausführlich getesten damit ihr den idealen Webspace für eure Website findet.</p>
          <p><a class="btn btn-default" href="http://www.webhosterwissen.de" target="_blank" role="button">Weitere Informationen &raquo;</a></p>
        </div>
      </div>
	</div> <!-- /container -->
      

  
<?php 
//include("templates/footer.inc.php")
?>
