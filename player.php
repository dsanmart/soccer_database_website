<html>
<head>
<title>Personal information of the player </title>
<link rel="stylesheet" type= "text/css" href="playerstyle.css">
</head>
<body>
<header>
    <div class="navtab">
        <img src="pics/ie-laliga.png" class="logo" />
        
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
<div class="wrapper">
	<div class="playername_wrap">
    

    <?php

    	$db_host="localhost";
    	$db_username="root";
    	$db_password="";
    	$db_database= "soccer";

    	$db= mysqli_connect($db_host, $db_username, $db_password);
    	mysqli_select_db($db, $db_database);

    	$sql= "SELECT * FROM player_pers_info ORDER BY Name;";

    	$result= mysqli_query($db, $sql);

    	while($row = $result-> fetch_assoc()){
    	
    ?>
    
    	<div class="player_display">
    		<div class="name_inner">
    			<img src="pics/<?php echo $row["playerpng"];?>">
    			<div class="role_name"><?php echo "<p><a href='player_info.php?id={$row['player_id']}'style='text-decoration:none'>" . $row["Name"] . "</a></p>" ;?></div>
    		</div>
    	</div>
    
    <?php
        
    	}

    	mysqli_close($db)
    ?>
    
</div>
</body>
</html>
