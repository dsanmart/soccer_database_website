<html>

<head>
<title>Personal information of the player </title>
<link rel="stylesheet" type= "text/css" href="mystyle2.css">
</head>
<body>
<table id= "customers">



<?php

$db_host="localhost";
$db_username="root";
$db_password="";
$db_database= "soccer";

$db= mysqli_connect($db_host, $db_username, $db_password);
mysqli_select_db($db, $db_database);

//$mid=mysqli_real_escape_string($db, $_GET["mid"]);
//$local="SELECT local_team  from matches where match_id=1";
//$local1= mysqli_query($db, $local);

$team1=mysqli_real_escape_string($db, $_GET["team1"]);
$team2=mysqli_real_escape_string($db, $_GET["team2"]);
$mid=mysqli_real_escape_string($db, $_GET["mid"]);



// RESULT 
echo "<h2>". 'SCORE' . "</h2>";
echo $team1, $team2;


$goal1= "SELECT COUNT(*), team.name, player_pers_info.Name, Minute, team.team_id FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE goal=1 AND team.team_id=$team1 AND match_id= $mid;";

$goal11= mysqli_query($db, $goal1);


$goal2= "SELECT COUNT(*), team.name, player_pers_info.Name, Minute,team.team_id FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE goal=1 AND team.team_id=$team2 AND match_id= $mid;";


$goal22= mysqli_query($db, $goal2);

$goalnames= "SELECT * FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE goal=1 AND match_id= $mid ORDER BY minute ASC;";
$goalnames12= mysqli_query($db, $goalnames);


while($row = $goal11-> fetch_assoc()){

    echo "<p><a href='player.php?tid={$row['team_id']}'style='text-decoration:none' >" .$row["name"  ] . "</a>"."   "  .  $row["COUNT(*)"] . " - "   ;
}
while($row = $goal22-> fetch_assoc()){
    
    echo ""    .  $row["COUNT(*)"] ."   " .  "<a href='player.php?tid={$row['team_id']}'   style='text-decoration:none' >" .  $row["name"  ] . "</a>". "</p >"   ;

}
while($row = $goalnames12-> fetch_assoc()){
    echo "<p><a href='prueba.php?id={$row['player_id']}' style='text-decoration:none' >" . $row["Name"]. "</a>" .  "  ( "  .  $row["name"]  . " )     ". $row["Minute"] . "  ' "  ."</p >"   ;

}




// Yellow cards 
echo "<h2>". 'YELLOW CARDS' . "</h2>";

$yellow1= "SELECT COUNT(*), team.name, player_pers_info.Name, Minute FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE yellow_card =1 AND team.team_id=$team1 AND match_id= $mid;";

$yellow11= mysqli_query($db, $yellow1);



$yellow2= "SELECT COUNT(*), team.name, player_pers_info.Name, Minute FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE yellow_card =1 AND team.team_id=$team2 AND match_id= $mid;";

$yellow22= mysqli_query($db, $yellow2);

$yellownames= "SELECT * FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE yellow_card =1 AND match_id= $mid ORDER BY minute ASC;";

$yellownames12= mysqli_query($db, $yellownames);



while($row = $yellow11-> fetch_assoc()){
    
    echo "<p>"  ."   "  .  $row["COUNT(*)"] . " - "   ;

}

while($row = $yellow22-> fetch_assoc()){
    
    echo ""    .  $row["COUNT(*)"]."   " . "</p>"   ;

}

while($row = $yellownames12-> fetch_assoc()){
    
    
    echo "<p><a href='prueba.php?id={$row['player_id']}' style='text-decoration:none' >" . $row["Name"]. "</a>" .  "  ( "  .  $row["name"]  . " )     ". $row["Minute"] . "  ' "  ."</p >"   ;

}


//Red cards

echo "<h2>". 'RED CARDS' . "</h2>";

$red1= "SELECT COUNT(*), team.name, player_pers_info.Name, Minute FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE red_card =1 AND team.team_id=$team1 AND match_id= $mid;";

$red11= mysqli_query($db, $red1);



$red2= "SELECT COUNT(*), team.name, player_pers_info.Name, Minute FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE red_card =1 AND team.team_id=$team2 AND match_id= $mid;";

$red22= mysqli_query($db, $red2);

$rednames= "SELECT * FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE red_card =1 AND match_id= $mid ORDER BY minute ASC;";

$rednames12= mysqli_query($db, $rednames);



while($row = $red11-> fetch_assoc()){
    
    echo "<p>"  ."   "  .  $row["COUNT(*)"] . " - "   ;

}

while($row = $red22-> fetch_assoc()){
    
    echo ""    .  $row["COUNT(*)"]."   " . "</p>"   ;

}

while($row = $rednames12-> fetch_assoc()){
    
    
    echo "<p><a href='prueba.php?id={$row['player_id']}' style='text-decoration:none' >" . $row["Name"]. "</a>" .  "  ( "  .  $row["name"]  . " )     ". $row["Minute"] . "  ' "  ."</p >"   ;

}
//Attempts

echo "<h2>". 'ATTEMPTS ' . "</h2>";

$att1= "SELECT COUNT(*), team.name, player_pers_info.Name, Minute FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE attempt =1 AND team.team_id=$team1 AND match_id= $mid;";

$att11= mysqli_query($db, $att1);



$att2= "SELECT COUNT(*), team.name, player_pers_info.Name, Minute FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE attempt =1 AND team.team_id=$team2 AND match_id= $mid;";

$att22= mysqli_query($db, $att2);

$attnames= "SELECT * FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE attempt =1 AND match_id= $mid ORDER BY minute ASC;";

$attnames12= mysqli_query($db, $attnames);



while($row = $att11-> fetch_assoc()){
    
    echo "<p>"  ."   "  .  $row["COUNT(*)"] . " - "   ;

}

while($row = $att22-> fetch_assoc()){
    echo ""    .  $row["COUNT(*)"]."   " . "</p>"   ;
}

while($row = $attnames12-> fetch_assoc()){
    echo "<p><a href='prueba.php?id={$row['player_id']}' style='text-decoration:none' >" . $row["Name"]. "</a>" .  "  ( "  .  $row["name"]  . " )     ". $row["Minute"] . "  ' "  ."</p >"   ;
}

//Attempt on target 
echo "<h2>". 'ATTEMPTS ON TARGET' . "</h2>";

$attt1= "SELECT COUNT(*), team.name, player_pers_info.Name, Minute FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE attempt_on_target =1 AND team.team_id=$team1 AND match_id= $mid;";

$attt11= mysqli_query($db, $attt1);

$attt2= "SELECT COUNT(*), team.name, player_pers_info.Name, Minute FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE attempt_on_target =1 AND team.team_id=$team2 AND match_id= $mid;";

$attt22= mysqli_query($db, $attt2);

$atttnames= "SELECT * FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE attempt_on_target =1 AND match_id= $mid ORDER BY minute ASC;";

$atttnames12= mysqli_query($db, $atttnames);

while($row = $attt11-> fetch_assoc()){
    
    echo "<p>"  ."   "  .  $row["COUNT(*)"] . " - "   ;

}

while($row = $attt22-> fetch_assoc()){
    
    echo ""    .  $row["COUNT(*)"]."   " . "</p>"   ;

}

while($row = $atttnames12-> fetch_assoc()){
    
    
    echo "<p><a href='prueba.php?id={$row['player_id']}' style='text-decoration:none' >" . $row["Name"]. "</a>" .  "  ( "  .  $row["name"]  . " )     ". $row["Minute"] . "  ' "  ."</p >"   ;

}

// Failed pass

echo "<h2>". 'Failed passes ' . "</h2>";

$fp1= "SELECT COUNT(*), team.name, player_pers_info.Name, Minute FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE failed_pass =1 AND team.team_id=$team1 AND match_id= $mid;";

$fp11= mysqli_query($db, $fp1);



$fp2= "SELECT COUNT(*), team.name, player_pers_info.Name, Minute FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE failed_pass =1 AND team.team_id=$team2 AND match_id= $mid;";

$fp22= mysqli_query($db, $fp2);

$fpnames= "SELECT * FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE failed_pass =1 AND match_id= $mid;";

$fpnames12= mysqli_query($db, $fpnames);



while($row = $fp11-> fetch_assoc()){
    
    echo "<p>"  ."   "  .  $row["COUNT(*)"] . " - "   ;

}

while($row = $fp22-> fetch_assoc()){
    
    echo ""    .  $row["COUNT(*)"]."   " . "</p>"   ;

}

while($row = $fpnames12-> fetch_assoc()){
    
    
    echo "<p><a href='prueba.php?id={$row['player_id']}' style='text-decoration:none' >" . $row["Name"]. "</a>" .  "  ( "  .  $row["name"]  . " )     ". $row["Minute"] . "  ' "  ."</p >"   ;

}
// Tackle
echo "<h2>". 'Tackles' . "</h2>";

$tck1= "SELECT COUNT(*), team.name, player_pers_info.Name, Minute FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE tackle =1 AND team.team_id=$team1 AND match_id= $mid;";

$tck11= mysqli_query($db, $fp1);



$tck2= "SELECT COUNT(*), team.name, player_pers_info.Name, Minute FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE tackle =1 AND team.team_id=$team2 AND match_id= $mid;";

$tck22= mysqli_query($db, $tck2);

$tcknames= "SELECT * FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE tackle =1 AND match_id= $mid;";

$tcknames12= mysqli_query($db, $tcknames);



while($row = $tck11-> fetch_assoc()){
    
    echo "<p>"  ."   "  .  $row["COUNT(*)"] . " - "   ;

}

while($row = $tck22-> fetch_assoc()){
    
    echo ""    .  $row["COUNT(*)"]."   " . "</p>"   ;

}

while($row = $tcknames12-> fetch_assoc()){
    
    
    echo "<p><a href='prueba.php?id={$row['player_id']}' style='text-decoration:none' >" . $row["Name"]. "</a>" .  "  ( "  .  $row["name"]  . " )     ". $row["Minute"] . "  ' "  ."</p >"   ;

}
//Foul
echo "<h2>". 'Foul' . "</h2>";

$foul1= "SELECT COUNT(*), team.name, player_pers_info.Name, Minute FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE foul =1 AND team.team_id=$team1 AND match_id= $mid;";

$foul11= mysqli_query($db, $foul1);



$foul2= "SELECT COUNT(*), team.name, player_pers_info.Name, Minute FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE foul =1 AND team.team_id=$team2 AND match_id= $mid;";

$foul22= mysqli_query($db, $foul2);

$foulnames= "SELECT * FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE foul =1 AND match_id= $mid;";

$foulnames12= mysqli_query($db, $foulnames);



while($row = $foul11-> fetch_assoc()){
    
    echo "<p>"  ."   "  .  $row["COUNT(*)"] . " - "   ;

}

while($row = $foul22-> fetch_assoc()){
    
    echo ""    .  $row["COUNT(*)"]."   " . "</p>"   ;

}

while($row = $foulnames12-> fetch_assoc()){
    
    
    echo "<p><a href='prueba.php?id={$row['player_id']}' style='text-decoration:none' >" . $row["Name"]. "</a>" .  "  ( "  .  $row["name"]  . " )     ". $row["Minute"] . "  ' "  ."</p >"   ;

}
//Missed Penalty
echo "<h2>". 'Missed Penalties' . "</h2>";

$missed_penalty1= "SELECT COUNT(*), team.name, player_pers_info.Name, Minute FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE missed_penalty =1 AND team.team_id=$team1 AND match_id= $mid;";

$missed_penalty11= mysqli_query($db, $missed_penalty1);



$missed_penalty2= "SELECT COUNT(*), team.name, player_pers_info.Name, Minute FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE missed_penalty =1 AND team.team_id=$team2 AND match_id= $mid;";

$missed_penalty22= mysqli_query($db, $missed_penalty2);

$missed_penalty_names= "SELECT * FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) 
LEFT JOIN team ON player_pers_info.team_id= team.team_id)  WHERE missed_penalty =1 AND match_id= $mid;";

$missed_penalty_names12= mysqli_query($db, $missed_penalty_names);



while($row = $missed_penalty11-> fetch_assoc()){
    
    echo "<p>"  ."   "  .  $row["COUNT(*)"] . " - "   ;

}

while($row = $missed_penalty22-> fetch_assoc()){
    
    echo ""    .  $row["COUNT(*)"]."   " . "</p>"   ;

}

while($row = $missed_penalty_names12-> fetch_assoc()){
    
    
    echo "<p><a href='prueba.php?id={$row['player_id']}' style='text-decoration:none' >" . $row["Name"]. "</a>" .  "  ( "  .  $row["name"]  . " )     ". $row["Minute"] . "  ' "  ."</p >"   ;

}

//SELECT  SUM (goal) OVER (PARTITION BY team.name), (team.name), SUM (yellow_card) OVER (PARTITION BY team.name), team.name   FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) LEFT JOIN team ON player_pers_info.team_id= team.team_id)    
// SELECT  SUM (attempt) AS SUM,  team.name   FROM  ((event_type LEFT JOIN player_pers_info ON event_type.player_id= player_pers_info.player_id) LEFT JOIN team ON player_pers_info.team_id= team.team_id)    GROUP BY team.name
//SELECT COUNT(winner_team), winner_team FROM match GROUP by winner_team ORDER BY winner_team  
//SELECT (COUNT(matches.winner_team)*3)+COUNT(matches.draw) , matches.winner_team FROM matches WHERE matches.winner_team != 0GROUP by matches.winner_team ORDER BY matches.winner_team  
 


//SELECT (COUNT(matches.winner_team)), sum(matches.draw) , matches.winner_team FROM matches WHERE matches.local_team != 0GROUP by matches.winner_team ORDER BY matches.winner_team  




mysqli_close($db)
?>
</table>

</body>
</html>
