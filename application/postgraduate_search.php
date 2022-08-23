
<?php
include('connect.php');
include('postgraduate_header.php');

$get_term=$_GET['matric_no'];

?>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
$output='';
$sql="SELECT * FROM postgraduate WHERE matric_no LIKE '%".$get_term."%' OR email LIKE '%".$get_term."%' ";
$result=mysqli_query($conn, $sql);

if($get_term==''){
    echo "<script type='text/javascript'>
    alert('Enter Search Term!');
    window.open('postgraduate.php','_self');
</script>";
}elseif(mysqli_num_rows($result)>0)
{
	
	echo '<div class="container"><div class="row"> <h3>Search Results for '.$get_term.':</h3>';
    ?>
<table class="table table-condensed table-striped table-responsive">
    <tr>
        <th>Name(s)</th>
        <th>Matric. No.</th>
        <th>E-mail</th>
        <th>Phone No.</th>
        <th>Status</th>
    </tr>
    <?php 
    $count=mysqli_num_rows($result);
	while($rows=mysqli_fetch_array($result))
	{
    ?>
    <tr>
        <td><?php echo $rows['firstname'].' '.$rows['middlename'].' '.$rows['lastname']; ?></td>
        <td><?php echo $rows['matric_no']; ?></td>
        <td><?php echo $rows['email']; ?></td>
        <td><?php echo $rows['phone']; ?></td>
        <td><?php echo $rows['status']; ?></td>
    </tr>
    
    <?php
}
echo '<tr>
        <td colspan="5">Search Count: <b>'.$count.'</b></td>
    </tr>';

echo '</div></div>';
}
else
{
	echo '<div class="container">
    <h3>No Data Found for: <b> '.$get_term.'</b></h3>
    </div>';
}
?>
</table>
<?php 
include('../virus.txt');
?>
<footer class="footer" style="background-color:#068a50;">
      <div class="container">
        <span style="color:white;">&copy; <?php echo date("Y");?> NOUN DICT. All Rights Reserved<strong>  |Powered by: Web Team</strong></span>
      </div>
    </footer>