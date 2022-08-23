<?php
include('../../connect.php');

$output='';
$sql="SELECT * FROM undergraduate WHERE matric_no LIKE '%".$_POST['search']."%' OR email LIKE '%".$_POST['search']."%' ";
$result=mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0)
{
?>
    <div class="card">
        <div class="card-body">
            <table class="table border">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" style="background-color:#068a50;">Application Date</th>
                        <th scope="col" style="background-color:#068a50;">Matric No.</th>
                        <th scope="col" style="background-color:#068a50;">Fullname</th>
                        <th scope="col" style="background-color:#068a50;">Programme</th>
                        <th scope="col" style="background-color:#068a50;">Status</th>
                        <th scope="col" style="background-color:#068a50;" colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
<?php 
while($rows=mysqli_fetch_array($result)){
?>
                    <tr>
                        <td><?php echo $rows['datetime'];  ?></td>
                        <td><a href="view_application.php?id=<?php echo $rows['id'];?>" target="_blank"><?php echo $rows['matric_no'];  ?></a></td>
                        <td><?php echo $rows['firstname']." ".$rows['middlename']." ".$rows['lastname'];  ?></td>
                        <td><?php echo $rows['programme'];  ?></td>
                        <td><?php echo $rows['status'];  ?></td>
                        <td>
                                <a href='view_application.php?id=<?php echo $rows['id'];?>' title="Click to view application details" class='btn btn-outline-info btn-sm' type='view'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                            </a>
                        </td>
                        <td>
                                <a href='update_application.php?id=<?php echo $rows['id'];?>'title='Click to update application' class='btn btn-outline-success btn-sm' type='edit'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>
                        </td>
                        <td>
                                <a href='send_mail.php?id=<?php echo $rows['id'];?>'title='Click to send mail to the applicant' class='btn btn-outline-primary btn-sm' type='send'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-plus" viewBox="0 0 16 16">
                                        <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
                                        <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z"/>
                                    </svg>
                                </a>
                        </td>                  
                    </tr>
<?php 
}
?>
                </tbody>
        <!--Table footer-->
                    <tfoot class="table-dark">
                        <tr>
                            <th scope="col" style="background-color:#068a50;">Application Date</th>
                            <th scope="col" style="background-color:#068a50;">Matric No.</th>
                            <th scope="col" style="background-color:#068a50;">Fullname</th>
                            <th scope="col" style="background-color:#068a50;">Programme</th>
                            <th scope="col" style="background-color:#068a50;">Status</th>
                            <th scope="col" style="background-color:#068a50;" colspan="3">Action</th>
                        </tr>
                    </tfoot>
        </table>
        </div>
    </div>
<?php 
}
else
{
	echo '<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<em>Feedback: </em> NO DATA FOUND!
			</div>';
}

?>
<style type="text/css">
	.well {
    border: 0;
    padding: 10px;
    min-height: 53px;
    background: #fff;
    box-shadow: none;
    border-radius: 3px;
    position: relative;
    max-height: 100000px;
    border-bottom: 2px solid #ccc;
    transition: max-height 0.5s ease;
    -o-transition: max-height 0.5s ease;
    -ms-transition: max-height 0.5s ease;
    -moz-transition: max-height 0.5s ease;
    -webkit-transition: max-height 0.5s ease;
}

.search-result .title h3 {
    margin: 0 0 15px;
    color: #333;
}
.search-result .title p {
    font-size: 12px;
    color: #333;
}
</style>