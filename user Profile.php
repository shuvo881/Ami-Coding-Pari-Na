
<?php
  session_start();

  $serverName = "127.0.0.1"; //serverName\instanceName
  $userName = "root";
  $password = "";
  $database = "userreg";

  $phn = $_SESSION["phn"];
  $assesor = $_SESSION["access"];

  if(isset($_POST["submit"])){
    
    echo "<script>alert('Invalid user name and password.');</script>";
    exit();
  }


 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="user profile.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
  </head>
  <body>
    <div class="student-profile py-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="card shadow-sm">
              <div class="card-header bg-transparent text-center">
                <img class="profile_img" src="loginUserPic.png" alt="student dp">
                <h2>General User</h2>

              </div>
              <div class="card-body">
                <?php
                $msqlConn =  mysqli_connect($serverName, $userName, $password, $database);
                if($msqlConn ) {
                  $sql = "SELECT * FROM userinfo WHERE phone = '$phn'";
                  $result = mysqli_query($msqlConn,$sql);
                  $row = mysqli_fetch_assoc($result);


                ?>

                <p class="mb-0"><strong class="pr-1">Fast Name:</strong><?php echo $row['fastName']; ?></p>
                <p class="mb-0"><strong class="pr-1">Last Name:</strong><?php echo $row['lastName']; ?></p>
                <p class="mb-0"><strong class="pr-1">Email:</strong><?php echo $row['email']; ?></p>
              <?php
            } ?>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="card shadow-sm">
              <div class="card-header bg-transparent border-0">
                  <button onclick="location.href='login.php'"  class="mb-0"><i class="far fa-clone pr-1"></i>logout</h3>
              </div>
            </div>
              <div style="height: 26px"></div>
            <div class="card shadow-sm">
              <div class="card-header bg-transparent border-0">
                <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Others</h3>
              </div>
              <div class="card-body pt-0">
                  <form class="" action="#" method="post">
                    <input type="text" name="value" placeholder="input values">
                    <input type="text" name="value" placeholder="Search value">
                    <input type="submit" name="submit" value="find">
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
