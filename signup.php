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
        <div class="row">
            <div class="clearfix"></div>
            <div class="col">
                <div class="clearfix"></div>
            </div>
            <div class="col">
                <div class="clearfix"></div>
            </div>
            <div class="col">
                 <form method="get" action="login.php">
                    <button class="btn btn-primary" type="submit" style="background-color: rgb(43,72,104);margin-left: 60%;">Login</button>    
                </form>
            </div>
        </div>
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="form-group"><input class="form-control" type="text" placeholder="Name" name="name"></div>
            <div class="form-group"><input class="form-control" type="text" placeholder="Address" name="address"></div>
            <div class="form-group"><input class="form-control" type="number" style="color: rgb(255,255,255);" placeholder="Number" name="number"></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><input class="btn btn-primary btn-block" type="submit" value="Signup" name="submit"></div>
        </form>
            <?php  
      if (isset($_POST["submit"]))
       {
                // echo "hereh herhehrhehrherherhh";
                $flag = 0;
               $n1=$_POST["email"];
               $n2=$_POST["password"];
               $n3=$_POST["name"];
               $n4=$_POST["address"];
               $n5=$_POST["number"];
                $mysqli=new mysqli("localhost","root","","bookstagram");
                if ($mysqli -> connect_errno) {
                    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                       exit();
                 } 
                    if ($result = $mysqli -> query("SELECT * FROM `user_credentials` ")) 
                    {  
                         while($row = $result->fetch_assoc())
                          {  if ($row["Email"]==$n1) 
                            {   
                                $user = $row["User_id"];
                                echo '<div class="alert alert-dark" role="alert">
                             Email id already in use!
                            </div>';
                                $flag = 1;
                                break;
                            }
                          }
                    }
                    if($flag==0)
                    {
                        // echo "hey heyy hyehye hyehe ehyehe ey ehy";
                        $mysqli -> query("INSERT INTO `user_info` (`Email`, `Address`, `Name`, `Contact`) VALUES ('$n1', '$n4', '$n3', '$n5') ");
                        $tmp = $mysqli -> query("SELECT * FROM `user_info` WHERE `Email` = '$n1' ");
                         // while($t = $tmp->fetch_assoc())
                         // {
                         //    $usd = $t["User_id"];
                         //    echo "$usd";
                         // }
                        $t = $tmp->fetch_assoc();
                        $usd = $t["User_id"];
                        $mysqli -> query("INSERT INTO `user_credentials` (`User_id`,`Email`, `Password`) VALUES ('$usd','$n1', '$n2'); ");
                        header("Location:login.php");
                        exit();
                    }
                    $result -> free_result();
                    $mysqli -> close();
                    
        }
  ?>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
 
</html>