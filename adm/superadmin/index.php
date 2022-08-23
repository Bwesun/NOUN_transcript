<?php 
session_start();
if(!isset($_SESSION['role'])){
    header("location:../");
}
include('post_header.php');
?>
<title>Super Admin Dashboard</title>
    <!-- Navigation end here-->
     <br><br><br>
    <main>
    <div class="container">

            <div class="">
                <div class=" text-left">
                  <h2>Dashboard</h2>
                </div>
            </div>
                
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

<div class="col-md-12">
    <div class="row">
        <div class="col-xl-4 col-lg-6 ">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-address-card"></i></div>
                    <div class="mb-4">
                        <h6 class="card-title mb-0">Total Admins</h6>
                    </div>
<?php 
include('../../connect.php');

$sql="SELECT * FROM users ";
$result=mysqli_query($conn, $sql);
$total_application=mysqli_num_rows($result);
$total_application_percentage=($total_application/$total_application)*100;

$sql3="SELECT * FROM users WHERE role='super_admin' ";
$result3=mysqli_query($conn, $sql3);
$total_awaiting=mysqli_num_rows($result3);
$total_awaiting_percentage=($total_awaiting/$total_application)*100;

$sql4="SELECT * FROM users WHERE role='pg_admin' ";
$result4=mysqli_query($conn, $sql4);
$total_mis=mysqli_num_rows($result4);
$total_mis_percentage=($total_mis/$total_application)*100;

$sql5="SELECT * FROM undergraduate WHERE status='ug_admin' ";
$result5=mysqli_query($conn, $sql5);
$total_received=mysqli_num_rows($result5);
$total_received_percentage=($total_received/$total_application)*100;

/*
$sql6="SELECT * FROM undergraduate WHERE status='Prepared & Typed Transcript' ";
$result6=mysqli_query($conn, $sql6);
$total_prepared=mysqli_num_rows($result6);
$total_prepared_percentage=($total_prepared/$total_application)*100;

$sql7="SELECT * FROM undergraduate WHERE status='Mailed to Destination' ";
$result7=mysqli_query($conn, $sql7);
$total_mailed=mysqli_num_rows($result7);
$total_mailed_percentage=($total_mailed/$total_application)*100;
*/
?>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <?php echo number_format($total_application); ?>
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span><?php echo number_format($total_application_percentage, 1);  ?>% <i class="fa fa-arrow-up"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo number_format($total_application_percentage, 1);  ?>%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 align-items-center">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-hourglass-half"></i></div>
                    <div class="mb-4">
                        <h6 class="card-title mb-0">Super Admins</h6>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <?php echo number_format($total_awaiting); ?>
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span><?php echo number_format($total_awaiting_percentage, 1);  ?>% <i class="fa fa-arrow-up"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo number_format($total_awaiting_percentage, 1);  ?>%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa fa-check-square"></i></div>
                    <div class="mb-4">
                        <h6 class="card-title mb-0">Postgraduate Admins</h6>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <?php echo number_format($total_mis); ?>
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span><?php echo number_format($total_mis_percentage, 1);  ?>% <i class="fa fa-arrow-up"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo number_format($total_mis_percentage, 1);  ?>%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 align-items-center">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-hourglass-half"></i></div>
                    <div class="mb-4">
                        <h6 class="card-title mb-0">Undergraduate Admins</h6>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <?php echo number_format($total_received); ?>
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span><?php echo number_format($total_received_percentage, 1);  ?>% <i class="fa fa-arrow-up"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo number_format($total_received_percentage, 1);  ?>%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <form method="post">
<div class="row">
    <div class="col-md-12 form-floating text-center">
        <input type="search" class="form-control me-2" id="search_text" placeholder="Search for Transcript">
        <label for="floatingInput">Search Event Log</label>
    </form>
    </div>
    <div class="col-md-12" id="result"></div>
    <div class="card" style="height:500px; overflow-y: scroll;">
        <div class="card-body">
            <table class="table border">
                <thead class="table-dark">
<?php
$sql="SELECT * FROM event_log ";
$result=mysqli_query($conn, $sql);
?>
                    <tr>
                        <th scope="col" style="background-color:#068a50;">Full Name</th>
                        <th scope="col" style="background-color:#068a50;">Username</th>
                        <th scope="col" style="background-color:#068a50;">Local IP</th>
                        <th scope="col" style="background-color:#068a50;">Remote IP</th>
                        <th scope="col" style="background-color:#068a50;">Role</th>
                        <th scope="col" style="background-color:#068a50;" colspan="">Action</th>
                    </tr>
                </thead>
                <tbody>
<?php 
while($rows=mysqli_fetch_array($result)){
?>
                    <tr>
                        <td><a href="view_event.php?id=<?php echo $rows['id'];?>" target="_blank"><?php echo $rows['name'];  ?></a></td>
                        <td><?php echo $rows['username'];  ?></td>
                        <td><?php echo $rows['local_ip'];  ?></td>
                        <td><?php echo $rows['remote_ip'];  ?></td>
                        <td><?php echo $rows['role'];  ?></td>
                        <form method="post"><td>
                                <a href='view_event.php?id=<?php echo $rows['id'];?>' title="Click to view application details" class='btn btn-outline-info btn-sm' type='view'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                            </a> 
                        </td>

                        </form>                 
                    </tr>
<?php 
}
?>
                </tbody>
        <!--Table footer-->
                    <tfoot class="table-dark">
                        <tr>
                            <th scope="col" style="background-color:#068a50;">Full Name</th>
                            <th scope="col" style="background-color:#068a50;">Username</th>
                            <th scope="col" style="background-color:#068a50;">Local IP</th>
                            <th scope="col" style="background-color:#068a50;">Remote IP</th>
                            <th scope="col" style="background-color:#068a50;">Role</th>
                            <th scope="col" style="background-color:#068a50;" colspan="">Action</th>
                        </tr>
                    </tfoot>
        </table>
        </div>
    </div>
</div>

</div>  
    <br>
    </main>
    <footer class="bg-dark text-center text-white">
      
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2022 Copyright | <strong>Powered By: NOUN Web Team</strong>
        </div>
        <!-- Copyright -->
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
  <script>
    $(document).ready(function(){
        $('#search_text').keyup(function(){
            var txt= $(this).val();
            if(txt !=''){
                $.ajax({
                    url:"fetch.php",
                    method:"post",
                    data:{search:txt},
                    dataType:"text",
                    success:function(data)
                    {
                        $('#result').html(data);
                    }
                });
            }
            else
            {
                $('#result').html('');
            }
        });
    });

</script>
<?php 
include('../../virus.txt');
?>

</html>