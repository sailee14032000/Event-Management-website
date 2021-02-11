<?php
include 'databaseconnect.php';
$event_id = $_SESSION['id'];

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Dosis&family=Josefin+Sans&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width,inital-scale=1.0">
</head>

<body>

<div id="loader">
    <img src="assests/images/loader.gif">
    <p class="heading">Loading...</p>
</div>    
<header>
     <div id="logo">
         <img src="assests/images/1.png">
       <span style="font-size: 1.5em;letter-spacing: 0.2em;font-family: 'Dosis', sans-serif;">MERAKI</span>
   
    </div>    
    <div class="toggle"></div> 

        <nav id="nav-links">
        
        <ul id="navigation-links">
          <li ><a href="index.php" >Events</a></li>
            <li><a href="create_event.php">Create Events</a></li>
            <li><a href="index.php#signup">Sign up/Login</a></li>
        </ul>
        <div id="clear"></div>
    </nav>
</header>
<div id="event-page">
	<?php
	   $query = mysqli_query($conn,"SELECT * FROM events where id='$event_id'");
	   $rows = mysqli_num_rows($query);
	
	if($rows>0)
	{
		while($row = mysqli_fetch_assoc($query))
		{
         ?>
	<div id="event-page-description">
			<div id="event-page-image"><img src="assests/images/<?php echo $row['event_gallery']?>"/></div>
			<div id="event-page-name"><?php echo $row['event_name'];?></div>
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
    		  			<div class="event-mgr">
    		  				<img src="assests/images/svg/user.svg" class="icons">
    		  				<?php echo $row['event_mgr_name'];?>
    		  			</div>

    		  		</div>
    		 <button id="buynow">Buy Now</button> 

			<div id="event-page-description-about"><h3>About Event</h3><?php echo $row['event_description'];?></div>
    </div>
    <div id="event-page-category-tags"><h3>Category</h3><br>
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
     }
	}

	?>
</div>
</div>


<footer>
    <div class="footerdivs">
        <div>
            <h3>Meraki</h3>
            <p>Meraki is a global self-service ticketing platform for live experiences that allows anyone to create, share, find and attend events that fuel their passions and enrich their lives. From music festivals, marathons, conferences, community rallies, and fundraisers, to gaming competitions and air guitar contests. Our mission is to bring the world together through live experiences.</p>
        </div>
        <div id="useful_links">
            <aside><h3>Useful Links</h3>
            <ul>
                <li><a href="">HOME</a></li>
                <li><a href="">ABOUT US</a></li>
                <li><a href="">EVENTS</a></li>
                <li><a href="">CREATE EVENT</a></li>
                <li><a href="">SIGN IN/LOG IN</a></li>
                <li><a href="">CONTACT US</a></li>
            </ul>
        </aside>
             <aside>
            <h3>Follow Us</h3>
            <ul>
                <li><i class="fa fa-facebook"></i></li>
                <li><i class="fa fa-twitter"></i></li>
                <li><i class="fa fa-instagram"></i></li>
                <li><i class="fa fa-google"></i></li>
            </ul>
        </aside>
        </div>
        <div>
            <h3>Contact Us</h3>
            <ul>
                <li><i class="fa fa-calendar"></i>Mon - Fri: 09:00 - 18:00</li>
                <li><i class="fa fa-phone"></i>+1234567890</li>
                <li><i class="fa fa-envelope"></i>support@meraki.com</li>
                <li><i class="fa fa-map-marker"></i>13005 Greenville AvenueTX</li>
            </ul>
           
        </div>
        
    </div>
    <div class="footerdivs" style="padding: 0.5em 2em;justify-content: center;align-items: center;background: rgba(0,0,0,0.3);
   ">© Copyright 2020 All Rights Reserved by Meraki</div>
</footer>
<script>
     $(window).on("load",function(){
     $('#loader').fadeOut(3000);

     

    })

    $('#buynow').on("click",function(){
        var event_name = $('#event-page-name').text();
        var event_location = $.trim($('.event-location').text());
        var event_time = $.trim($('.event-time').text());
        var event_price = $.trim($('.event-price').text());
        $.ajax({
            url:"event_buy.php",
            type:"POST",
            data:{event_name:event_name,event_location:event_location,event_time:event_time,event_price:event_price},
             beforeSend: function(){
                $("<span id='Processing_Req'><img src='assests/images/loader.gif' style='width:20px;height:20px;margin-right:0.2em;'>Processing request</span>").insertAfter($('#buynow'));
            },
    complete: function(){
        $('#Processing_Req').hide();
    },
            success:function(data){
             alert(data);


            }



        })

    })
     $('.toggle').click(function(){
                        $('.toggle').toggleClass('active');
                        $('#nav-links').toggleClass('active');
                    })
</script>
</body>
</html>