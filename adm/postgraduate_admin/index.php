<?php 
include('post_header.php');
?>
<title>Postgraduate Transcript Dashboard</title>
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
<link rel="icon" href="logo.png" type="image/x-icon">
<div class="col-md-12">
    <div class="row">
        <div class="col-xl-4 col-lg-6 ">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-address-card"></i></div>
                    <div class="mb-4">
                        <h6 class="card-title mb-0">Total Application</h6>
                    </div>
<?php 
include('../../connect.php');

$sql="SELECT * FROM postgraduate ";
$result=mysqli_query($conn, $sql);
$total_application=mysqli_num_rows($result);
$total_application_percentage=($total_application/$total_application)*100;

$sql3="SELECT * FROM postgraduate WHERE status='Awaiting Processing' ";
$result3=mysqli_query($conn, $sql3);
$total_awaiting=mysqli_num_rows($result3);
$total_awaiting_percentage=($total_awaiting/$total_application)*10;

$sql4="SELECT * FROM postgraduate WHERE status='Sent to MIS' ";
$result4=mysqli_query($conn, $sql4);
$total_mis=mysqli_num_rows($result4);
$total_mis_percentage=($total_mis/$total_application)*10;

$sql5="SELECT * FROM postgraduate WHERE status='Received Results' ";
$result5=mysqli_query($conn, $sql5);
$total_received=mysqli_num_rows($result5);
$total_received_percentage=($total_received/$total_application)*10;

$sql6="SELECT * FROM postgraduate WHERE status='Prepared & Typed Transcript' ";
$result6=mysqli_query($conn, $sql6);
$total_prepared=mysqli_num_rows($result6);
$total_prepared_percentage=($total_prepared/$total_application)*10;

$sql7="SELECT * FROM postgraduate WHERE status='Mailed to Destination' ";
$result7=mysqli_query($conn, $sql7);
$total_mailed=mysqli_num_rows($result7);
$total_mailed_percentage=($total_mailed/$total_application)*10;

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
                        <h6 class="card-title mb-0">Awaiting Processing</h6>
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
                        <h6 class="card-title mb-0">Sent to MIS</h6>
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
    </div>
    <!-- Second Row Dashboard-->
    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa fa-check-square"></i></div>
                    <div class="mb-4">
                        <h6 class="card-title mb-0">Received Result</h6>
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
                        <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo number_format($total_received_percentage, 1);  ?>%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa fa-paper-plane"></i></div>
                    <div class="mb-4">
                        <h6 class="card-title mb-0">Prepared and Typed</h6>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <?php echo number_format($total_prepared); ?>
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span><?php echo number_format($total_prepared_percentage, 1);  ?>% <i class="fa fa-arrow-up"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo number_format($total_prepared_percentage, 1);  ?>%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 align-items-center">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-hourglass-half"></i></div>
                    <div class="mb-4">
                        <h6 class="card-title mb-0">Sent to Destination</h6>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <?php echo number_format($total_mailed); ?>
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span><?php echo number_format($total_mailed_percentage, 1);  ?>% <i class="fa fa-arrow-up"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo number_format($total_mailed_percentage, 1);  ?>%;"></div>
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
        <label for="floatingInput">Search for Transcript</label>
    </form>
</div>
    <div class="col-md-12" id="result"></div>
</div>

</div>  
    <br>
    </main>
    <footer class="footer" style="background-color:#068a50;">
      <div class="container">
        <span style="color:white;">&copy; <?php echo date("Y");?> NOUN DICT. All Rights Reserved<strong>  |Powered by: Web Team</strong></span>
      </div>
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