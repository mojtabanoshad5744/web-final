<?php
include 'config/db_connect.php';
if (isset($_GET['id'])) {
    # code...
    $id = mysqli_real_escape_string($conn,$_GET['id']);

    $sql = "SELECT * FROM `save information` WHERE id=$id ";

    $result = mysqli_query($conn,$sql);

    $informatio = mysqli_fetch_assoc($result);
    mysqli_free_result ($result);
    mYsqli_close($conn);

     //print_r($informatio);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="center">
    <h1 class="center "> detail information </h1>
    </div>

    <div class="container center"></div>
<?php if ($informatio) { ?>
<h4> 
  <?php echo $informatio['firstname']; ?> </h4>
  <P><?php  echo $informatio['lastname']; ?> </P>
  <P><?php echo $informatio['adres']; ?> </P>
  <P><?php echo $informatio['mobile']; ?> </P>
  <P><?php echo $informatio['numbersit']; ?> </P>
  <h5> <?php  echo $informatio['numberpost']; ?> </h5>
  <?php }else {
  ?> 
<h5> no include information not exites .</h5>
<?php } ?>
</body>
</html>