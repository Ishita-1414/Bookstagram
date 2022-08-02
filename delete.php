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
    if ($result = $mysqli -> query("SELECT * FROM `library` WHERE `User_id` = $a ")) 
    {
      echo '<div align="center">';  
      echo "<h2 style='color:white;'>Books in library: ";
      echo "</div>";
      echo '<ul class="list-group list-group-flush" style="padding-left:35%;">';
      echo '<form method="post">';
      echo "<select name='str'>";
         while($row = $result->fetch_assoc())
          {  
            $name = $row['Book_name'];
            $desc = $row['Description'];
            $bid  = $row['Book_id'];
            // echo '<a class="list-group-item list-group-item-action list-group-item-info  d-flex justify-content-center" type="button" data-toggle="modal" data-target="#'.$name.'" style="width:50%;"  align="center" value="'.$bid.'" name="submit">'.$name.'</a>';

			echo '<option value="'.$bid.'">'.$name.'</option>';

		  }
		echo "</select>";
		echo '<input type="submit" name="submit" value="DELETE">';
		echo "</form>";
		echo "</u1>";

    }

    $result -> free_result();
    $mysqli -> close();
}
    if (isset($_POST["submit"]))
   {
      $b=$_POST["str"];
      echo "ddddddddddd";
      $mysqli=new mysqli("localhost","root","","bookstagram");
      if ($mysqli -> connect_errno) {
          echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
             exit();
       } 

      $mysqli -> query(" DELETE FROM `library` WHERE `library`.`Book_id` = '$b' ; ");
      $mysqli -> close();
      echo '<div class="alert alert-dark" role="alert">
                   Book Removed succesfully!
                  </div>';

    }
 ?>
</body>

</html>
