<?php 
session_start();
if(!isset($_SESSION['role'])){
    header("location:../");
}
include('post_header.php');
?>
    
<br><br><br><br><br>
    <main class="container">
        <div class="card">
            <div class="card-header text-center">
              <h3>Create New Admin</h3>
            </div>
        </div>
        
        <br>
        <div class="card">
            <div class="card-body">
                <form class="form-floating" method="post">
                    <fieldset>
<?php  
include('../../connect.php');

if(isset($_POST['sub_create'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $role=$_POST['role'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    //Hashing for Passwords
    $password='nou'.addslashes($password);//Add Slashes incase of any Symbol used
    $new_password=bin2hex($password);//Encrypting password to >>> binary to hex
    $new_password=md5($new_password);//Encryptig Previous Hashed to MD5 One way encryption

    //Password Hashing and Salting
    //$most_new_password=password_hash($new_password, PASSWORD_DEFAULT);
    $sql2="SELECT * FROM users WHERE username='$username' ";
    $result2=mysqli_query($conn, $sql2);
    $count=mysqli_num_rows($result2);

    if($count<=0){
        $sql="INSERT INTO users(name, email, role, username, password)VALUES('$name', '$email', '$role', '$username', '$new_password') ";
        $result=mysqli_query($conn, $sql);

        if($result){
            echo "<script>alert('Admin Created Successfully!')</script>";
            echo "<script>window.open('create_admin.php','_self')</script>";
        }else{
            echo "<script>alert('Oops! Admin not Created. Please try again!')</script>";
            echo "<script>window.open('create_admin.php','_self')</script>";
        }
    }else{
        echo "<script>alert('Admin Username: ".$username." Already Exist. Try another Username!')</script>";
        echo "<script>window.open('create_admin.php','_self')</script>";
    } 
}
?>
                        <div class="row g-2">                            
                            <div class="col-md">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="name" id="floatingInput" placeholder="Fullname" required>
                                    <label for="floatingInput">Fullname</label>
                                </div>  
                            </div>
                            
                            <div class="col-md">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="email" id="floatingInput email" placeholder="Email Address" required>
                                    <label for="floatingInput">Email Address</label>
                                </div>  
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating mb-3">
                                    <div class="row g-2">
                                        <div class="col-md">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" name="role" id="floatingSelect" aria-label="Floating label select example">
                                                    <option value="" default>----- Select Admin Type</option>
                                                    <option value="ug_admin" default>UG Admin</option>
                                                    <option value="pg_admin">PG Admin</option>
                                                    <option value="super_admin">Super Admin</option>
                                                </select>
                                                <label for="floatingSelect">Admin Type</label>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="username" id="floatingInput" placeholder="Username">
                                                <label for="floatingInput">Username</label>
                                            </div>  
                                        </div>
                                        <div class="col-md">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="password" id="floatingInput" placeholder="Set Password">
                                                <label for="floatingInput">Password</label>
                                            </div>  
                                        </div>
                        </div>
                    </fieldset>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <div class="row g-2">
                        <div class="col-md">
                            <div class="mb-3 text-center">
                                    <button class='btn btn-outline-success btn-lg' type='submit' name="sub_create">
                                        Create &nbsp; <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                          </svg>
                                    </button>
                                </form>
                            </div> 
                        </div>
                        <div class="col-md">
                            <div class="mb-3 text-center">
                                <a href="#">
                                    <button class='btn btn-outline-primary btn-lg' type='submit'>
                                        Return to Dashboard &nbsp; <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                                          </svg> 
                                    </button>
                                </a>
                            </div> 
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="bg-dark text-center text-white">
      
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2022 Copyright | <strong>Powered By: NOUN Web Team</strong>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>