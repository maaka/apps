<?php 

include 'includes/db_config.php';
include 'functions/page_functions.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen, projection" />
        <title>Data Center Inventory</title>
    </head>
    <body>
        <div id="wrapper">
        <div id="top_logo">
             <img src="images/Custom_HeadLogo.gif" alt="Logo"/>
<!--             <p>Data Center Inventory</p>-->
        </div>
        <div id="content">
   
<?php


if(!isset($_GET['PartID'])){
    echo default_form();
    }

else if(isset($_GET['PartID']) && is_numeric($_GET['PartID'])){
$part_id=strip_tags($_GET['PartID']);

$output = searchAsset($part_id);
            
 echo "<label>Hostname:</label><input type='text' size='25' value='$output[workstationname]' readonly/>" ; 
 echo '<br/>';
 echo '<br/>';
 echo "<label>IP Address:</label> <input type='text' size='25' value='$output[ipaddress]' readonly/>" ; 
 echo '<br/>';
 echo '<br/>';
 echo "<label>Manufacturer: </label> <input type='text' size='25' value='$output[manufacturer]' readonly/>" ;
 echo '<br/>';
 echo '<br/>';
 echo "<label>Model:</label> <input type='text' size='25' value='$output[model]' readonly/>" ;
 echo '<br/>';
 echo '<br/>';
 echo "<label>Service Tag:</label> <input type='text' size='25' value='$output[servicetag]' readonly/>" ;
 echo '<br/>';
 echo '<br/>';
 echo "<label>Warranty:</label> <input type='text' size='25' value='$output[wdate]' readonly/>" ;
 echo '<br/>';
 echo '<br/>';
 echo "<label>Contract:</label> <input type='text' size='25' value='$output[contractname]' readonly/>" ;
 echo '<br/>';
 echo '<br/>';
 echo "<label>Comments:</label> <input type='text' size='25' value='$output[comments]' readonly/>" ;
 echo '<br/>';
 echo '<br/>';
}

 ?>
        </div>    
    </div>
    </body>
</html>


