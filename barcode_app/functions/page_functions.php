<?php

function searchAsset($part_id){
    
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
        WHERE systeminfo.workstationid = '".$part_id."'";

$rs = pg_query($query) or die("Cannot execute query: $query\n");


while ($row = pg_fetch_assoc($rs)) {

          return $row; 
            
    }   
    
    pg_close($con); 
}

function asset_search($term){
    
    

        $query = "SELECT systeminfo.workstationid, resources.resourceid, resourcelocation.resourceid, maintenancecontract.maintenancevendor, networkinfo.ipaddress, systeminfo.workstationname, 
            systeminfo.manufacturer, systeminfo.model, systeminfo.servicetag, to_char(from_unixtime(resources.warrantyexpiry/1000),'DD/MM/YYYY HH24:MI:SS') wdate, maintenancecontract.contractname, maintenancecontract.comments, maintenancecontract.support, 
            to_char(from_unixtime(maintenancecontract.fromdate/1000),'DD/MM/YYYY HH24:MI:SS') Date, 
            maintenancecontract.todate, maintenancecontract.contractname
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
                    WHERE CAST(systeminfo.workstationid as varchar(100)) LIKE '$term' OR systeminfo.workstationname LIKE '$term' OR networkinfo.ipaddress LIKE '$term' OR systeminfo.model LIKE '$term' "
                . "OR systeminfo.model LIKE '$term' OR systeminfo.manufacturer LIKE '$term'";


    $rs = pg_query($query) or die("Cannot execute query: $query\n");


        while ($row = pg_fetch_assoc($rs)) {

            //$num_rows = pg_num_rows($rs);
            
            return $row; 
        }
}

function adminPage(){
    
           $query = "SELECT systeminfo.workstationid, resources.resourceid, resourcelocation.resourceid, maintenancecontract.maintenancevendor, networkinfo.ipaddress, systeminfo.workstationname, 
        systeminfo.manufacturer, systeminfo.model, systeminfo.servicetag, to_char(from_unixtime(resources.warrantyexpiry/1000),'DD/MM/YYYY HH24:MI:SS') wdate, maintenancecontract.contractname, maintenancecontract.comments, maintenancecontract.support, 
        to_char(from_unixtime(maintenancecontract.fromdate/1000),'DD/MM/YYYY HH24:MI:SS') Date, 
        maintenancecontract.todate, maintenancecontract.contractname
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
        ON vendordefinition.vendorid=maintenancecontract.maintenancevendor";


        $rs = pg_query($query) or die("Cannot execute query: $query\n");

            while ($row = pg_fetch_assoc($rs)) {

            // Create variables from SQL query
            $workstationid = $row['workstationid']; 
            $workstationname = $row['workstationname']; 
            $ipadress = $row['ipaddress']; 
            $model = $row['model'];
            $servicetag = $row['servicetag'];
            $warrantyexpiry = $row['wdate'];
            $manufacturer = $row['manufacturer'];
            $contract = $row['contractname'];
            $comments = $row['comments'];
            $fromdate = $row['date'];

            echo "<tr>";
               echo "<td>$workstationid</td>" ;
               echo "<td>$workstationname</td>" ; 
               echo "<td>$ipadress</td>" ; 
               echo "<td>$manufacturer</td>" ; 
               echo "<td>$model</td>" ; 
               echo "<td>$servicetag</td>" ; 
               echo "<td>$warrantyexpiry</td>" ; 
               echo "<td>$contract</td>" ; 
               echo "<td>$comments</td>" ; 

             echo "</tr>";
                }
}

function default_form(){
    
    echo "<label>Hostname:</label><input type='text' size='25' readonly/>" ; 
     echo '<br/>';
     echo '<br/>';
     echo "<label>IP Address:</label> <input type='text' size='25' readonly/>" ; 
     echo '<br/>';
     echo '<br/>';
     echo "<label>Manufacturer: </label> <input type='text' size='25' readonly/>" ;
     echo '<br/>';
     echo '<br/>';
     echo "<label>Model:</label> <input type='text' size='25' readonly/>" ;
     echo '<br/>';
     echo '<br/>';
     echo "<label>Service Tag:</label> <input type='text' size='25' readonly/>" ;
     echo '<br/>';
     echo '<br/>';
     echo "<label>Warrenty:</label> <input type='text' size='25' readonly/>" ;
     echo '<br/>';
     echo '<br/>';
     echo "<label>Contract:</label> <input type='text' size='25' readonly/>" ;
     echo '<br/>';
     echo '<br/>';
     echo "<label>Comments:</label> <input type='text' size='25' readonly/>" ;
     echo '<br/>';
     echo '<br/>';
}

















