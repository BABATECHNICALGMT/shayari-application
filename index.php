<?php
require_once('config.php');
$msg = false;
$mssg = false;
$mag = false;
$serError = false;


if(isset($_POST['add_cott'])){

  $shayari_add = $_POST['shayari_add'];
  $data = "SELECT * FROM `shayari_code` WHERE shayari_name = '$shayari_add'";
  $result = mysqli_query($con,$data);
  $numrows = mysqli_num_rows($result);
  if($numrows>0){
    $serError = true;
  }else{
    $sql = "INSERT INTO `shayari_code` (`cid`, `shayari_name`) VALUES (NULL, '$shayari_add')";
    $result = mysqli_query($con,$sql);
      if($result){
          $mag = true;
      }

  }
}



if(isset($_POST['submits'])){
 
    $shayari_text = $_POST['sayari_text'];
    $shayari_id = $_POST['sayari_name'];
    $sql = "INSERT INTO `shayari_viwe` VALUES (NULL, '$shayari_text', '$shayari_id')";
    $result = mysqli_query($con,$sql);
    if($result){
        $msg = true;
    }else{
        $mssg = true;
    }

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
    <title>sayari post</title>
    <style>
        .box_botton{
            width: 100%;
            position: fixed;
            left: 0;
            bottom: 10px;
        }
        .box_botton .alert{
            width: 90%!important;
            margin: auto;
        }
        .add_Shayari{
          width:100%;
          height: 70px;
          background: #000;
          display: flex;
          align-items: center;
        }
      
    </style>
  </head>

  <body class="bg-light">
  <div class="add_Shayari">

  <div class="container">
    <button id="btn" class="btn btn-success"data-toggle="modal" data-target="#staticBackdrop">Add Sayari</button>
  </div>



</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Shayari title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST">
        <div class="form-group">
          <input type="text" class="form-control" required  autocomplete="off" name="shayari_add" id="exampleInput">
        </div>
        <button type="submit" name="add_cott" class="btn btn-primary">Create</button>
       </form>
      </div>
    </div>
  </div>
</div>


      <h1 class="text-center text-danger">You post all types of shayari</h1>
<div class="container">
<form class="needs-validation" novalidate method="POST" >
  <div class="form-row">
    <div class="col-md-12 col-lg-12 col-13 mb-3">
      <label for="validationCustom02">Choose Sayari</label>
      <select class="custom-select" id="validationCustom04" required name="sayari_name">
      <option selected disabled value="">Choose...</option>
<?php
// Choose query in php 
 $sql = "SELECT * FROM shayari_code";
 $result = mysqli_query($con,$sql);
 while($rows = mysqli_fetch_assoc($result)){
     ?>
      <option class="border border-warning" value="<?php echo $rows['cid'];?>" ><?php echo $rows['shayari_name'];?></option>
     <?php
 }

?>
 </select>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">You can write shayari here</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" id="exampleFormControlTextarea1" required name="sayari_text" ></textarea>
    <div class="valid-feedback">
        Looks good!
      </div>
  </div>
  <br>
  <button class="btn btn-primary" type="submit" name="submits">Post form</button>
</form>
</div>
<div class="box_botton">
    <?php

if($msg){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Successfully!</strong> record insert.
    <span aria-hidden="true"><a href="read.php" class="btn btn-success">Go it!</a></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
if($mssg){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> technical issue.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
if($mag){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Successfully!</strong> create table .
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if($serError){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> shayari already exists.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

?>
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