<?php
session_start();
ini_set ('display_errors', 1);
error_reporting (E_ALL | E_STRICT); 
include 'DB.php';
$db = new DBHelper();
$tblName = 'past_papers';
if(isset($_REQUEST['action_type']) && !empty($_REQUEST['action_type']))
{
   /*  if($_REQUEST['action_type'] == 'add')
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
        else if(empty($imgFile)){
            $errMSG = "Please Select File.";
        }

        else
        {
            $upload_dir = 'upload_doc/'; // upload directory

            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

            $valid_extensions = array('pdf'); // valid extensions

            $userpic = rand(1000,1000000).".".$imgExt;

            if(in_array($imgExt, $valid_extensions)){
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
                $successMSG="succ";
                header("Location:index.php?msg=".$successMSG);
                header("refresh:5;index3.php?sp=document_upload"); // redirects image view page after 5 seconds.
            }
            else
            {
                header("Location:index.php?msg=".$errMSG);
            }
        }
        else {
            header("Location:index.php?msg=" . $errMSG);
        }
    }
     else   */
     
     if($_REQUEST['action_type'] == 'delete')
        {
            $condition = array('attachmentID' => $db->$_REQUEST['id']);
            $update = $db->delete($tblName,$condition);
            $statusMsg = true;
            header("Location:index.php?sz=attachment&msg=deleted");
        }
}

