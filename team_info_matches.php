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

    $id=mysqli_real_escape_string($db, $_GET["tid"]);


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
</div>
<div>
<?php
        $db_host="localhost";
        $db_username="root";
        $db_password="";
        $db_database= "soccer";

        $db= mysqli_connect($db_host, $db_username, $db_password);
        mysqli_select_db($db, $db_database);
        $tid= mysqli_real_escape_string($db, $_GET["tid"]);
        $team= "SELECT name  from team WHERE team_id=$tid ";
        $teamm= mysqli_query($db, $team);

        while( $row = $teamm -> fetch_assoc()){  
            echo "<h1 style='text-align: center;'>Matches of ". $row["name"] .  "</h1>";
        }
            $away= "SELECT  name, local_team, away_team from ( matches left Join team On matches.away_team= team.team_id)
            WHERE local_team =$tid or away_team=$tid";
            $away1= mysqli_query($db, $away);
            $awaylogo= "SELECT  logo, local_team, away_team from ( matches left Join team On matches.away_team= team.team_id)
            WHERE local_team =$tid or away_team=$tid";
            $awaylogo1= mysqli_query($db, $awaylogo);

            $local= "SELECT name, local_team, away_team from ( matches left Join team On matches.Local_team= team.team_id)
            WHERE local_team =$tid or away_team=$tid";
            $local1= mysqli_query($db, $local);
            $locallogo= "SELECT logo, local_team, away_team from ( matches left Join team On matches.Local_team= team.team_id)
            WHERE local_team =$tid or away_team=$tid";
            $locallogo1= mysqli_query($db, $locallogo);

            $match= "SELECT match_id, local_team, away_team  from ( matches left Join team On matches.Local_team= team.team_id)WHERE local_team =$tid or away_team=$tid";
            $match1= mysqli_query($db, $match);
            $date= "SELECT date  from matches WHERE local_team =$tid or away_team=$tid ";
            $date1= mysqli_query($db, $date);

            while(($row = $local1 -> fetch_assoc()) && ($row1 = $away1 -> fetch_assoc()) && ($row2 = $date1 -> fetch_assoc()) && ($row3 = $awaylogo1 -> fetch_assoc()) && ($row4 = $locallogo1 -> fetch_assoc()) && ($row5 = $match1 -> fetch_assoc())){    
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