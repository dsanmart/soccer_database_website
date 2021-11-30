<html>

<head>
<title>Personal information of the player </title>
<link rel="stylesheet" type= "text/css" href="tmatchinfostyle.css">
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
        $team= "SELECT name  from team";
        $teamm= mysqli_query($db, $team);

        echo "<h1 style='text-align: center;'>Matches of LaLiga</h1>";

            $away= "SELECT  name, local_team, away_team from ( matches left Join team On matches.away_team= team.team_id)";
            $away1= mysqli_query($db, $away);
            $awaylogo= "SELECT  logo, local_team, away_team from ( matches left Join team On matches.away_team= team.team_id)";
            $awaylogo1= mysqli_query($db, $awaylogo);

            $local= "SELECT name, local_team, away_team from ( matches left Join team On matches.Local_team= team.team_id)";
            $local1= mysqli_query($db, $local);
            $locallogo= "SELECT logo, local_team, away_team from ( matches left Join team On matches.Local_team= team.team_id)";
            $locallogo1= mysqli_query($db, $locallogo);

            $match= "SELECT match_id, local_team, away_team  from ( matches left Join team On matches.Local_team= team.team_id)";
            $match1= mysqli_query($db, $match);
            $date= "SELECT date  from matches";
            $date1= mysqli_query($db, $date);

            while(($row = $local1 -> fetch_assoc()) && ($row1 = $away1 -> fetch_assoc()) && ($row2 = $date1 -> fetch_assoc()) && ($row3 = $awaylogo1 -> fetch_assoc()) && ($row4 = $locallogo1 -> fetch_assoc())  && ($row5 = $match1 -> fetch_assoc())){    
                ?>
                <div class="container">
                    <div class="title-box">
                        <p>Local Team</p>
                        <p id="elapsed"><?php echo $row2["date"] ?></p>
                        <p>Visitor Team</p>
                    </div>
                    <div class="title-box">
                        <div class="team">
                            <img  src="pics/<?php echo $row4["logo"] ?>" >
                            <p id="homeName"><?php echo $row["name"] ?></p>
                        </div>
                        <p id="goals"><?php echo "<a href='partido.php?team1={$row['local_team']}&team2={$row['away_team']}&mid={$row5['match_id']}'>"  . " VS " ."</a>" ?></p>
                        <div class="team">
                            <img src="pics/<?php echo $row3["logo"] ?>">
                            <p id="awayName"><?php echo $row1["name"] ?></p>
                        </div>
                    </div>
                    <hr>                    
                </div>
                <?php                    
            }

            mysqli_close($db)
        ?>

</div>
</body>
</html>