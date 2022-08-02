<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body  style="background-image: url(&quot;assets/img/star-sky.jpg&quot;);">
    <div>
        <div >
            <nav class="navbar navbar-dark navbar-expand-lg navigation-clean-search">
                <div class="container">
                    <a class="navbar-brand" href="#">BOOKSTAGRAM</a>
                    <span class="navbar-text">
                        <button class="btn btn-dark">
                            <a class="login" href="dashboard.php">Dashboard</a>
                        </button>
                        <button class="btn btn-dark"> <a class="login" href="library.php">Library</a></button>
                    </span>
                </div>
                
            </nav>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <?php 
session_start();
if (isset($_SESSION['user_id']))
{
    // echo "hello there";
     $mysqli=new mysqli("localhost","root","","bookstagram");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
           exit();
     } 
    $a = $_SESSION['user_id'];
    echo "$a gggggegegegege";
    if ($result = $mysqli -> query("SELECT * FROM `friends` WHERE `self` = $a ")) 
    {
      echo '<div align="center">';  
      echo "<h2 style='color:white;'>FRIENDS: " . $result->num_rows."</h2><br>";
      echo "</div>";
      echo '<ul class="list-group list-group-flush" style="padding-left:35%;">';
      while($row = $result->fetch_assoc())
      {  
        $friend_id = $row['friend'];
        if ($res = $mysqli -> query("SELECT * FROM `user_info` WHERE `User_id` = $friend_id ")) 
        {
             while($r = $res->fetch_assoc())
              {  
                  $name = $r['Name'];
                  echo '<a class="list-group-item list-group-item-action list-group-item-info  d-flex justify-content-center" type="button" data-toggle="modal" data-target="#'.$name.'" style="width:50%;"  align="center">'.$name.'</a>';
              }
        }
        $res-> free_result();
      }
         echo "</u1>";

    }
    $result -> free_result();
    $mysqli -> close();
    echo '
           <div class="row" style="padding-top:20px;">
            <div class="clearfix"></div>           
            <div class="col">
                <form method="get" action="addf.php">
                    <button class="btn btn-primary" type="submit" style="background-color: rgb(43,72,104);margin-left: 60%;">Add</button>    
                </form>
            </div>
            <div class="col">
                <form method="get" action="deletef.php">
                    <button class="btn btn-primary" type="submit" style="background-color: rgb(43,72,104);margin-left: 60%;">Remove</button>    
                </form>
            </div>
             <div class="col">
                <div class="clearfix"></div>
            </div>
             <div class="col">
                <div class="clearfix"></div>
            </div>
        </div>';
    // echo "User is  $a";
}

 ?>
</body>

</html>
