<html>

<head>
<title>Team </title>
<link rel="stylesheet" type= "text/css" href="teaminfostyle.css">
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
<div>

    <?php

    $db_host="localhost";
    $db_username="root";
    $db_password="";
    $db_database= "soccer";

    $db= mysqli_connect($db_host, $db_username, $db_password);
    mysqli_select_db($db, $db_database);

    $id=mysqli_real_escape_string($db, $_GET["id"]);


    $sql= "SELECT * FROM (team LEFT JOIN player_pers_info ON team.team_id=player_pers_info.team_id)
    WHERE player_pers_info.team_id= $id ;" ;

    $team_name = "SELECT name, logo FROM team WHERE team_id = $id ;" ;
    
    $result= mysqli_query($db, $sql);
    $name = mysqli_query($db, $team_name);

    ?>
    <div class="title">
        <?php
        while ($row = $name->fetch_assoc()) {
            ?>
            <li><h1><?php echo $row["name"]?></h1></li>
            <li><img src="pics/<?php echo $row["logo"];?>"></li>
            <?php
        }
        ?>
    </div>

    <div class="navtab2">        
        <div class="nav2">
            <ul>
            <li><a href="team_info.php?id=<?php echo $id ?>">Info</a></li>
            <li><a href="team_info_players.php?id=<?php echo $id ?>">Players</a></li>
            <li><a href="team_info_stats.php?id=<?php echo $id ?>">Stats</a></li>
            <li><a href="team_info_matches.php?tid=<?php echo $id ?>">Matches</a></li>
            </ul>
        </div>
    </div>
    <?php
    $count=0;
    while(($row = $result->fetch_assoc()) and ($count<1)){
        ?>
        <div class="team_info_card">
            
            <div class="stad"><img src="pics/<?php echo $row["stadiumpng"];?>"></div>
            <div class="variables">
                <div class="team_name"><?php echo "<h3 style='display: inline-block; margin-bottom: 10px'> Complete Name: </h3><span style='margin-left: 10px'>" . $row["name"] . "</span>" ;?></div>
                <div class="real_name"><?php echo "<h3 style='display: inline-block; margin-bottom: 10px'> Stadium: </h3><span style='margin-left: 10px'>" .$row["stadium"]. "</span>" ; ?></div>
                <div class="location"><?php echo "<h3 style='display: inline-block; margin-bottom: 10px'> Location: </h3><span style='margin-left: 10px'>" .$row["location"]. "</span>" ; ?></div>
                <div class="manager"><?php echo "<h3 style='display: inline-block; margin-bottom: 10px'> Manager: </h3><span style='margin-left: 10px'>Diego Pablo Simeone</span>" ; ?></div>
            </div>
        </div>
        <?php
        $count++;
    }

    ?>
</div>
</body>
</html>

