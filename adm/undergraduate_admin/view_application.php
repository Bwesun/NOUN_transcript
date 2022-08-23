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
              <h4>Undergraduate Transcript Application for <b><?php echo $rows['title']." ".$rows['firstname']." ".$rows['middlename']." ".$rows['lastname'];   ?></b></h4>
            </div>
            <div class="card-body">
                <fieldset>
                    <legend>Personal Details</legend>
                <table class="table table-condensed">
                <tr>
                    <td colspan="3">
                        Title<br>
                        <b><?php echo $rows['title']; ?></b> 
                    </td>
                </tr>
                <tr>
                    <td>
                        First Name<br>
                        <b><?php echo $rows['firstname']; ?></b> 
                    </td>
                    <td>
                        Middle Name<br>
                        <b><?php echo $rows['middlename']; ?></b> 
                    </td>
                    <td>
                        Last Name<br>
                        <b><?php echo $rows['lastname']; ?></b> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Sex<br>
                        <b><?php echo $rows['sex']; ?></b> 
                    </td>
                    <td>
                        Date of Birth<br>
                        <b><?php echo $rows['dob']; ?></b> 
                    </td>
                    <td>
                        Phone No.<br>
                        <b><?php echo $rows['phone']; ?></b> 
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        E-mail<br>
                        <b><?php echo $rows['email']; ?></b> 
                    </td>
                    
                </tr>
                </table>
                </fieldset>

                <fieldset>
                    <legend>Programme Details</legend>
                <table class="table table-condensed">
                    <tr>
                        <td>
                        Matriculation No.<br>
                        <b><?php echo $rows['matric_no']; ?></b> 
                        </td>
                        <td>
                        Program of Study<br>
                        <b><?php echo $rows['programme']; ?></b> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Date of Graduation<br>
                        <b><?php echo $rows['date_of_graduation']; ?></b> 
                        </td>
                        <td>
                        Have applied for Transcript Before?<br>
                        <b><?php echo $rows['applied_before']; ?></b> 
                        </td>
                    </tr>
                </table>
                </fieldset>

                <fieldset>
                    <legend>Transcript Destination Details</legend>
                <table class="table table-condensed">
                    <tr>
                        <td>
                        Recipient<br>
                        <b><?php echo $rows['recipient']; ?></b> 
                        </td>
                        <td>
                        Recipient Name/Office<br>
                        <b><?php echo $rows['recipient_name']; ?></b> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        Address<br>
                        <b><?php echo $rows['address']; ?></b> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                        City/Town<br>
                        <b><?php echo $rows['city_town']; ?></b> 
                        </td>
                        <td>
                        Postal Code<br>
                        <b><?php echo $rows['postal_code']; ?></b> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Country<br>
                        <b><?php echo $rows['country']; ?></b> 
                        </td>
                        <td>
                        Transcript Label<br>
                        <b><?php echo $rows['transcript_label']; ?></b> 
                        </td>
                    </tr>
                </table>
                </fieldset>

                <fieldset>
                    <legend>Supporting Documents</legend>
                <table class="table table-condensed">
                    <tr>
                        <td colspan="3">
                        Remita RRR<br>
                        <b><?php echo $rows['rrr']; ?></b> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Remita Receipt<br>
                        <b><?php 
                            if(empty($rows['file1'])){
                                echo "No file Uploaded!";
                            }else{
                                echo '<img id="myImg" alt="Remita Receipt" src="../../application/files/'.$rows['file1'].'"  width="100%" >';
                            }
                         ?></b> 
                        </td>
                        <td>
                        Notification of Result/Certificate<br>
                        <b><?php 
                            if(empty($rows['file2'])){
                                echo "No file Uploaded!";
                            }else{
                                echo '<img id="myImg" alt="Remita Receipt" src="../../application/files/'.$rows['file2'].'"  width="100%" >';
                            }
                         ?></b> 
                        </td>
                        <td>
                        Birth Certificate/Declaration of Age<br>
                        <b><?php 
                            if(empty($rows['file3'])){
                                echo "No file Uploaded!";
                            }else{
                                echo '<img id="myImg" alt="Remita Receipt" src="../../application/files/'.$rows['file3'].'"  width="100%" >';
                            }
                         ?></b>  
                        </td>
                    </tr>
                </table>
                </fieldset>
            </div>
            <div class="card-footer" align="center">
                <button class="btn btn-success" onclick="window.print()">Print</button> <a href="update_application.php?id=<?php echo $rows['id']; ?>" class="btn btn-primary" type="link" >Update</a> <button class="btn btn-danger" onclick="window.close()">Close</button>
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