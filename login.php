<!DOCTYPE html>
<?php session_start(); ?>
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
        <div class="row">
            <div class="clearfix"></div>
            <div class="col">
                <div class="clearfix"></div>
            </div>
            <div class="col">
                <div class="clearfix"></div>
            </div>
            <div class="col">
                <form method="get" action="signup.php">
                    <button class="btn btn-primary" type="submit" style="background-color: rgb(43,72,104);margin-left: 60%;">Signup</button>    
                </form>
            </div>
        </div>
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><input class="btn btn-primary btn-block" type="submit" name="submit" value="Log In"></div><a class="forgot" href="#">Forgot your email or password?&nbsp;</a><a class="forgot" href="#">Make a new account by clicking on Signup<br></a></form>
                <?php  
    $user = 0;
      if (isset($_POST["submit"]))
       {
               $n1=$_POST["email"];
               $n2=$_POST["password"];
               $flag=0;
                $mysqli=new mysqli("localhost","root","","bookstagram");
                if ($mysqli -> connect_errno) {
                    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                       exit();
                 } 
                    if ($result = $mysqli -> query("SELECT * FROM `user_credentials` ")) 
                    {  
                      // echo "Returned rows are: " . $result->num_rows."<br>";
                         while($row = $result->fetch_assoc())
                          {  if ($row["Email"]==$n1 && $row["Password"]==$n2) 
                            {   
                                 // echo "welcome $n1";
                                $user = $row["User_id"];
                                 $flag=1;
                                 break;
                            }
                          }
                          if($flag==0)
                          {
                            echo '<div class="alert alert-dark" role="alert">
                             Something is wrong with your credentials!
                            </div>';

                          }
                    }
                    $result -> free_result();
                    $mysqli -> close();
                    if($flag == 1) {
                        $_SESSION['user_id'] = $user; 
                        header("Location:dashboard.php");
                        exit();
                    }
        }
  ?>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>