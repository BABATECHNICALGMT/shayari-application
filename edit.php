<?php
require_once('config.php');
$id = $_GET['id'];

if(isset($_POST['submits'])){
    $shayari_text = $_POST['sayari_text'];
    $sql ="UPDATE shayari_viwe set id='$id',shayari='$shayari_text' WHERE id='$id'";
    mysqli_query($con,$sql);
    header('location:read.php');
    sleep(3);
    exit();

}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>sayari edit</title>

  </head>
  <body class="bg-light">
<div class="container my-5">
<form class="needs-validation" novalidate method="POST" >
  <div class="form-group">
    <label for="exampleFormControlTextarea1">You can update shayari here</label>
    <?php
    $sql = "SELECT * FROM  shayari_viwe where id='$id'";
    $result = mysqli_query($con,$sql);
    $num = mysqli_fetch_assoc($result);

    
?>
<textarea class="form-control" id="exampleFormControlTextarea1" rows="5" id="exampleFormControlTextarea1" required name="sayari_text" value="<?php echo $num['shayari'];?>"><?php echo $num['shayari'];?></textarea>
     
   
    
  </div>
  <br>
  <button class="btn btn-primary" type="submit" name="submits">Post form</button>
</form>
</div>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

  </body>
</html>