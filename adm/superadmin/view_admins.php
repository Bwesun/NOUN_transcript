<?php 
session_start();
if(!isset($_SESSION['role'])){
    header("location:../");
}
include('post_header.php');
include('../../connect.php');
?>
    
<br><br><br><br><br>
    <main class="container">
        <div class="card">
            <div class="card-header text-center">
              <h3>Registered Admins</h3>
            </div>
        </div>
        
        <br>
        <div class="card">
            <div class="card-body">
                    <fieldset>
<table class="table border">
                <thead class="table-dark">
<?php
$sql="SELECT * FROM users ";
$result=mysqli_query($conn, $sql);
?>
                    <tr>
                        <th scope="col" style="background-color:#068a50;">Full Name</th>
                        <th scope="col" style="background-color:#068a50;">Username</th>
                        <th scope="col" style="background-color:#068a50;">E-mail</th>
                        <th scope="col" style="background-color:#068a50;">Role</th>
                        <th scope="col" style="background-color:#068a50;" colspan="">Action</th>
                    </tr>
                </thead>
                <tbody>
<?php 
while($rows=mysqli_fetch_array($result)){
?>
                    <tr>
                        <td><?php echo $rows['name'];  ?></a></td>
                        <td><?php echo $rows['username'];  ?></td>
                        <td><?php echo $rows['email'];  ?></td>
                        <td><?php echo $rows['role'];  ?></td>
                        <form method="post"><td>
                                <input type="hidden" name="hidden_id" value="<?php echo $rows['id'];?>">
                                <button title="Click to Delete Admin" class='btn btn-outline-danger btn-sm' type='submit' name="sub_delete">
                                    <svg xmlns="http://www.w3.org/2000/svg"width="16" height="16" fill="currentColor" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M274.7 304H173.3C77.61 304 0 381.6 0 477.3C0 496.5 15.52 512 34.66 512h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM577.9 223.1l47.03-47.03c9.375-9.375 9.375-24.56 0-33.94s-24.56-9.375-33.94 0L544 190.1l-47.03-47.03c-9.375-9.375-24.56-9.375-33.94 0s-9.375 24.56 0 33.94l47.03 47.03l-47.03 47.03c-9.375 9.375-9.375 24.56 0 33.94c9.373 9.373 24.56 9.381 33.94 0L544 257.9l47.03 47.03c9.373 9.373 24.56 9.381 33.94 0c9.375-9.375 9.375-24.56 0-33.94L577.9 223.1z"/></svg>
                            </button>
                        </td>

                        </form>                 
                    </tr>
<?php 
}

if(isset($_POST['sub_delete'])){
    $hidden_id=$_POST['hidden_id'];

    $sql8="DELETE FROM users WHERE id='$hidden_id' ";
    $result8=mysqli_query($conn, $sql8);

    if($result8){
        echo "<script>alert('Admin Deleted Successfully!')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }else{
        echo "<script>alert('Oops! Unable to Delete Admin. Please Try Again!')</script>";
    }
}
?>
                </tbody>
        <!--Table footer-->
                    <tfoot class="table-dark">
                        <tr>
                            <th scope="col" style="background-color:#068a50;">Full Name</th>
                            <th scope="col" style="background-color:#068a50;">Username</th>
                            <th scope="col" style="background-color:#068a50;">E-mail</th>
                            <th scope="col" style="background-color:#068a50;">Role</th>
                            <th scope="col" style="background-color:#068a50;" colspan="">Action</th>
                        </tr>
                    </tfoot>
        </table>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <div class="row g-2">
                        <div class="col-md">
                            <div class="mb-3 text-center">
                                <a href="index.php">
                                    <button class='btn btn-outline-primary btn-lg' type='submit'>
                                        Return to Dashboard &nbsp; <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                                          </svg> 
                                    </button>
                                </a>
                            </div> 
                        </div> 
                    </div>
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