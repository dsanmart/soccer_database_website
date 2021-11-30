<!DOCTYPE html>
<html>
  <head>
    <link rel="icon" href="pic/ball.png">
    <link rel="stylesheet" type="text/css" href="homestyle.css">
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

  <div class="homeback">
    <div class="wrapper">
      <form action="" method="post">
        <span><input type="text" placeholder="What are you looking for?" name="search"></span>
        <button type="submit" name="submit" class="searchbtn"><img src="pics/searchicon.png" class='icon' width= 50% height=50%></button>
      </form>
      <?php
if (isset($_POST['submit'])) {
    $searchValue = $_POST['search'];
    $con = new mysqli("localhost", "root", "", "soccer");
    if ($con->connect_error) {
        echo "connection Failed: " . $con->connect_error;
    } else {
        $sql = "SELECT * FROM player_pers_info WHERE Name LIKE '%$searchValue%'";
        $teamsql = "SELECT * FROM team WHERE name LIKE '%$searchValue%'";

        $playerresult = $con->query($sql);
        $teamresult = $con->query($teamsql);
  ?>
      <div class="result">
      <?php
          if ($row = $playerresult->fetch_assoc()) {
            echo "<h3><a href='player_info.php?id={$row['player_id']}'style='text-decoration:none'>" . $row["Name"] . "</a></h3>" ;
          }
          else if ($row = $teamresult->fetch_assoc()) {
            echo "<h3><a href='team_info.php?id={$row['team_id']}'style='text-decoration:none'>" . $row["name"] . "</a></h3>" ;
          }
          else {
            echo "<h3>No results found</h3>";
          }
        }   
      }
        ?>
      </div>
        <!--

      <input type="text" class="input" placeholder="What are you looking for?">
      <div class="searchbtn"><img src="pics/searchicon.png" class='icon' width= 50% height=50%></div>


      echo "<h3><a href='player_info.php?id={$row['player_id']}'style='text-decoration:none'>" . $row["Name"] . "</a></h3>" ;


    -->
    
    </div>
  </div>
</body>
</html>


<!--
      <input type="text" class="input" placeholder="What are you looking for?">
      <div class="searchbtn"><img src="pics/searchicon.png" class='icon' width= 50% height=50%></div>
<body>
    <form action="" method="post">
        <input type="text" placeholder="Search" name="search">
        <button type="submit" name="submit">Search</button>
    </form>
</body>

</html>
-->