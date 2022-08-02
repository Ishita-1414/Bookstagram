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
                <div class="container"><a class="navbar-brand" href="#">BOOKSTAGRAM</a>
                <span class="navbar-text"> 
                    <button class="btn btn-dark"> <a class="login" href="library.php">Library</a></button>
                    <button class="btn btn-dark"> <a class="login" href="friends.php">Friends</a></button>
                </span></div>

                </div>
            </nav>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<?php 
session_start();
if (isset($_SESSION['user_id']))
{
     $mysqli=new mysqli("localhost","root","","bookstagram");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
           exit();
     } 
	echo "hello there";
	$a = $_SESSION['user_id'];
	echo "User is  $a";
     if ($result = $mysqli -> query("SELECT * FROM `library` WHERE `User_id` !=  $a ;")) 
    {
        echo '<div align="center">';  
      echo "<h2 style='color:white;'>Books With Friends: " . $result->num_rows."</h2><br>";
      echo "</div>";
      echo '<ul class="list-group list-group-flush" style="padding-left:35%;">';
         while($row = $result->fetch_assoc())
          {  
            $name = $row['Book_name'];
            $desc = $row['Description'];
            $bid  = $row['Book_id'];
            echo '<a class="list-group-item list-group-item-action list-group-item-info  d-flex justify-content-center" type="button" data-toggle="modal" data-target="#soos'.$bid.'" style="width:50%;"  align="center">'.$name.'</a>';
            echo '
            <div class="modal fade" id="soos'.$bid.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">'.$name.'</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        '.$desc.'
                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Request</button>
                  </div>
                </div>
              </div>
            </div>';
          }
         echo "</u1>";

    }
    $result -> free_result();
    $mysqli -> close();
}

 ?>