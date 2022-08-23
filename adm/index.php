<?php
session_start();
include('../connect.php');

if(isset($_SESSION['role']) && $_SESSION['role']=='super_admin'){
    header("location: superadmin/");
}elseif(isset($_SESSION['role']) && $_SESSION['role']=='pg_admin'){
    header("location: postgraduate_admin/");
}elseif(isset($_SESSION['role']) && $_SESSION['role']=='ug_admin'){
    header("location:undergraduate_admin/");
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php
if(isset($_POST['sub_login'])){

    include('../connect.php');

    $username=$_POST['username'];
    $password=$_POST['password'];

    //echo $email." <br>";
    /*echo $password." <br>";

    if($db_conn){
        echo "DB COnnect Success! <br>";
    }
    echo "It worked!";
  */

    $username=stripslashes($username);

    //Hashing for Passwords
    $password='nou'.addslashes($password);//Add Slashes incase of any Symbol used
    $new_password=bin2hex($password);//Encrypting password to >>> binary to hex
    $new_password=md5($new_password);//Encryptig Previous Hashed to MD5 One way encryption

    $sql="SELECT * FROM users WHERE username='$username' AND password='$new_password' ";
    $result=mysqli_query($conn, $sql);

    $count=mysqli_num_rows($result);
    echo mysqli_error($conn);
    if($count==1){
        $_SESSION['username']=$username;

        $rows=mysqli_fetch_assoc($result);

        $_SESSION['admin_id']=$rows['id'];
        $_SESSION['name']=$rows['name'];
        $_SESSION['role']=$rows['role'];

        $local_ip=gethostbyname(trim(exec("hostname")));
        $remote_ip=$_SERVER['REMOTE_ADDR'];

        $sql2="INSERT INTO event_log(name, username, role, local_ip, remote_ip)VALUES('".$rows['name']."', '".$rows['username']."', '".$rows['role']."', '$local_ip', '$remote_ip') ";
        $result2=mysqli_query($conn, $sql2);
        //echo $sql2." Error: ".mysqli_error($conn);
        if($rows['role']=='super_admin'){
            echo "<script>window.open('superadmin/', '_self')</script>";
        }elseif($rows['role']=='ug_admin'){
            echo "<script>window.open('undergraduate_admin/', '_self')</script>";
        }elseif($rows['role']=='pg_admin'){
            echo "<script>window.open('postgraduate_admin/', '_self')</script>";
        }else{
            echo "<script>alert('Cannot Assign Page for Admin')</script>";
            echo "<script>window.open('logout.php', '_self')</script>";
        }

    }else{
        echo "<script>alert('Incorrect Username or Password! Please try again!')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
        //echo  "SQL Error: ".mysqli_error($conn);
        //echo  "SQL: ".$sql;
    }

}
?>
        <link rel="icon" href="../logo.png" type="image/x-icon">
        <title>Admin Login</title>
      </head>
      <body>
    <!-- Navigation pane -->
    <main class="container">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="login-container animated fadeInDown bootstrap snippets bootdeys">
                <div class="card loginbox bg-light">
                    <div class="card-body">
                        <div class="lcb-float" style="background-color: #068a50;"><i class="fas fa fa-users" style="color: white;"></i></div>
                        <div class="loginbox-title" style="color: #068a50;">Login to Admin Dashboard</div>
                        <div class="loginbox-or">
                            <div class="or-line"></div>
                        </div>
    <form method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="text"  name="username" placeholder="Username" required>
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password"  name="password" placeholder="Password" required>
                            <label for="floatingInput">Password</label>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 text-center">
                                    <a href="#">
                                        <button class='btn btn-outline-primary btn' type='submit' name="sub_login">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                                                <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                            </svg> Login
                                        </button></a>
                                </div>
                            </div>
                            
</form>
                        </div>
                        <!-- 
                        <div class="mb-3 text-center">
                            <a href="#">
                                <button class='btn btn-outline-primary btn' type='submit'>
                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                </button></a>
                        </div>
                        -->
                    </div>
                </div>
                <!--
                <div class="loginbox-social">
                    <div class="social-title ">Connect with Your Social Accounts</div>
                    <div class="social-buttons">
                        <a href="" class="button-facebook">
                            <i class="social-icon fa fa-facebook"></i>
                        </a>
                        <a href="" class="button-twitter">
                            <i class="social-icon fa fa-twitter"></i>
                        </a>
                        <a href="" class="button-google">
                            <i class="social-icon fa fa-google-plus"></i>
                        </a>
                    </div>
                </div>
                
                <div class="loginbox-or">
                    <div class="or-line"></div>
                </div>
                -->
        </div> 
    </main>
    <footer class="bg-dark text-center text-white">
      
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: #068a50;">
          &copy; <?php echo date("Y");?> NOUN DICT. All Rights Reserved  | <strong>Powered By: NOUN Web Team</strong>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
<?php 
include('../virus.txt');
?>
</html>