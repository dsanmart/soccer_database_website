<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="icon" href="ball.png"> 
    <title>BCSAI teams</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="teamsstyles.css">
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

<div class="wrapper">
	<div class="cards_wrap">
        <?php
            $db_host="localhost";
            $db_username="root";
            $db_password="";
            $db_database= "soccer";

            $db= mysqli_connect($db_host, $db_username, $db_password);
            mysqli_select_db($db, $db_database);

            $sql= "SELECT * FROM team ;";

            $result= mysqli_query($db, $sql);

            while($row = $result-> fetch_assoc()){
                
        ?>
            <div class="card_item">
                <div class="card_inner">
                    <img src="pics/<?php echo $row["logo"];?>">
                    <div class="role_name"><?php echo "<p><a href='team_info.php?id={$row['team_id']}'style='text-decoration:none'>" . $row["name"] . "</a></p>" ;?></div>
                    <div class="real_name"><?php echo "<p>" .$row["location"]. "</p>" ; ?></div>
                    <div class="film"><?php echo "<p>" .$row["stadium"]. "</p>" ; ?></div>
                </div>
            </div>
        <?php

            }

            mysqli_close($db)
        ?>
	</div>
</div>  

</body>
</html>