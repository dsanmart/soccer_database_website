<html>

<head>
<title>Personal information of the player </title>
<link rel="stylesheet" type= "text/css" href="matchinfostyle.css">
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
        $t1id= mysqli_real_escape_string($db, $_GET["team1"]);
        $t2id= mysqli_real_escape_string($db, $_GET["team2"]);

        $matchid= mysqli_real_escape_string($db, $_GET["mid"]);
        $team1= "SELECT name  from team WHERE team_id=$t1id ";
        $teamm1= mysqli_query($db, $team1);

        $team2= "SELECT name  from team WHERE team_id=$t2id ";
        $teamm2= mysqli_query($db, $team2);

        while( $row = $teamm2 -> fetch_assoc()){  
            echo "<h1 style='text-align: center; margin-top: 20px;'>Match info </h1>";
        }
        ?>
        <?php
            $away= "SELECT  name, local_team, away_team from ( matches left Join team On matches.away_team= team.team_id)
            WHERE away_team=$t2id";
            $away1= mysqli_query($db, $away);
            $awaylogo= "SELECT  logo, local_team, away_team from ( matches left Join team On matches.away_team= team.team_id)
            WHERE away_team=$t2id";
            $awaylogo1= mysqli_query($db, $awaylogo);

            $local= "SELECT name, local_team, away_team from ( matches left Join team On matches.Local_team= team.team_id)
            WHERE local_team =$t1id"; 
            $local1= mysqli_query($db, $local);
            $locallogo= "SELECT logo, local_team, away_team from ( matches left Join team On matches.Local_team= team.team_id)
            WHERE local_team =$t1id";
            $locallogo1= mysqli_query($db, $locallogo);

            $match= "SELECT match_id, local_team, away_team  from ( matches left Join team On matches.Local_team= team.team_id)
            WHERE local_team =$t1id or away_team=$t2id";
            $match1= mysqli_query($db, $match);
            $date= "SELECT date  from matches WHERE local_team =$t1id or away_team=$t2id ";
            $date1= mysqli_query($db, $date);

            $goalcount1= "SELECT COUNT(*), minute, goal, team.name  from ((event_type left join player_pers_info ON player_pers_info.player_id= event_type.player_id)
            LEFT join team on player_pers_info.team_id=team.team_id) WHERE goal = 1 and match_id =$matchid and team.team_id=$t1id";
            $goalcount11= mysqli_query($db, $goalcount1);  

            $goalcount2= "SELECT COUNT(*), minute, goal, team.name  from ((event_type left join player_pers_info ON player_pers_info.player_id= event_type.player_id)
            LEFT join team on player_pers_info.team_id=team.team_id) WHERE goal = 1 and match_id =$matchid and team.team_id=$t2id";
            $goalcount22= mysqli_query($db, $goalcount2); 

            $count = 0;
            while(($row = $local1 -> fetch_assoc()) && ($row1 = $away1 -> fetch_assoc()) && ($row2 = $date1 -> fetch_assoc()) && ($row3 = $awaylogo1 -> fetch_assoc()) && ($row4 = $locallogo1 -> fetch_assoc()) && ($row5 = $goalcount11-> fetch_assoc())  && ($row6 = $goalcount22-> fetch_assoc()) && ($count<1)){    
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
                        <p id="goals"><?php echo $row5["COUNT(*)"] . " - " . $row6["COUNT(*)"] ?></p>
                        <div class="team">
                            <img src="pics/<?php echo $row3["logo"] ?>">
                            <p id="awayName"><?php echo $row1["name"] ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class= "linea-bar">
                    <div class="teams">
                        <li><img src="pics/<?php echo $row4["logo"] ?>"></li>
                        <li><img src="pics/<?php echo $row3["logo"] ?>" style= 'margin-top: 10px'></li>
                    </div>                    
                <?php 
                $count++;                   
            }
        ?>      
       
        <div class="contents">
            <?php
                $goal1= "SELECT minute, goal, team.name  from ((event_type left join player_pers_info ON player_pers_info.player_id= event_type.player_id)
                LEFT join team on player_pers_info.team_id=team.team_id) WHERE goal = 1 and match_id =$matchid and team.team_id=$t1id";
                $red1 = "SELECT minute, goal, team.name, yellow_card  from ((event_type left join player_pers_info ON player_pers_info.player_id= event_type.player_id)
                LEFT join team on player_pers_info.team_id=team.team_id) WHERE yellow_card = 0 and red_card=1 and match_id =$matchid and team.team_id=$t1id";
                $redyellow1 = "SELECT minute, goal, team.name, yellow_card  from ((event_type left join player_pers_info ON player_pers_info.player_id= event_type.player_id)
                LEFT join team on player_pers_info.team_id=team.team_id) WHERE yellow_card = 1 and red_card=1 and match_id =$matchid and team.team_id=$t1id";
                $yellow1= "SELECT minute, goal, team.name, yellow_card  from ((event_type left join player_pers_info ON player_pers_info.player_id= event_type.player_id)
                LEFT join team on player_pers_info.team_id=team.team_id) WHERE yellow_card = 1 and red_card=0 and match_id =$matchid and team.team_id=$t1id";
            $goal11= mysqli_query($db, $goal1);  
            while($row = $goal11-> fetch_assoc()){
                echo "<img src='pics/bola.png' style= 'width: 1.5%; top: 410px; position: absolute;border: none; left:"  . 23+($row["minute"]*54)/90 .  "%' >"  ;
            }

            $yellow11= mysqli_query($db, $yellow1); 
            while($row = $yellow11-> fetch_assoc()){
                echo "<img src='pics/amarilla.png' style= 'width: 1.5%; top: 410px; position: absolute; left:"  . 23+($row["minute"]*54)/90 .  "%' >"  ;
            }

            $redyellow11= mysqli_query($db, $redyellow1); 
            while($row = $redyellow11-> fetch_assoc()){
                echo "<img src='pics/yellow-red.png' style= 'width: 1.5%; top: 410px; position: absolute; left:"  . 23+($row["minute"]*54)/90 .  "%' >"  ;
            }

            $red11= mysqli_query($db, $red1); 
            while($row = $red11-> fetch_assoc()){
                echo "<img src='pics/redcard.png' style= 'width: 1.5%; top: 410px; position: absolute; left:"  . 23+($row["minute"]*54)/90 .  "%' >"  ;
            }
            
            ?>
                <div class="descanso"></div>    
                <div class= "linea"></div>
                <div class="descanso"></div>    
            <?php

            $goal2= "SELECT minute, goal, team.name  from ((event_type left join player_pers_info ON player_pers_info.player_id= event_type.player_id)
            LEFT join team on player_pers_info.team_id=team.team_id) WHERE goal = 1 and match_id =$matchid and team.team_id=$t2id";
            $red2 = "SELECT minute, goal, team.name, yellow_card  from ((event_type left join player_pers_info ON player_pers_info.player_id= event_type.player_id)
            LEFT join team on player_pers_info.team_id=team.team_id) WHERE yellow_card = 0 and red_card=1 and match_id =$matchid and team.team_id=$t2id";
            $redyellow2 = "SELECT minute, goal, team.name, yellow_card  from ((event_type left join player_pers_info ON player_pers_info.player_id= event_type.player_id)
            LEFT join team on player_pers_info.team_id=team.team_id) WHERE yellow_card = 1 and red_card=1 and match_id =$matchid and team.team_id=$t2id";
            $yellow2= "SELECT minute, goal, team.name, yellow_card  from ((event_type left join player_pers_info ON player_pers_info.player_id= event_type.player_id)
            LEFT join team on player_pers_info.team_id=team.team_id) WHERE yellow_card = 1 and red_card=0 and match_id =$matchid and team.team_id=$t2id";

            $goal22= mysqli_query($db, $goal2); 
            while($row = $goal22-> fetch_assoc()){      
                echo "<img src='pics/bola.png' style= 'width: 1.5%; position: absolute; left:"  . 23+($row["minute"]*54)/90 .  "%' >"  ;
            }

            $yellow22= mysqli_query($db, $yellow2); 
            while($row = $yellow22-> fetch_assoc()){
                echo "<img src='pics/amarilla.png' style= 'width: 1.5%; position: absolute; left:"  . 23+($row["minute"]*54)/90 .  "%' >"  ;
            }
  
            $redyellow22= mysqli_query($db, $redyellow2); 
            while($row = $redyellow22-> fetch_assoc()){
                echo "<img src='pics/yellow-red.png' style= 'width: 1.5%; position: absolute; left:"  . 23+($row["minute"]*54)/90 .  "%' >"  ;
            }
            
            $red22= mysqli_query($db, $red2); 
            while($row = $red22-> fetch_assoc()){
                echo "<img src='pics/redcard.png' style= 'width: 1.5%; position: absolute; left:"  . 23+($row["minute"]*54)/90 .  "%' >"  ;
            }

            mysqli_close($db)

            ?>
            </div>

        </div>

        <!-- To improve the project add a nav tab with stats and timeline by minutes -->

        <!-- This structure is for the timeline tab -->
        <div class="narrator_box">
            <p> </p>
            <p> </P>
            
        </div>

    
    </div> <!-- This closes the white back container -->

</div>
</body>
</html>