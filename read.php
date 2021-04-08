<?php require_once('config.php');?>
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
    <title>sayari viwe</title>
    <style>
    .box_bottom{
            width: 90%!important;
            margin: auto;
            background: #000;
            color:#fff;
            padding: 10px;
            text-align: center;
            text-transform: capitalize;
        }
        #h2 {
          font-size: 1.5rem!important;
        }
      .table td, .table th {
    padding: 0.50rem!important;
    vertical-align: baseline!important;
    border-top: 1px solid #dee2e6!important;
    }
        
    </style>
  </head>
  <body class="bg-light">
<div class="container mt-3">
<form class="needs-validation" novalidate method="POST" >
  <div class="form-row">
    <div class="col-md-12 col-lg-12 col-13 mb-3">
      <label for="validationCustom02">Choose Sayari</label>
      <select class="custom-select" id="validationCustom04" required name="shayari_id">
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
  <button class="btn btn-primary" type="submit" name="submits" >Post form</button>
</form>
</div>
<div class="container my-3">
<?php 
if(isset($_POST['submits'])){
  echo '<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sno.</th>
      <th scope="col">Shayari Name</th>
      <th scope="col">Shayari</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>';

  $shayari_id = $_POST['shayari_id'];
  
    // SELECT * FROM shayari_viwe v INNER JOIN shayari_code c ON v.cid = c.cid WHERE v.cid= 2;
 $sql = "SELECT * FROM shayari_viwe v INNER JOIN shayari_code c ON v.cid = c.cid WHERE v.cid='$shayari_id'";
 $result = mysqli_query($con,$sql);
 $no=0;
 while($rows = mysqli_fetch_assoc($result)){
     $no=$no+1;
     ?>
     <tr>
      <th scope="row"><?php echo $no;?></th>
      <td><?php echo $rows['shayari_name'];?></td>
      <td><?php echo $rows['shayari'];?></td>
      <td><a href="edit.php?id=<?php echo $rows['id'];?>" class="btn btn-primary">Edit</a> <a href="delete.php?id=<?php echo $rows['id'];?>" class="btn btn-danger" >Delete</a></td>
 </tr>
     <?php


 }
echo '</tbody>
</table>';
}else{
  echo '<div class="box_bottom">
    <h2 id="h2">data not Found 😔</h2>
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