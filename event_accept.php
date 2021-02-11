<?php
include 'databaseconnect.php';
if (isset($_POST['event-name']))
{
	$e_name = $_POST['event-name'];
	$e_location = $_POST['event-location'];
	$e_location = $_POST['event-location'];
	$e_time= $_POST['event-time'];
	$e_e_time= $_POST['event-e-time'];
	$e_s_date = $_POST['event-starting-date'];
	$e_e_date = $_POST['event-end-date'];
	$e_price= $_POST['event-price'];
	$e_description= $_POST['event-description'];
	$e_company_name= $_POST['company-name'];
	$e_mgr_name= $_POST['mgr-name'];
	$e_mgr_phone= $_POST['mgr-phone'];
	$e_mgr_mail= $_POST['mgr-mail'];
	$facebook_social= $_POST['facebook-social'];
	$instagram_social= $_POST['instagram-social'];
	
	$file_name = $_FILES["image"]["name"];
    $file_size = $_FILES["image"]["size"];
    $file_tmp = $_FILES["image"]["tmp_name"];
    $file_type = $_FILES["image"]["type"];
    move_uploaded_file($file_tmp , "assests/images/event_images/" . $file_name);
    $path = "/event_images/".$file_name;
    $qu = mysqli_query($conn,"SELECT * FROM event_requests");
    $row = mysqli_num_rows($qu);
    if($e_name!='')
    {	
	$q = mysqli_query($conn,"INSERT INTO event_requests(id,event_name,event_location,event_time,event_e_time,event_s_date,event_e_date,event_restriction,event_fare,event_photo,event_description,company_name,company_mgr_name,contact_detail_phone,contact_detail_mail,social_fb_link,social_insta_link) VALUES('','$e_name','$e_location','$e_time','$e_e_time','$e_s_date','$e_e_date','','$e_price','$path','$e_description','$e_company_name','$e_mgr_name','$e_mgr_phone','$e_mgr_mail','$facebook_social','$instagram_social')");
    }
	header('Location:create_event.php');
    $quer = mysqli_query($conn,"SELECT * FROM event_requests");
    $numrow = mysqli_num_rows($quer);
    if($numrow>$row){
    	$_SESSION['notice'] = "Event requent sent!";
    }
}?>