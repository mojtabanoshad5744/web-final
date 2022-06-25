<?php
    include 'config/db_connect.php';

    $sql = 'SELECT * FROM `save information`' ;

    $result = mysqli_query($conn,$sql);
    
    $informatios =mysqli_fetch_all($result,MYSQLI_ASSOC);

    mysqli_free_result($result);
    mysqli_close($conn);

    //print_r($informatios);
    ?>
<!DOCTYPE html>
<html lang="fa">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3"></script>
</head>
<body>
<nav  class="navbar navbar-dark bg-dark navbar-expand-lg bg-light ">
        <div class="container-fluid">
          <a class="navbar-brand"  href="#"  >ثبت افراد در همایش</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php"> Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" target="_blank" href="add.php"> فرم ثبت نام در همایش </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="#number">تماس با ما </a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder=" جست و جوی همایش " aria-label="Search">
              <button class="btn btn-outline-success" type="submit"> search </button>
            </form>
          </div>
        </div>
      </nav>
      <br/>
     
 <h4 class="center grey-text center"> saves</h4>
<div class="container">
<div class="row">
  <?php foreach ($informatios as $informatio){ ?>
    <div class="col s6 md3">
      <div class="card-z-depth-0 ">
        <div class="card-content center">
          <h6> <?php echo htmlspecialchars ($informatio['firstname']); ?></h6>
          <ul>
           <?php foreach (explode(',',$informatio['lastname']) as $ing ){  ?>
            <li> <?php echo htmlspecialchars ($ing); ?></li>
            <?php  } ?>
           </ul>
        </div>
        <div class="card-action right-align">
          <a class="brand-text" href="detail.php?id=<?php echo $informatio
          ['id'] ?>"> more information </a>
        </div>
      </div>
    </div>
    <?php  } ?>
</div>
</div>


</body>
</html>