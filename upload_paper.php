<?php        
error_reporting (E_ALL | E_STRICT); 
include 'DB.php';
$db = new DBHelper();
$tblName = 'past_papers';
if(isset($_POST['doSubmit']))
{
        $exam_type_name = $_POST['exam_type_name'];// 
        $subject_id=$_POST['subject_id'];
        $exam_year=$_POST['exam_year'];

        $imgFile = $_FILES['pdf_file']['name'];
        $tmp_dir = $_FILES['pdf_file']['tmp_name'];
        $imgSize = $_FILES['pdf_file']['size'];


       /*  if(empty($documentType)){
            $errMSG = "Please Select Document Type.";
        }
        else */ if(empty($imgFile)){
            $errMSG = "Please Select File.";
        }

        else
        {
            $upload_dir = 'upload_doc/'; // upload directory

            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

            // valid image extensions
            $valid_extensions = array('pdf'); // valid extensions

            // rename uploading image
            $userpic = rand(1000,1000000).".".$imgExt;

            // allow valid image file formats
            if(in_array($imgExt, $valid_extensions)){
                // Check file size '5MB'
                if($imgSize < 5000000){
                    move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                }
                else{
                    $errMSG = "Sorry, your file is too large.";
                }
            }
            else{
                $errMSG = "Sorry, only pdf,jpg and png files are allowed.";
            }
        }

        $status=false;
        // if no error occured, continue ....
        if(!isset($errMSG))
        {

            $documentData=array(
                'exam_type_code'=>$exam_type_name,
                'subject_id'=>$subject_id,
                'exam_year'=>$exam_year,
                'attachment'=>$userpic
            );
            $insert=$db->insert($tblName,$documentData);
            $status=true;
            if($status)
            {
                $successMSG = "new record succesfully inserted ...";
                //$successMSG="succ";
               // header("Location:index.php?msg=".$successMSG);
                //header("refresh:5;index3.php?sp=document_upload"); // redirects image view page after 5 seconds.
            }
            else
            {
                //header("Location:index.php?msg=".$errMSG);
                $errMSG = "error while inserting....";
            }
        }
        else {
            header("Location:index.php?msg=" . $errMSG);
        }
    }
    ?>

<script src="js/jquery-1.4.2.min.js"></script>
<script>
    $(document).ready(function()
    {
        $("#exam_type_id").change(function()
        {
            var exam_type_id=$(this).val();
            var dataString = 'exam_type_id='+ exam_type_id;
            $('#myPleaseWait').modal('show');
            $.ajax
            ({
                type: "POST",
                url: "ajax_subject.php",
                data: dataString,
                cache: false,
               /* beforeSend: function () {
                    $('#programmeID').html('<img src="../assets/img/loader.gif" alt="" >');
                },*/
                success: function(html)
                {
                    $('#myPleaseWait').modal('hide');
                    $("#subject_id").html(html);
                }
            });

        });

    });
    </script>



            <div class="col-md-8">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="pull-left"><strong>Upload Examination Paper</strong></div>

                <?php
                if(isset($errMSG)){
                    ?>
                          <div class="alert alert-danger">
                            <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
                          </div>
                          <?php
                }
                else if(isset($successMSG)){
                  ?>
                      <div class="alert alert-success">
                            <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
                      </div>
                      <?php
                }
                ?>   

                
              </div>
              <form name="" id="" class="horizontal" method="post" enctype="multipart/form-data" action="">
              <div class="panel-body">
                <div class="padd">
                  <div class="form quick-post">
                  <div class="row">

                  <div class="col-lg-6">
                      <div class="form-group">
                        <label for="exam type">Exam Classes</label>                  
                  <select name="exam_type_name" id="exam_type_id" class="form-control select2" required>
                       <?php
                               $examClasses = $db->getRows('exam_classes',array('order_by'=>'exam_class_id ASC'));
                               if(!empty($examClasses)){ 
                                echo"<option value=''>Please Select Here</option>";
                                foreach($examClasses as $year){
                                $exam_class=$year['exam_class'];
                                $exam_classes_id=$year['exam_class_id'];
                               ?>
                               <option value="<?php echo $exam_classes_id;?>"><?php echo $exam_class;?></option>
                               <?php }}
           ?>
                                          
                    </select>
                  </div>
                  </div>

                  <div class="col-lg-6">

                          <label for="exam Class">Subject Name</label>
                          <select name="subject_id" id="subject_id" class="form-control select2" required>
                       <option value="">Select Subject</option>
                       
                    </select>
                      </div>
                  </div>

     <div class="row">                 
                  <div class="col-lg-6">
                 
                        <label for="examYear">Exam Year</label>
                       
                          <select name="exam_year" class="form-control" required>
                            <?php
                            for($i=2010;$i<=date('Y');$i++)
                            {
                              echo "<option value='$i'>$i</option>";
                            }
                            ?>
        </select>
                        
                     </div>
                 

                     <div class="col-lg-6"> <br>
                        <label for="Attachment">Attachment</label>
                          <input type='file' name="pdf_file" accept=".pdf" />
                      </div>
                      </div>

                      <div class="form-group">
                        <div class="col-lg-9"></div>
                                <div class="col-lg-3">
                                <label for=""></label>
                                <input type="hidden" name="action_type" value="add"/>
                                <input type="submit" name="doSubmit" value="Upload File" class="btn btn-primary form-control" /></div>
                                </div>
                      </div>
                    </form>
                  </div>
                </div>

    
<br>
<div class="row">
  <hr>
</div>


<div class="row">
                    <table class="table datatable"  cellspacing="0" width="100%">
                      <thead>
                      <tr>
                        <th>No.</th>
                        <th>Class</th>
                        <th>Subject</th>
                        <th>Year</th>
                        <th>Document</th>
                        <th>Action</th>
                         </tr>
                      </thead>
                      <tbody>
                      <?php
               $db=new DBHelper();
               $upload= $db->getRows('past_papers',array(' order_by'=>' exam_year ASC'));
    
               if(!empty($upload))
                {
                    ?>
                    <?php 
                    $count = 0; 
                    foreach($upload as $up)
                    { 
                      $count++;
                      $id=$up['id'];
                      $subject_id=$up['subject_id'];
                      $exam_type_code=$up['exam_type_code'];
                      $examYear=$up['exam_year'];
                      $attachment=$up['attachment'];

                      $subjectName=$db->getData("exam_subject","exam_subject","exam_subject_id",$subject_id);

                      $exam_class=$db->getData("exam_classes","exam_class","exam_class_id",$exam_type_code);
                       

                          ?>
                          <tr>
                          <td><?php echo $count;?></td>
                          <td><?php echo $exam_class;?></td>
                          <td><?php echo $subjectName;?></td>
                          <td><?php echo $examYear;?></td>
                          <td><a href="upload_doc/<?php echo $attachment;?>" class="glyphicon glyphicon-download-alt" target="_blank">Download</a></td>
                          <td><a href="action_upload_document.php?action_type=delete&id=<?php echo $uploadID; ?>&yearID=<?php echo $academicYearID;?>"
                                class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this Semester Setting?');">Drop</a></td>
                          </tr>
                          <?php 
                        
                    }
                    ?>
                    </tbody>
                    </table>
                    
                    <?php 
                }
             ?>
        </div> 
          
       

       </section>
      
           

  <!-- container section start -->

  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <script src="js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

</body>

</html>
