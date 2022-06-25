<?php
  include 'config/db_connect.php';

  $firstname=$lastname=$addres=$mobile=$number=$numberpost='';

    $errors = array ('first-name'=>'','last-name'=>'','addres'=>'','mobile'=>'','number'=>'', 'number-post'=>'');
    
    if(isset($_POST['submit'])) {
        //validation first name
        if (empty($_POST['first-name'])) {
            # code...
            $errors['first-name'] ='first name required . <br>';
        }
        else {
          $firstname = $_POST['first-name'];
          if (!preg_match('/[a-zA-Z]+$/',$firstname)) { 
            $errors['first-name']= 'first name must be letters only. <br> ';
          }
        }
         //validation last name
        if (empty($_POST['last_name'])) {
            # code...
            $errors['last-name']= 'last name required . <br>';
        }
        else {
          $lastname = $_POST['last_name'];
          if (!preg_match('/^[a-zA-Z]+$/',$lastname)) { 
            $errors['last-name']='last name must be letters only. <br> ';
          }
        }
         //validation address
        if (empty($_POST['addres'])) {
            # code...
            $errors['addres']= 'addres required . <br>';
        }
        else {
            $addres = $_POST['addres'];
            if (!preg_match('/[a-zA-Z]+$/',$addres)) { 
              $errors['addres']= 'adres must be letters and spaces only. <br> ';
           }
        }
         //validation mobile
        if (empty($_POST['mobile'])) {
            # code...
            $errors['mobile']= 'mobile required . <br>';
        }
        else {
           $mobile = $_POST['mobile'];
           if (!preg_match('/^[0-9]+$/',$mobile)) { 
            $errors['mobile']='mobile be number only. <br> ';
         }
        }
        //validation number
        if (empty($_POST['number'])) {
            # code...
            $errors['number'] = 'number required . <br>';
        }
        else {
          $number = $_POST['number'];
          if (!preg_match('/^[0-9]+$/',$number)) { 
           $errors['number']='number be number only. <br> ';
        }
        }
        //validation number-post
        if (empty($_POST['number-post'])) {
            # code...
            $errors['number-post'] = 'number-post required . <br>';
        }
        else {
          $numberpost = $_POST['number-post'];
          if (!preg_match('/^[0-9]+$/',$numberpost)) { 
           $errors['number-post']='number-post be number only. <br> ';
        }
        }
      
    if (!array_filter($errors)) {
      $firstsave = mysqli_real_escape_string($conn,$_POST['first-name']);
      $lastsave = mysqli_real_escape_string($conn,$_POST['last-name']);
      $addressave = mysqli_real_escape_string($conn,$_POST['addres']);
      $mobilesave = mysqli_real_escape_string($conn,$_POST['mobile']);
      $numbersave = mysqli_real_escape_string($conn,$_POST['number']);
      $numberpostsave = mysqli_real_escape_string($conn,$_POST['number-post']);

      $sql = "INSERT INTO `save information`(`firstname`,`lastname`,`adres`,`mobile`,`numbersit`,`numberpost`)
       VALUES ('$firstsave','$lastsave','$addressave','$mobilesave','$numbersave','$numberpostsave')";
        
       if (mysqli_query($conn,$sql)) {
        # code...
        header('location:index.php');
       }
       else {
        # code...
        echo 'query error ' . mysqli_error($conn);
       }
      
    }
  }

?>


<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فرم ثبت نام همایش </title>
    <link rel="icon" type="image.png" href="https://hfile.myids.ir/files/formpanel/757D5F3F6201F659A8657B5A3A1BD62F.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3"></script>
    <style>
        form{
            max-width=460px;
            margin: 20px auto;
            padding: 20px;
        }
    </style>
</head>
<body  >
<nav  class="navbar navbar-dark bg-dark navbar-expand-lg bg-light ">
        <div class="container-fluid">
          <a class="navbar-brand"  href="#"  >ثبت افراد در همایش</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" target="_blank" href="#form"> فرم ثبت نام در همایش </a>
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
      <figure>
        <picture>
            <img src="image/form picture.jpg" />
        </picture>
      </figure>
<div class="py-5 text-center">
    <p  class = "mb-3" >
        لطفا برای شرکت در همایش این فرم را تکمیل کنید  .
        <br/>
        پس از ثبت نام، حتما بلیط را ذخیره کنید   .
        <br>
        
    </p>
    <p class="mb-3" >
      این فرم آنلاین برای ثبت اطلاعات یک  فرد همایش هست 
      <a href=""> this </a>
    </p>
  </div >
    <div class="width">
      <div class="main-content-wrapper form">
        <div class="form-header content mb-lg-0">
          <center>
          <h2 style="color: rgb(128, 9, 0);font-size: 45px;"> فرم ثبت نام همایش</h2>
          </center> 
        </div>
      </div>
    </div>
    <hr class="my-4">
    <section class="container grey-text">
<div class="col-md-8 col-log-8 mb-2 ">
            <form style="color: rgb(0, 26, 255);"  id="form" class="row g-3 mb-3 text-center " method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <div class="col-md-6">
                    <label>
                        نام  
                        <span>*</span>
                    </label>
                    <input name="first-name" type="text" placeholder="به فارسی وارد کنید" value="<?php echo htmlspecialchars($firstname); ?>">
                    <div class="red-text"><?php echo $errors['first-name'] ?></div>
                </div>
                <div class="col-md-6">
                    <label>
                        نام خانوادگی 
                        <span>*</span>
                    </label>
                    <input  name="last_name" type="text" placeholder="به فارسی وارد کنید"  value="<?php echo htmlspecialchars($lastname); ?>">
                    <div class="red-text"><?php echo $errors['last-name'] ?></div>
                </div>
                <hr class="my-4">
            <div class="form-check" >
                <input class="form-check-input  bg-danger " type="radio"  id="same-address" checked  >
                <label class="form-check-label " for="same-address">
                  مرد</label>
            </div>
              <div class="form-check" >
                <input class="form-check-input bg-danger " type="radio" id="save-input"   >
                <label class="form-check-label " for="save-input">
                  زن
                </label>
              </div>
              <hr class="my-4">
                <div class="col-12">
                    <label>
                        آدرس 
                        <span>*</span>
                    </label>
                    <input  name="addres" type="text" placeholder=" .آدرس حود را وارد کنید" value="<?php echo htmlspecialchars($addres); ?>" >
                    <div class="red-text"><?php echo $errors['addres'] ?></div>
                </div>
                <div class="col-12">
                    <label>
                        موبایل 
                        <span>*</span>
                    </label>
                    <input  name="mobile" type="" placeholder="09..........." value="<?php  echo htmlspecialchars($mobile); ?>" >
                    <div class="red-text"><?php echo $errors['mobile'] ?></div>
                </div>
                <div class="col-md-6">
                    <label>
                        شماره صندلی
                        <span>*</span>
                    </label>
                    <input  name="number" type="" placeholder=" از 1 تا 400" value="<?php  echo htmlspecialchars($number); ?>"  >
                </div>
                <div class="col-md-6">
                    <label>
                        کد پستی 
                        <span>*</span>
                    </label>
                    <input  name="number-post" type="" placeholder="کد پستی خود را وارد کنید " value="<?php  echo htmlspecialchars($numberpost); ?>" >
                </div>
                <strong style="font-size: large; text-align: right;">ثبت‌ نام رایگان است.</strong>
           
</section>
            <div class="form-input text-center">
              <input type="submit" name="submit" value="ارسال"  class="form-submit-button btn btn-brand btn-primary">
              <input type="submit" name="" value="پاک کردن فرم "  class=" " href="index.php">
            </div>
        </div>
        </form>
        <hr class="my-4">
        <br>
        <br>
        <br>
<div >
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label mb-3"> انتقاد و پیشنهاد در مورد سایت . </label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
      </div>
    </div>
    <div class="form-input text-center ">
      <form>
      <input type="submit" name="submit" value="ارسال انتقاد و پیشنهاد"  class="form-submit-button btn btn-black bg-danger" href="detail.php">
      </form>
    </div>
    <br>
    <br>
    <footer class="text-center bg-secondary">
      <p class="mb-1" lang="en">mojtaba noshad</p>
      <p class="mb-1" lang="fa"> در صورت بروز مشکل با این <a href="#number"> شماره </a> تماس بگیرید . </p>
    <div class="mb-3">
         <div class="number-phone" id="number">
             <a >
                <span>09359175744</span>
             </a>
            <i class="mdi mdi-phone"></i>
         </div>
     </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

