<?php
error_reporting(E_ERROR | E_PARSE);
if($_GET['controller']=='logout') {
$_SESSION['id'] = '';
$_SESSION['roleID'] = '';
	header("Location: index.php?controller=login"); /* Redirect browser */
	exit();

}
if($_SESSION['roleID'] == 2 or !$_SESSION['roleID'])  { $login_link = '
            <li><a href="index.php?controller=login">login</a></li>'; } else {  $login_link ='<li><a href="index.php?controller=logout">login</a></li>'; }
  // file: navigation.php
  // put all nav links in one file and use throughout the app  
  print '
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Word Start</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>

            </ul>
        
          <ul class="nav navbar-nav navbar-right">
            '. $login_link .'
            
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
</nav>
';
?>

      