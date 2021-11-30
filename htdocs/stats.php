<!DOCTYPE html>
<html>
  <head>
    <link rel="icon" href="pic/ball.png">
    <link rel="stylesheet" type="text/css" href="statsstyle_copy2.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>
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
 
    <script> 
        var pichichinames = [];
        var pichichigoals = [];
        var yellownames = [];
        var yellowcards = [];
        var rednames = [];
        var redcards =  [];
        var foulnames = []
        var foulns = []
        var missednames = []
        var missedpenalts = []
    </script>
    <?php

        $db_host="localhost";
        $db_username="root";
        $db_password="";
        $db_database= "soccer";

        $db= mysqli_connect($db_host, $db_username, $db_password);
        mysqli_select_db($db, $db_database);

        // RESULT- Goal 
        // echo "<p>". 'TOP 5 SCORERS' . "</p>";
        // SELECT count(yellow_cards) FROM table WHERE yellow_card = 1
        $pichichi = "SELECT count(goal), player_pers_info.name FROM (event_type LEFT JOIN player_pers_info ON event_type.player_id = player_pers_info.player_id) WHERE goal=1 GROUP BY event_type.player_id ORDER BY count(goal) DESC" ;
        $pichichis = mysqli_query($db, $pichichi);

        $yellow = "SELECT count(Yellow_card), player_pers_info.name FROM (event_type LEFT JOIN player_pers_info ON event_type.player_id = player_pers_info.player_id) WHERE Yellow_card=1 GROUP BY event_type.player_id ORDER BY count(Yellow_card) DESC";
        $yellows = mysqli_query($db, $yellow);
        
        $red = "SELECT count(Red_card), player_pers_info.name FROM (event_type LEFT JOIN player_pers_info ON event_type.player_id = player_pers_info.player_id) WHERE Red_card=1 GROUP BY event_type.player_id ORDER BY count(Red_card) DESC";
        $reds = mysqli_query($db, $red);

        $foul = "SELECT count(Foul), player_pers_info.name FROM (event_type LEFT JOIN player_pers_info ON event_type.player_id = player_pers_info.player_id) WHERE Foul=1 GROUP BY event_type.player_id ORDER BY count(Foul) DESC";
        $fouls = mysqli_query($db, $foul);

        $missed = "SELECT count(Missed_Penalty), player_pers_info.name FROM (event_type LEFT JOIN player_pers_info ON event_type.player_id = player_pers_info.player_id) WHERE Missed_Penalty=1 GROUP BY event_type.player_id ORDER BY count(Missed_Penalty) DESC";
        $missed_s = mysqli_query($db, $missed);

        // $salary = "SELECT salary, player_pers_info.name FROM (event_type LEFT JOIN player_pers_info ON event_type.player_id = player_pers_info.player_id) WHERE Missed_Penalty=1 GROUP BY event_type.player_id ORDER BY count(Missed_Penalty) DESC";

        $counter = 0;
        while(($row = $pichichis-> fetch_assoc()) and ($counter<5)){
            ?>
        <script>
        pichichinames.push("<?php echo $row["name"] ?>");
        pichichigoals.push(Number(<?php echo $row["count(goal)"] ?>));
        </script>
        <?php
            $counter++;
        }
        ?>

        <?php
        $counter = 0;
        while(($row = $yellows-> fetch_assoc()) and ($counter<5)){
            ?>
        <script>
        yellownames.push("<?php echo $row["name"] ?>");
        yellowcards.push(Number(<?php echo $row["count(Yellow_card)"] ?>));
        </script>
        <?php
            $counter++;
        }
        ?>

        <?php
        $counter = 0;
        while(($row = $reds-> fetch_assoc()) and ($counter<5)){
            ?>
        <script>
        rednames.push("<?php echo $row["name"] ?>");
        redcards.push(Number(<?php echo $row["count(Red_card)"] ?>));
        </script>
        <?php
            $counter++;
        }
        ?>
        <?php
        $counter = 0;
        while(($row = $fouls-> fetch_assoc()) and ($counter<5)){
            ?>
        <script>
        foulnames.push("<?php echo $row["name"] ?>");
        foulns.push(Number(<?php echo $row["count(Foul)"] ?>));
        </script>
        <?php
            $counter++;
        }
        ?>
        <?php
        $counter = 0;
        while(($row = $missed_s-> fetch_assoc()) and ($counter<5)){
            ?>
        <script>
        missednames.push("<?php echo $row["name"] ?>");
        missedpenalts.push(Number(<?php echo $row["count(Missed_Penalty)"] ?>));
        </script>
        <?php
            $counter++;
        }
        ?>
        <?php
        mysqli_close($db)

    ?>

    
    <h1>Statistics</h1>   
        <div class = "chartBox">
            <canvas id="myChart"></canvas>
            <hr>
            <canvas id="myChart2"></canvas>
            <hr>
            <canvas id="myChart3"></canvas>
            <hr>
            <canvas id="myChart4"></canvas>
            <hr>
            <canvas id="myChart5"></canvas>
        </div>
    <script>
        const mychrt = document.getElementById('myChart').getContext('2d');

        const topPlayers = new Chart(mychrt, {
            type: 'bar',
            data: {
                labels: pichichinames,
                datasets: [{
                    label:'Goals',
                    data: pichichigoals,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options:{
                plugins: {
                	title: {
                		display: true,
                    	text: 'Top Scorers',
                    	font: {
                            size: 20
            		    }
                	}
                    
                },
               
            }
        });
    </script>
    
    <script>
        const mychrt2 = document.getElementById('myChart2').getContext('2d');

        const topPlayers2 = new Chart(mychrt2, {
            type: 'bar',
            data: {
                labels: yellownames,
                datasets: [{
                    label:'Yellow Cards',
                    data: yellowcards,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options:{
            	plugins: {
            		title: {
                    	display: true,
                    	text: 'Top Yellow Cards',
                    	font: {
                            size: 20
            		    }
            		}
                
                },
               
            }
        });
    </script>
    
    <script>
        const mychrt3 = document.getElementById('myChart3').getContext('2d');

        const topPlayers3 = new Chart(mychrt3, {
            type: 'bar',
            data: {
                labels: rednames,
                datasets: [{
                    label:'Red Cards',
                    data: redcards,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options:{
            	plugins: {
            		title: {
                    	display: true,
                    	text: 'Top Red Cards',
                    	font: {
                            size: 20
            		    }
            		}
                
                },
               
            }
        });
    </script>
    
    <script>
        const mychrt4 = document.getElementById('myChart4').getContext('2d');

        const topPlayers4 = new Chart(mychrt4, {
            type: 'bar',
            data: {
                labels: foulnames,
                datasets: [{
                    label:'Fouls',
                    data: foulns,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options:{
            	plugins: {
            		title: {
                    	display: true,
                    	text: 'Top Fouls',
                    	font: {
                            size: 20
            		    }
            		}
                
                },
               
            }
        });
    </script>
    
    <script>
        const mychrt5 = document.getElementById('myChart5').getContext('2d');

        const topPlayers5 = new Chart(mychrt5, {
            type: 'bar',
            data: {
                labels: missednames,
                datasets: [{
                    label:'Missed Penalties',
                    data: missedpenalts,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options:{
            	plugins: {
            		title: {
                    	display: true,
                    	text: 'Top Missed Penalties',
                    	font: {
                            size: 20
            		    }
                    }
                },
               
            }
        });
        </script>
</div>
</body>
</html>
