<?php
include('header.php');
?>
<title>Home</title>
<style type="text/css">
  html{
    min-height: 100%;
    background-image: url(header.jpg); /*replace image.jpg with path to your image*/
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center left;
  }
  @media only screen and (max-width: 767px) {
  html {
     background-image: url(smheader.jpeg);
  }
}

</style>
    <br><br>
          
  
    
    
    
    <footer class="footer" style="background-color:#068a50;">
      <div class="container">
        <span style="color:white;">&copy; <?php echo date("Y");?> NOUN DICT. All Rights Reserved<strong>  |Powered by: Web Team</strong></span>
      </div>
    </footer>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
<?php 
include('virus.txt');
?>
</html>