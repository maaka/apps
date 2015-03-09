<?php

include '../includes/db_config.php';
include '../functions/page_functions.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Admin Page</title>
    
    <!-- Demo styling -->
    <link href="css/jq.css" rel="stylesheet">
    
    <!--jQuery: required (tablesorter works with jQuery 1.2.3+) -->
    <script src="js/jquery-1.2.6.min.js"></script>
    
    <!-- Pick a theme, load the plugin & initialize plugin -->
    <link href="css/theme.default.css" rel="stylesheet">

   <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
     <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    
    
    
        <!-- JQuery CSS-->
<!--    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">-->
    <!-- <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>-->
<!--    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>-->
    

    <script src="js/jquery.tablesorter.min.js"></script>
	<script src="js/jquery.tablesorter.widgets.min.js"></script>
	
	<script>
	$(function(){
		$('table').tablesorter({
			widgets        : ['zebra', 'columns'],
			usNumberFormat : false,
			sortReset      : true,
			sortRestart    : true
		});
	});
	</script>

  </head>

  <body>
      



    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Manage Engine Asset Lookup</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
<!--          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>-->

            <!-- Search Bar-->
            <form action="search.php"class="navbar-form navbar-right" method="GET">
                <input type="text" class="form-control" name="term" placeholder="Search...">
                
                <input type="submit" value="Search">
          </form>
            
        </div>
      </div>
    </nav>
 
<div class="container-fluid">
<div class="row">
<!--        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
        </div>-->
<div class="col-md-15 col-md-offset-0 main">
  <h1 class="page-header">Assets List</h1>
  <div class="table-responsive">
      <table class="table table-striped tablesorter">
        <thead>
        <tr>
           <th>Workstation ID</th>
           <th>Hostname</th>
          <th>IP Address</th>
          <th>Manufacturer</th>
          <th>Model</th>
          <th>Service Tag</th>
          <th>Warranty Expiration</th>
          <th>Contract</th>
          <th>Comments</th>
                  
                 
        </tr>
      </thead>
      <tbody>
        <?php

        echo adminPage();
        
        

 
             ?>
          </tbody>
        </table>
      </div>
</div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
     IE10 viewport hack for Surface/desktop Windows 8 bug 
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
  </body>
</html>
