<?php
include('../../connect.php');

$output='';
$sql="SELECT * FROM event_log WHERE name LIKE '%".$_POST['search']."%' OR datetime LIKE '%".$_POST['search']."%' OR username LIKE '%".$_POST['search']."%' OR role LIKE '%".$_POST['search']."%' OR local_ip LIKE '%".$_POST['search']."%' ORDER BY id DESC ";
$result=mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0)
{
?>
    <div class="card">
        <div class="card-body">
            <table class="table border">
                <thead class="table-dark">
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
                        <td>
                                <a href='view_event.php?id=<?php echo $rows['id'];?>' title="Click to view application details" class='btn btn-outline-info btn-sm' type='view'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
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