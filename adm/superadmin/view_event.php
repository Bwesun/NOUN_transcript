<?php
session_start();
include('post_header.php');
include('../../connect.php');
$get_id=$_GET['id'];

$sql="SELECT * FROM event_log WHERE id='$get_id' ";
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
            <div class="card-body">
                <fieldset>
                    <legend><b><?php echo $rows['name']; ?>'s</b> Login Event on <b><?php echo $rows['datetime'];  ?></b></legend>
                <table class="table table-condensed">
                <tr>
                    <td colspan="3">
                        Full Name<br>
                        <b><?php echo $rows['name']; ?></b> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Username<br>
                        <b><?php echo $rows['username']; ?></b> 
                    </td>
                    <td>
                        Role<br>
                        <b><?php echo $rows['role']; ?></b> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Local IP<br>
                        <b><?php echo $rows['local_ip']; ?></b> 
                    </td>
                    <td>
                        Remote IP<br>
                        <b><?php echo $rows['remote_ip']; ?></b> 
                    </td>
                    <td>
                        Date/Time<br>
                        <b><?php echo $rows['datetime']; ?></b> 
                    </td>
                </tr>
                </table>
                </fieldset>

                <fieldset style="height: 500px; overflow-y: scroll;">
                    <legend>Other Events by <b><?php echo $rows['name']; ?></b></legend>
                    <table class="table border">
                <thead class="table-dark">
<?php
$use_name=$rows['name'];
$sql2="SELECT * FROM event_log WHERE name='$use_name' ORDER BY id DESC ";
$result2=mysqli_query($conn, $sql2);
?>
                    <tr>
                        <th scope="col" style="background-color:#068a50;">Full Name</th>
                        <th scope="col" style="background-color:#068a50;">Username</th>
                        <th scope="col" style="background-color:#068a50;">Local IP</th>
                        <th scope="col" style="background-color:#068a50;">Remote IP</th>
                        <th scope="col" style="background-color:#068a50;">Role</th>
                        <th scope="col" style="background-color:#068a50;">Date/Time</th>
                    </tr>
                </thead>
                <tbody>
<?php 
while($rows=mysqli_fetch_array($result2)){
?>
                    <tr>
                        <td><a href="view_event.php?id=<?php echo $rows['id'];?>" target="_blank"><?php echo $rows['name'];  ?></a></td>
                        <td><?php echo $rows['username'];  ?></td>
                        <td><?php echo $rows['local_ip'];  ?></td>
                        <td><?php echo $rows['remote_ip'];  ?></td>
                        <td><?php echo $rows['role'];  ?></td>
                        <td><?php echo $rows['datetime'];  ?></td>
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
                        <th scope="col" style="background-color:#068a50;">Date/Time</th>
                        </tr>
                    </tfoot>
        </table>
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