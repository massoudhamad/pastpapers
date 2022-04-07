<!DOCTYPE html>
<html lang="en">

 <head> 
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Examination Past Paper</title>
  <meta content="" name="description">
  <meta content="" name="keywords"> 

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/accordion.css" rel="stylesheet">
  </head>

<body>

  <!-- ======= Header ======= -->
<?php
require_once('header.php');
?> 
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <!-- <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      
    </div>
  </section> -->
  <!-- End Hero -->



<div class="container">
 


  <div class="col-md-6 col-sm-6">
    <h3><bold>STD FOUR EXAM PAST PAPERS</bold></h3>
    <div class="panel-group wrap" id="accordion" role="tablist" aria-multiselectable="true">

    <?php 
        include "../DB.php";
        $db=new DBHelper();
        $exam_subject= $db->getRows('exam_subject',array('where'=>array('exam_class_id'=>$_REQUEST['id'])));

        if(!empty($exam_subject))
         {
             ?>
             <?php 
             $count = 0; 
             foreach($exam_subject as $up)
             { 
               $count++;
               $id=$up['exam_subject_id'];
               $exam_subject=$up['exam_subject'];
        ?>

      <div class="panel">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <?php echo $exam_subject;?>
        </a>
      </h4>
        </div>
        <?php 
        $subject= $db->getRows('past_papers',array('where'=>array('subject_id'=>$id)));
        if(!empty($subject))
         {
             ?>
             <?php 
             $count = 0; 
             foreach($subject as $up)
             { 
               $count++;
               $id=$up['id'];
               $exam_year=$up['exam_year'];
               $attachment=$up['attachment'];
               /* $exam_subject=$up['exam_subject']; */
        ?>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
            <ul>
                <li><a href="http://127.0.0.1:9999/upload_doc/<?php echo $attachment;?>" class="glyphicon glyphicon-download-alt" target="_blank"><?php echo $exam_subject;?> <?php echo $exam_year;?></a></li>
            </ul>
           
          </div>
        </div>
        <?php 
        }
    }?>
      </div>
      <?php }
         }
      ?>
      <!-- end of panel -->

      <!-- <div class="panel">
        <div class="panel-heading" role="tab" id="headingTwo">
          <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          KISWAHILI
        </a>
      </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
          <div class="panel-body">
          <ul>
                <li>KISWAHILI 2017</li>
                <li>KISWAHILI 2018</li>
                <li>KISWAHILI 2019</li>
                <li>KISWAHILI 2020</li>
                <li>KISWAHILI 2021</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="panel">
        <div class="panel-heading" role="tab" id="headingThree">
          <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          SAYANSI
        </a>
      </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
          <div class="panel-body">
          <ul>
                <li>SAYANSI 2017</li>
                <li>SAYANSI 2018</li>
                <li>SAYANSI 2019</li>
                <li>SAYANSI 2020</li>
                <li>SAYANSI 2021</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="panel">
        <div class="panel-heading" role="tab" id="headingThree">
          <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          SCIENCE
        </a>
      </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
          <div class="panel-body">
          <ul>
                <li>SCIENCE 2017</li>
                <li>SCIENCE 2018</li>
                <li>SCIENCE 2019</li>
                <li>SCIENCE 2020</li>
                <li>SCIENCE 2021</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="panel">
        <div class="panel-heading" role="tab" id="headingThree">
          <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        HISABATI
        </a>
      </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
          <div class="panel-body">
          <ul>
                <li>HISABATI 2017</li>
                <li>HISABATI 2018</li>
                <li>HISABATI 2019</li>
                <li>HISABATI 2020</li>
                <li>HISABATI 2021</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="panel">
        <div class="panel-heading" role="tab" id="headingThree">
          <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        MATHEMATICS
        </a>
      </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
          <div class="panel-body">
          <ul>
                <li>MATHEMATICS 2017</li>
                <li>MATHEMATICS 2018</li>
                <li>MATHEMATICS 2019</li>
                <li>MATHEMATICS 2020</li>
                <li>MATHEMATICS 2021</li>
            </ul>
          </div>
        </div>
      </div> -->
      <!-- end of panel -->



        

    </div>
    <!-- end of #accordion -->

  </div>
  <!-- end of wrap -->

</div>
<!-- end of container -->
<!-- ======= Footer ======= -->
<?php

require_once('footer.php');
 ?>
  <!-- End Footer -->

    <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/accordion.js"></script>

</body>

</html>