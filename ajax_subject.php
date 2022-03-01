<?php
include("DB.php");
$db=new DBHelper();
$examTypeID=$_POST['exam_type_id'];
if($examTypeID)
{
    $subject = $db->getRows('exam_subject', array('where' => array('exam_class_id' => $examTypeID), 'order_by' => 'exam_subject ASC'));
         if (!empty($subject)) {
             echo "<option value=''>Please Select Here</option>";
             foreach ($subject as $sub) {
                 $subjectName = $sub['exam_subject'];
                 $subjectCode = $sub['exam_subject_id'];
                 echo "<option value='$subjectCode'>$subjectName</option>";
             }
         }
         else 
         {
             echo "<option value=''>No Subject Found</option>";
         }

}
?>