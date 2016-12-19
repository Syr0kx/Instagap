<?php
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
$user = check_user();

include("templates/header.inc.php");
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.css">
<link rel="stylesheet" href="style.css">

<style>
{
    /*http://images.google.de/imgres?imgurl=https%3A%2F%2Fstatic.pexels.com%2Fphotos%2F6547%2Fsky-night-space-galaxy.jpeg&imgrefurl=https%3A%2F%2Fwww.pexels.com%2Fsearch%2Fdouble%2520exposure%2F&h=2672&w=5184&tbnid=2325Pcm-DmWkmM%3A&vet=1&docid=1eLStJcGFOeFtM&ei=LbdXWParHIXiUf_DoPAP&tbm=isch&iact=rc&uact=3&dur=944&page=0&start=0&ndsp=39&ved=0ahUKEwi29sX2hoDRAhUFcRQKHf8hCP4QMwgtKBEwEQ&bih=1110&biw=1600*/
    background: url(images/1.jpeg) fixed;
    background-size: cover;
}
</style>

<div class="container main-container">

<h1>Herzlich Willkommen!</h1>

Hallo <?php echo htmlentities($user['vorname']); ?>,<br>
Herzlich Willkommen im internen Bereich!<br><br>

<div class="panel panel-default">
 
<table class="table">
<tr>
	<th>#</th>
	<th>Benutzername</th>
	<th>Vorname</th>
	<th>Nachname</th>
	<th>E-Mail</th>
</tr>
<?php 
$statement = $pdo->prepare("SELECT * FROM users ORDER BY id");
$result = $statement->execute();
$count = 1;
while($row = $statement->fetch()) {
	echo "<tr>";
	echo "<td>".$count++."</td>";
	echo "<td>".$row['username']."</td>";
	echo "<td>".$row['vorname']."</td>";
	echo "<td>".$row['nachname']."</td>";
	echo '<td><a href="mailto:'.$row['email'].'">'.$row['email'].'</a></td>';
	echo "</tr>";
}
?>
</table>
</div>


</div>
<?php 
include("templates/footer.inc.php")
?>
