<?php 
include 'databaseconnect.php';
if(isset($_POST['id']) or  $_POST['tname'] or isset($_POST['todo']))
{
	$id = $_POST['id'];
	$tname = $_POST['tname'];
    if($_POST['todo']=="insert")
    {	
	
    $q = mysqli_query($conn,"SELECT * FROM event_requests WHERE id = '$id'");
    $row = mysqli_num_rows($q);

    if ($row>0)
    {
    	
    	while($ro = mysqli_fetch_assoc($q))
    	{
    		$event_name = $ro["event_name"];
    		$event_description = $ro["event_description"];
    		$event_category = $ro["event_category"];
    		$event_location = $ro["event_location"];
    		$event_photo = $ro["event_photo"];
    		$company_mgr_name = $ro["company_mgr_name"];
    		$event_fare = $ro["event_fare"];
    		$event_time = $ro["event_time"];
    		$event_days = $ro["event_days"];
    		$que = mysqli_query($conn,"INSERT INTO events(id,event_name,event_description,event_category,event_location,event_gallery,event_mgr_name,event_fare,event_time,event_days) VALUES('','$event_name','$event_description','$event_category','$event_location','$event_photo','$company_mgr_name','$event_fare','$event_time','$event_days')");
    		
    	}
    	$que = mysqli_query($conn,"DELETE FROM event_requests WHERE id = '$id'");
    
    }
   }
   else if($_POST['todo']=="delete" and $_POST['tname']=="event_requests"){
   	$que = mysqli_query($conn,"DELETE FROM event_requests WHERE id = '$id'");
    

   }
   else if($_POST['todo']=="delete" and $_POST['tname']=="events"){
   	$que = mysqli_query($conn,"DELETE FROM events WHERE id = '$id'");
    

   }
   ?>

   <img id="dots" src="assests/images/dots1.png">
            	<img id="dots1" src="assests/images/dots1.png">
            	<?php
            	$q_ = mysqli_query($conn,"SELECT * FROM event_requests");
            	$roww = mysqli_num_rows($q_);
            	?>
            	<div style="display: flex;justify-content: unset;width: 80%;">
            		<button onclick="show_section('#requested_events','#existing_events')">New Event Requests 
            			<?php if ($roww!=0) {?>
            				<span style="background: lightgreen;
    padding: 0 0.4em;
    border-radius: 50%;color:black;font-weight: 800;margin:0 0.4em;">
            					<?php  echo $roww;?>
            						
            					</span>
            				<?php 
            			}
            				?>
            				</button>
            		<button onclick="show_section('#existing_events','#requested_events')">Existing Events</button>
            	</div>

            	<div id="requested_events" class="events_dashboard hide">
            	<p class="notice"></p>
            		<?php
            	
            	if($roww>0)
            	{
            		$k = 0;
            		while($row1 = mysqli_fetch_assoc($q_))
            		{
            			?>
            			<div class="existing_events_name" >
            				<div class="name_buttons_events">
            				<p >
            					<img src="assests/images/svg/color-circles.svg" style="width: 16px;margin-right: 0.2em;" /><?php echo $row1['event_name'];?></p>
            				<p class="buttons_events_list">
            					<span>

            					<img class="downarrow" src="assests/images/svg/down.svg" onclick="display_description('<?php echo($k); ?>','#requested_events .existing_events_name .event_details_info')" style="cursor: pointer; margin:0.5em;width: 20px;"/>
            				</span>
            				<span class="accepticon" onclick="event_accept('<?php echo $row1['id'];?>','insert','event_requests','#requested_events')">
            					<img src="assests/images/svg/checked.svg" style="width: 20px;cursor: pointer; margin: 0.5em 0.4em 0.5em 0;"/>Accept
            				</span>
            					<span class="deleteicon" onclick="event_accept('<?php echo $row1['id'];?>','delete','event_requests','#requested_events')"><img src="assests/images/svg/cross.svg" style="width: 20px;cursor: pointer; margin: 0.5em 0.4em 0.5em 0;"/>Delete</span>
            				</p>
            				</div>
            				<div class="event_details_info hide">
            				<p>
            					<?php echo substr($row1['event_description'],0,700) . "...";?>
            				</p>
            				<p>
            					<img src="assests/images/svg/location.svg" class="icons">
            					<?php echo $row1['event_location'];?>
            				</p>
            				<p><img src="assests/images/svg/money.svg" class="icons">
            					<?php echo $row1['event_fare'];?>
            				</p>
            				<p>
            					<img src="assests/images/svg/clock.svg" class="icons">
            					<?php echo $row1['event_time'];?>
            				</p>
            			</div>
            			</div>
            			<?php
            			$k = $k +1;
            		}
            	}
            	else
            	{
            		?>
            		<p>No new requests!!</p>
            		<?php
            	}


            	?>

            	</div>
            	<div id="existing_events" class="events_dashboard hide">
            	<p class="notice"></p>
            	
            	<?php

            	$q = mysqli_query($conn,"SELECT * FROM events");
            	$ro = mysqli_num_rows($q);
            	if($ro>0)
            	{
            		$t = 0;
            		while($row = mysqli_fetch_assoc($q))
            		{
            			?>
            			<div class="existing_events_name" >
            				<div class="name_buttons_events">
            				<p style="width: 90%;"><img src="assests/images/svg/color-circles.svg" style="width: 16px;margin-right: 0.2em;" /><?php echo $row['event_name'];?></p>
            				<p class="buttons_events_list">
            					<span>
            					<img class="downarrow" src="assests/images/svg/down.svg" onclick="display_description('<?php echo($t); ?>','#existing_events .existing_events_name .event_details_info','#existing_events')" style="cursor: pointer; margin:0.5em;width: 20px;">
            				</span>
            					<span class="deleteicon" onclick="event_accept('<?php echo $row['id'];?>','delete','events','#existing_events')"><img class="deleteiconimg" src="assests/images/svg/cross.svg"/>Delete</span>
            				</p>
            				</div>
            				<div class="event_details_info hide">
            				<p>
            					<?php echo substr($row['event_description'],0,700) . "...";?>
            				</p>
            				<p>
            					<img src="assests/images/svg/location.svg" class="icons">
            					<?php echo $row['event_location'];?>
            				</p>
            				<p><img src="assests/images/svg/money.svg" class="icons">
            					<?php echo $row['event_fare'];?>
            				</p>
            				<p>
            					<img src="assests/images/svg/clock.svg" class="icons">
            					<?php echo $row['event_time'];?>
            				</p>
            			</div>
            			</div>
            			<?php
            			$t = $t +1;
            		}
            	}



            	
            	
}
/*$que = mysqli_query($conn,'INSERT INTO events (event_name,event_description,event_category,event_location,event_gallery,event_mgr_name,event_mgr_contact,event_fare,event_time,event_days) VALUES($ro["event_name"],$ro["event_description"],$ro["event_category"],$ro["event_location"],$ro["event_photo"],$ro["company_mgr_name"],$ro["company_detail_phone"],$ro["event_fare"],$ro["event_time"],$ro["event_days"])');*/
?>