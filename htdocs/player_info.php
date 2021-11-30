<html>
<head>
    <title> record of the player </title>
    <link rel="icon" href="pic/ball.png">
    <link rel="stylesheet" type="text/css" href="playerinfostyle.css">
  </head>

<body>
  <header>
    <div class="navtab">
      <img src="pics/ie-laliga.png" alt="logo" class="logo" />
      
      <nav>
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="teams.php">Teams</a></li>
          <li><a href="matches.php">Games</a></li>
          <li><a href="player.php">Players</a></li>
          <li><a href="stats.php">Stats</a></li>
        </ul>
      </nav>
    </div>
  </header>
  
<div>
    <?php

    $db_host="localhost";
    $db_username="root";
    $db_password="";
    $db_database= "soccer";

    $db= mysqli_connect($db_host, $db_username, $db_password);
    mysqli_select_db($db, $db_database);

    $id=mysqli_real_escape_string($db, $_GET["id"]);


    $sql= "SELECT * FROM ((player_pers_info LEFT JOIN player_pos ON player_pers_info.player_id=player_pos.player_id) 
    LEFT JOIN player_career_teams ON player_pers_info.player_id=player_career_teams.player_id) WHERE player_pers_info.player_id= $id ;" ;

	$player_name = "SELECT Name, playerpng FROM player_pers_info WHERE player_id = $id ;" ;

    $result= mysqli_query($db, $sql);
    $name = mysqli_query($db, $player_name);
    
    ?>
    
    <div class="title">
    	<?php
    	while ($row = $name->fetch_assoc()) {
    		?>
    		<li><h1><?php echo $row["Name"]?></h1></l1>
    		<li><img src="pics/<?php echo $row["playerpng"];?>"></li>
    		<?php
    	}
    	?>
    </div>
    
    <div>
    <?php
	$count=0;
    //echo "<p>" Name :  [$Name]</p>"

    while (($row = $result->fetch_assoc()) and ($count<1)){
    	?>
    	<div class="player_data">
    		<div class="playername"><?php echo "<p> Complete Name: " . $row["Name"] . "</p>" ; ?></div>
    		<div class="playerweight"><?php echo "<p> Weight: " . $row["Weight"] . "</php>" ; ?></div>
    		<div class="playerheight"><?php echo "<p> Height: " . $row["Height"] . "</php>" ; ?></div>
    		<div class="playerpos"><?php echo "<p> Position: " . $row["position"] . "</php>" ; ?></div>
    		<div class="playernat"><?php echo "<p> National Matches: " . $row["N national matches"] . "</php>" ; ?></div>
    		<div class="playerint"><?php echo "<p> International Matches: " . $row["N international matches"] . "</php>" ; ?></div>
    		<div class="playerdate"><?php echo "<p> Date of Birth: " . $row["Date of birth"] . "</php>" ; ?></div>
    		<div class="contractstart"><?php echo "<p> Contract start date: " . $row["Start_date"] . "</php>" ; ?></div>
    		<div class="contractend"><?php echo "<p> Contract end date: " . $row["end_date"] . "</php>" ; ?></div>
        </div
        <?php
        $count++;
    }

    ?>
  
  </div>
</body>
</html>

