<?php 
    include "../database-manager/config.php"; 
    include "../database-manager/dbm.php"; 
    include "../database-manager/dbm.json.php"; 
    //pages
    
    switch($_GET['page']) {
      case 'new-database':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(db_exist($_POST['database-name'])) {
                notify("warning", "<strong>Warning!</strong> <em>" . $_POST['database-name'] . "</em> already exists. Try using a different name.");
            } else {
                create_db($_POST['database-name']);
                notify("success", "<strong>Success!</strong> " . $_POST['database-name'] . " has been created.");
            } 
        }
        break;
      case 'settings':
       
        break;
      case 'profile':
       
        break;
      case "db":
      
        break;
      default:
        
        break;
    }
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Database Manager</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />

    <!-- Custom styles for this template -->
    <link href="css/dbm.general.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="/">Database Manager</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item<?php \dbm\menu_active('home') ?>">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item<?php \dbm\menu_active('settings') ?>">
            <a class="nav-link" href="?page=settings">Settings</a>
          </li>
          <li class="nav-item<?php \dbm\menu_active('profile') ?>">
            <a class="nav-link" href="?page=profile">Profile</a>
          </li>
          <li class="nav-item<?php \dbm\menu_active('help') ?>">
            <a class="nav-link" href="?page=help">Help</a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <div class="dropdown">
            <i class="fa fa-plus-circle dropdown-toggle" aria-hidden="true" data-toggle="dropdown"></i>
            <ul class="dropdown-menu">
              <li><a href="?page=new-database">New Database</a></li>
            </ul>
          </div>
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
          <ul id="db-menu" class="nav nav-pills flex-column">
            <?php \dbm\get_database_menu(); ?>
          </ul>

          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#">Nav item</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Nav item again</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">One more nav</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Another nav item</a>
            </li>
          </ul>

          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#">Nav item again</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">One more nav</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Another nav item</a>
            </li>
          </ul>
        </nav>

        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <!--Begin content-->
            <?php \dbm\content(); ?>
            <!--End content-->
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    
    <script type="text/javascript" src="js/dbm.general.js"></script>
  </body>
</html>
