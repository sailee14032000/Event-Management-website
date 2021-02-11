<?php
include 'databaseconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Dosis&family=Josefin+Sans&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width,initial-scale=1.0">
   
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
			<li class="active"><a href="">Create Events</a></li>
			<li><a href="index.php#signup">Sign up/Login</a></li>
		</ul>
		<div id="clear"></div>
	</nav>
</header>

<div id="comapny-event-forms">
	<?php 
	if(isset($_SESSION['notice']))
	{
		?>
		<p class="notice" style="width:fit-content;position:relative; background: lightgreen;display: block;"><?php echo $_SESSION['notice'];?></p>
		<?php 
     $_SESSION['notice'] = '';
     
}?>
	<form action="event_accept.php" method="post" enctype="multipart/form-data">
	<div id="event-form" class="active">	
		<h3>Event Information</h3>
		<label for="event-name">Event Name</label>
		<p style="position: relative;"><input type="text" name="event-name">
		<input type="button" id="add_description" onclick="show_textarea()" value="+ Description">
	    </p>
		<div id="textarea" class="hide">
			<label for="event-description_t">Description</label>
		<textarea id="event-description_t" name="event-description"></textarea>
	    </div>

		<label for="event-location">Event Location</label>
		<input type="text" name="event-location">
		
		<label for="event-time">Starts at</label>
		<input type="time" id="event-time" name="event-time">
		<br>
		<label for="event-e-time">Ends at</label>
		<input type="time" id="event-e-time" name="event-e-time">
		<br>
		<label for="event-starting-date" style="display: inline;">Starting Date</label>
		<input type="date" name="event-starting-date">
		<br>
		<label for="event-end-date" style="display: inline;">Ending Date </label>
		<input type="date" name="event-end-date">
        <br>  
		<label>Only For</label>
		<select>
			<option>All age groups</option>
			<option>Only women</option>
			<option>Only men</option>
			<option>Only kids</option>
		</select>
        <br>
		<label for="event-price">Event Price</label>
		<input type="text" name="event-price" style="width: 30%;">
		<br>
		
		<label for="event-pic">Event Photo</label>
		<input type="file" name="image" multiple="false" accept="image/*">
        <br>
		
        <input type="button" name="" onclick="comapnyformactive()" value="Next">

	</div>
	<img id="spin2" src="assests/images/spin.png">

    
	<img id="cimage" src="assests/images/create_event.svg">
	<div id="company-form" class="hide">
		<h3>Organisation Information</h3>
		<label for="company-name">Company Name</label>
		<input type="text" name="company-name">

		<label for="mgr-name">Event Manager Name</label>
		<input type="text" name="mgr-name">

		<label for="mgr-phone">Contact details</label>
		<input type="tel" name="mgr-phone">
		<input type="tel" name="mgr-mail">

		<label for="company-social">Social Media Links</label>
		<input type="text"  name="facebook-social">
		<input type="text"  name="instagram-social">
	 
	    <input type="submit" name="">
    </div>

	</form>
	
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
<script type="text/javascript">
	  $(window).on("load",function(){
     $('#loader').fadeOut(3000);

     

    })
	  $('.toggle').click(function(){
                        $('.toggle').toggleClass('active');
                        $('#nav-links').toggleClass('active');
                    })
	function comapnyformactive(){
		$('#company-form').removeClass('hide');
		$('#cimage').css('display','none');
	}
	function show_textarea(e){
		$('#textarea').removeClass('hide');
		e.preventDefault();
	}
	

	
</script>
</body>

</html>