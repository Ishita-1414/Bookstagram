<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Bookstagram</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="login-dark" style="margin-left: 0px;"> 
      want a neclace too?
      <div>
        <div >
            <nav class="navbar navbar-dark navbar-expand-lg navigation-clean-search">
                <div class="container">
                    <a class="navbar-brand" href="#">BOOKSTAGRAM</a>
                    <span class="navbar-text">
                        <button class="btn btn-dark">
                            <a class="login" href="dashboard.php">Dashboard</a>
                        </button>
                        <button class="btn btn-dark">
                          <a class="login" href="library.php">Library</a>
                        </button>
                    </span>
                </div>
                
            </nav>
        </div>
    </div>
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="form-group"><input class="form-control" type="text" placeholder="Book Name" name="name"></div>
            <div class="form-group"><input class="form-control" type="text" placeholder="Book Description" name="desc"></div>
            <div class="form-group"><input class="form-control" type="file" name="img" accept="image/*"></div>
            <div class="form-group"><input class="btn btn-primary btn-block" type="submit" value="Add book" name="submit"></div>
        </form>
            <?php  
            session_start();
      if (isset($_POST["submit"]))
       {
          $a = $_SESSION['user_id'];
          $n3=$_POST["name"];
          $n4=$_POST["desc"];

          $mysqli=new mysqli("localhost","root","","bookstagram");
          if ($mysqli -> connect_errno) {
              echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                 exit();
           } 

          $mysqli -> query("INSERT INTO `library` (`User_id`, `Book_name`, `Description`) VALUES ('$a', '$n3', '$n4'); ");
          $mysqli -> close();
          echo '<div class="alert alert-dark" role="alert">
                       Book added succesfully!
                      </div>';

        }
  ?>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
 
</html>