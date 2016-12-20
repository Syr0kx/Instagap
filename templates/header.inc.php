<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Loginscript</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.css">
    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
  </head>
  <body>
  
  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="instagap.php"><i class="glyphicon glyphicon-camera logo"></i>Instagap</a>
        </div>
        <?php if(!is_checked_in()): ?>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" action="../index.php" method="post">
			<table class="login" role="presentation">
				<tbody>
					<tr>
						<td>							
							<div class="field">
								<input class="form-control" placeholder="Benutzername" name="username" type="text" required>								
							</div>
						</td>
						<td>
            <div class="field">
            <input class="form-control" placeholder="Passwort" name="passwort" type="password" style="margin-left: 15px; margin-right: 15px" required>
            </div>
            </td>
						<td>
            <div class="field">
            <input type="submit" class="ui button large fluid green" style="font-size: 13px;" value="Login">
            </div>
            </td>
					</tr>
					<tr>
						<td><label style="margin-bottom: 0px; font-weight: normal;"><input type="checkbox" name="angemeldet_bleiben" value="remember-me" title="Angemeldet bleiben"  checked="checked" style="margin: 0; vertical-align: middle;" /> <small>Angemeldet bleiben</small></label></td>
						<td><small style="margin-left: 15px"><a href="../sites/passwortvergessen.php">Passwort vergessen</a></small></td>
						<td></td>
					</tr>					
				</tbody>
			</table>		
          
            
          </form>         
        </div><!--/.navbar-collapse -->
        <?php else: ?>
        <div id="navbar" class="navbar-collapse collapse">
         <ul class="nav navbar-nav navbar-right">     
           <li><a href="instagap.php">InstagramBot</a></li>  
         	  <li><a href="news.php">News</a></li>     
            <li><a href="settings.php">Einstellungen</a></li>
            <li><a style="color:red" href="../sites/logout.php">Logout</a></li>
          </ul>   
        </div><!--/.navbar-collapse -->
        <?php endif; ?>
      </div>


    </nav>

   