<?php

function printWaypointList(){
    require_once('../globalsettings.php');

    //$optionsGetWaypoints = array('location' => 'http://localhost/Remote-sailing-robots/live/dbconnection.php', 'uri' => 'http://localhost/');
    $optionsGetWaypoints = array('location' => $GLOBALS['server'].'/live/dbconnection.php', 'uri' => 'http://localhost/');
    $getWaypointsService = new SoapClient(NULL, $optionsGetWaypoints);

    $waypoints = $getWaypointsService->getWaypoints();

    //$waypointsArr = json_decode($waypoints, true);

    $rowString = "";
    $columnString = "";

    if (true){
        $isFirstRow = 1;
        foreach ($waypoints as $key => $value){
            $rowString.="<div class='input-group'>";

            foreach($value as $key2 => $value2){

                if (!is_numeric($key2)){
                    $rowString .= "<span class='input-group-addon info' color='white'>".$value2."</span>";
                    if ($isFirstRow > 0){
                        $columnString .="<span class='input-group-addon'>".$key2."</span>";
                    }

                }

            }
            $isFirstRow = 0;
            $rowString.= "</div>";
        }
    }else{
        echo "<div class='input-group'>";
        echo "<span class='input-group-addon'>".Abrakak."</span>";
        echo "</div>";
    }

    echo "<div class='input-group'>";
    echo $columnString;
    echo "</div>";
    echo $rowString;
}
?>
