<?php
include('post_header.php');
include('../../connect.php');
$get_id=$_GET['id'];

$sql="SELECT * FROM postgraduate WHERE id='$get_id' ";
$result=mysqli_query($conn, $sql);

$rows=mysqli_fetch_assoc($result);

?>
<body>
<br>
<br>
<br>
<br>
    <main class="container">
        <div class="card">
            <div class="card-header text-center">
              <h4>Update Postgraduate Transcript Application </h4>
            </div>
            <div class="card-body">
                <fieldset>
                    <legend>Personal Details</legend>
                <table class="table table-condensed">
                <tr>
                    <td colspan="3">
                        Name<br>
                        <b><?php echo $rows['title']." ".$rows['firstname']." ".$rows['middlename']." ".$rows['lastname'];  ?></b>
                    </td>
                </tr>
                <tr>
                        <td>
                        Matriculation No.<br>
                        <b><?php echo $rows['matric_no']; ?></b> 
                        </td>
                        <td colspan="2">
                        Program of Study<br>
                        <b><?php echo $rows['programme']; ?></b> 
                        </td>
                        <td>
                        E-mail<br>
                        <b><?php echo $rows['email']; ?></b> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Date of Birth<br>
                        <b><?php echo $rows['dob']; ?></b> 
                    </td>
                    <td>
                        Phone No.<br>
                        <b><?php echo $rows['phone']; ?></b> 
                    </td>
                    <td>
                        Date of Graduation<br>
                        <b><?php echo $rows['date_of_graduation']; ?></b> 
                    </td>
                </tr>
                    <tr>
                        <td colspan="3">
                        Remita RRR<br>
                        <b><?php echo $rows['rrr']; ?></b> 
                        </td>
                    </tr>
                </table>
                </fieldset>

                <fieldset>
                <legend>Transcript Administration (Official Use Only)</legend>
<?php  
if(isset($_POST['sub_update'])){
    $status=$_POST['status'];
    $typed_by=$_POST['typed_by'];
    $date_of_verification=$_POST['date_of_verification'];
    $comment=$_POST['comment'];
    $date_sent=$_POST['date_sent'];
    $tracking_code=$_POST['tracking_code'];
    $hidden_id=$_POST['hidden_id'];

    $sql="UPDATE postgraduate SET status='$status', typed_by='$typed_by', date_of_verification='$date_of_verification', comment='$comment', date_sent='$date_sent', tracking_code='$tracking_code' WHERE id='$hidden_id' ";
    $result=mysqli_query($conn, $sql);

    if($result){
        echo "<script>alert('Update Successful!')</script>";
        echo "<script>window.open('update_application.php?id=".$hidden_id."', '_self')</script>";
    }else{
        echo "<script>alert('Update Unsuccessful. Please try again!')</script>";
        echo "<script>window.open('update_application.php?id=".$hidden_id."', '_self')</script>";
    }
}


?>
                <form method="post">
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="status" id="floatingSelect" aria-label="Floating label select example">
                                <option value="<?php echo $rows['status']; ?>"><?php echo $rows['status']; ?></option>
                                <option value="Awaiting Processing" default>Awaiting Processing</option>
                                <option value="Sent to MIS">Sent to MIS</option>
                                <option value="Received Results">Received Results</option>
                                <option value="Prepared & Typed Transcript">Prepared & Typed Transcript</option>
                                <option value="Mailed to Destination">Mailed to Destination</option>
                            </select>
                            <label for="floatingSelect">Transcript Status</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" value="<?php echo $rows['typed_by']; ?>" name="typed_by" id="floatingInput" placeholder="Typed By">
                            <label for="floatingInput">Typed By</label>
                        </div>  
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" value="<?php echo $rows['date_of_verification']; ?>" name="date_of_verification" id="floatingInput" placeholder="Date of Verification">
                            <label for="floatingInput">Date of Verification</label>
                        </div>  
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="comment" placeholder="Leave a comment here" id="floatingTextarea"><?php echo $rows['comment']; ?></textarea>
                            <label for="floatingTextarea">Comment/Other Information</label>
                        </div>  
                    </div>
                </div>

                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input type="date" name="date_sent" value="<?php echo $rows['date_sent']; ?>" class="form-control" id="floatingInput" placeholder="Date of Verification">
                                        <label for="floatingInput">Date Sent</label>
                                    </div>  
                                </div>
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="tracking_code"  value="<?php echo $rows['tracking_code']; ?>" class="form-control" id="floatingInput" placeholder="Tracking Code for Post Develivery">
                                        <label for="floatingInput">Tracking Code for Post Develivery</label>
                                    </div>  
                                </div>
                </div>
                <div class="row g-2">
                <div class="col-md">
                    <div class="mb-3 text-center">
                            <input type="hidden" value="<?php echo $rows['id']; ?>" name="hidden_id">
                            <button class='btn btn-outline-success btn-lg' type='submit' name="sub_update">
                                Save &nbsp; <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                </svg>
                            </button>
                    </div>
                    </form> 
                </div>
                <div class="col-md">
                    <div class="mb-3 text-center">
                            <a class='btn btn-outline-primary btn-lg' href="index.php">
                                Return to Dashboard &nbsp; <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                                  </svg> 
                            </a>
                    </div> 
                </div> 
            </div>
            </fieldset>
            </div>
        </div>
    </main>
   
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

<?php 
include('../../virus.txt');
?>
</html>