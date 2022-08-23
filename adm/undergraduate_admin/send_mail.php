<?php
include('post_header.php');
include('../../connect.php');
$get_id=$_GET['id'];

$sql="SELECT * FROM undergraduate WHERE id='$get_id' ";
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
              <h4>Send Mail to <b><?php echo $rows['title']." ".$rows['firstname']." ".$rows['middlename']." ".$rows['lastname'];  ?></b> </h4>
            </div>
            <div class="card-body">
                <fieldset>
                <table class="table table-condensed">
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
                </table>
                </fieldset>
<?php  
if(isset($_POST['sub_mail'])){
    $hidden_id=$_POST['hidden_id'];
    $to=$_POST['hidden_email'];
    $message=$_POST['message'];
    $subject=$_POST['subject'];
    $message = wordwrap($message, 70, "\r\n");
    $headers ='From: transcript.nou.edu.ng';

    $mail_result=mail($to, $subject, $message, $headers);

    

    if($mail_result){
        echo "<script>alert('Mail Sent Successful!')</script>";
        echo "<script>window.open('send_mail.php?id=".$hidden_id."', '_self')</script>";
    }else{
        echo "<script>alert('Oops! Could not send mail Unsuccessful. Please try again!')</script>";
        echo "<script>window.open('send_mail.php?id=".$hidden_id."', '_self')</script>";
    }
}


?>
                <fieldset>
                <legend>Compose Mail</legend>
                <form method="post">
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="subject" id="floatingInput" placeholder="Subject">
                            <label for="floatingInput">Subject</label>
                        </div>  
                    </div>
                </div>

                <div class="col-md">
                    <div class="mb-3 text-center">
                        <div class="col-md">
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="message" placeholder="Message Body" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Message Body</label>
                        </div>  
                    </div>
                    </div> 
                </div>

                <div class="col-md">
                    <div class="mb-3 text-center">
                        <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="hidden" name="hidden_email" value="<?php echo $rows['email'];  ?>">
                            <input type="hidden" name="hidden_id" value="<?php echo $rows['id'];  ?>">
                            <input type="submit" class="btn btn-primary" name="sub_mail" value="Send"> <input type="reset" class="btn btn-danger" name="" value="Clean">
                        </div>  
                    </div>
                    </div> 
                </div> 
            </form>
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