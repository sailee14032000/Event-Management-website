<?php
include 'databaseconnect.php';
if(isset($_POST['event_name']) || isset($_POST['event_date']) || isset($_POST['event_location']) || isset($_POST['event_category']))
{
	$e_name = $_POST['event_name'];
	$e_location = $_POST['event_location'];
	$e_date = $_POST['event_date'];
	$e_category = $_POST['event_category'];
	$q = mysqli_query($conn,"SELECT * FROM events WHERE event_name LIKE '%$e_name%' or event_location LIKE '%$e_location%' or event_category='$e_category'");
	$rows = mysqli_num_rows($q);
	?>
    <div id="events-list">
    	<?php 
    	if($rows>0)
    	{
    		while($row = mysqli_fetch_assoc($q))
    		{
    		  ?>
    		  <div class="events">
    		  	<div class="event-photo">
    		  		<img src="assests/images/<?php echo $row['event_gallery']?>"/>
    		  	</div>
    		  	<div class="event-description">
    		  		<div class="event-name" onclick="display_events('<?php echo $row['id']?>')">
    		  			<?php echo $row['event_name'];?>
    		  		</div>
    		  		<div class="event-description-para">
    		  			<?php echo substr($row['event_description'],0,700) . "...";?>
    		  		</div>
    		  		<div class="event-info">
    		  			<div class="event-location">
    		  				<img src="assests/images/svg/location.svg" class="icons">
    		  				<?php echo $row['event_location'];?>
    		  			</div>
    		  			<div class="event-price">
    		  				<img src="assests/images/svg/money.svg" class="icons">
    		  				<?php echo $row['event_fare'];?>
    		  			</div>
    		  			<div class="event-time">
    		  				<img src="assests/images/svg/clock.svg" class="icons">
    		  				<?php echo $row['event_time'];?>
    		  			</div>
    		  		</div>
    		  		<?php 
    		  			 $categories = explode(",",$row['event_category']);
    		  			 for ($i=0;$i<count($categories);$i++)
    		  			 {

    		  			?>
    		  		<div class="event-category">
    		  			<?php echo $categories[$i];?>
    		  		</div>
    		  		<?php
    		  	    }

    		  		?>
    		  	</div>
    		  </div>
    		  <?php	
    		}
    	}
    	?>
    </div>
<?php
}
else{
	echo "not found";
}
?>
