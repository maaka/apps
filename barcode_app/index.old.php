
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
     echo "<label>Hostname:</label><input type='text' size='25' id='workstationname' readonly/>" ; 
     echo '<br/>';
     echo '<br/>';
     echo "<label>IP Address:</label> <input type='text' size='25' id='ipaddress' readonly/>" ; 
     echo '<br/>';
     echo '<br/>';
     echo "<label>Manufacturer: </label> <input type='text' size='25' id='manufacturer' readonly/>" ;
     echo '<br/>';
     echo '<br/>';
     echo "<label>Model:</label> <input type='text' size='25' id='model' readonly/>" ;
     echo '<br/>';
     echo '<br/>';
     echo "<label>Service Tag:</label> <input type='text' size='25' id='servicetag' readonly/>" ;
     echo '<br/>';
     echo '<br/>';
     echo "<label>Warrenty:</label> <input type='text' size='25' id='Warrenty Expire' readonly/>" ;
     echo '<br/>';
     echo '<br/>';
     echo "<label>Contract:</label> <input type='text' size='25' id='Contract Name' readonly/>" ;
     echo '<br/>';
     echo '<br/>';
     echo "<label>Comments:</label> <input type='text' size='25' id='Comments' readonly/>" ;
     echo '<br/>';
     echo '<br/>';
    }


else if(isset($_GET['PartID'])){
include 'includes/db_config.php';
$part_id=strip_tags($_GET['PartID']);
$query = "SELECT systeminfo.workstationid, resources.resourceid, resourcelocation.resourceid, maintenancecontract.maintenancevendor, networkinfo.ipaddress, systeminfo.workstationname, 
        systeminfo.manufacturer, systeminfo.model, systeminfo.servicetag, to_char(from_unixtime(resources.warrantyexpiry/1000),'DD/MM/YYYY HH24:MI:SS') wdate, maintenancecontract.contractname, 
        maintenancecontract.comments, maintenancecontract.support, 
        maintenancecontract.contractname
        FROM systeminfo
        JOIN networkinfo
        ON systeminfo.workstationid=networkinfo.workstationid 
        JOIN resourcelocation
        ON systeminfo.workstationid=resourcelocation.resourceid
        JOIN resources
        ON resourcelocation.resourceid=resources.resourceid
        FULL OUTER JOIN vendordefinition
        ON resources.resourceid=vendordefinition.vendorid
        FULL OUTER JOIN maintenancecontract
        ON vendordefinition.vendorid=maintenancecontract.maintenancevendor
        where systeminfo.workstationid = '".$part_id."'";



$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
}

while ($row = pg_fetch_assoc($rs)) {

// Create variables from SQL query
            $workstationname = $row['workstationname']; 
            $ipadress = $row['ipaddress']; 
            $manufacturer = $row['manufacturer'];
            $model = $row['model'];
            $servicetag = $row['servicetag'];
            $warrantyexpiry = $row['wdate'];
            $contract = $row['contractname'];
            $comments = $row['comments'];

 echo "<label>Hostname:</label><input type='text' size='25' id='workstationname' value='$workstationname' readonly/>" ; 
 echo '<br/>';
 echo '<br/>';
 echo "<label>IP Address:</label> <input type='text' size='25' id='ipaddress' value='$ipadress' readonly/>" ; 
 echo '<br/>';
 echo '<br/>';
 echo "<label>Manufacturer: </label> <input type='text' size='25' id='manufacturer' value='$manufacturer' readonly/>" ;
 echo '<br/>';
 echo '<br/>';
 echo "<label>Model:</label> <input type='text' size='25' id='model' value='$model' readonly/>" ;
 echo '<br/>';
 echo '<br/>';
 echo "<label>Service Tag:</label> <input type='text' size='25' id='servicetag' value='$servicetag' readonly/>" ;
 echo '<br/>';
 echo '<br/>';
 echo "<label>Warrenty:</label> <input type='text' size='25' id='Warrenty Expire' value='$warrantyexpiry' readonly/>" ;
 echo '<br/>';
 echo '<br/>';
 echo "<label>Contract:</label> <input type='text' size='25' id='Contract Name' value='$contract' readonly/>" ;
 echo '<br/>';
 echo '<br/>';
 echo "<label>Comments:</label> <input type='text' size='25' id='Comments' value='$comments' readonly/>" ;
 echo '<br/>';
 echo '<br/>';

}

pg_close($con); 

?>
        </div>    
    </div>
    </body>
</html>



