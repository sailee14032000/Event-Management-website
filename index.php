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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dosis&family=Josefin+Sans&display=swap" rel="stylesheet">

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
   
</head>
<body >
<div id="loader">
    <img src="assests/images/loader.gif">
    <p class="heading">Loading...</p>
</div>    
<header>
     <div id="logo">
         <img src="assests/images/1.png">
        <!--<img src="assests/images/2.png">-->
        <span style="font-size: 1.5em;letter-spacing: 0.2em; font-family: 'Dosis', sans-serif;">MERAKI</span>
    </div>    
    <div class="toggle"></div> 

        <nav id="nav-links">
        
		<ul id="navigation-links">
          <li class="active"><a href="" >Events</a></li>
			<li><a href="create_event.php">Create Events</a></li>
			<li><a href="index.php#signup">Sign up/Login</a></li>
		</ul>
		<div id="clear"></div>
	</nav>
</header>
<div style="overflow-x: hidden;">
<div id="home-gallery">
	<div id="home-gallery-image">
     
        <div class="mySlides fade">
          <img src="assests/images/createevent4.jpg" style="width:100%;vertical-align: middle;">
        </div>

        <div class="mySlides fade">
          <img src="assests/images/createevent2.jpg" style="width:100%;vertical-align: middle;">
        </div>

        <div class="mySlides fade">
          <img src="assests/images/createevent3.jpg" style="width:100%;vertical-align: middle;">
        </div>

    </div>
	<div id="home-gallery-event-search-options">
	<div>
		<form id="search-event-form" name="event_form" action="event_search.php" method="POST">
			<input type="text" id="event_name" name="event_name" placeholder="Enter event name">
			<?php
             $qu = mysqli_query($conn,"SELECT event_category from events GROUP BY event_category");
             $num_r = mysqli_num_rows($qu); 
            ?>
            <select name="event_category">
                <option>All Categories</option>
                <?php 
                if($num_r>0)
                {
                 while($ro_c = mysqli_fetch_assoc($qu))
                    {
                        ?>
				
				<option><?php echo $ro_c['event_category'];?></option>
				<?php
            }
        }
            ?>
			</select>
			<input type="text" name="event_location" placeholder="Enter location">
			<input type="date" name="event_date">
			<p id="submit-button"><input type="submit" name="submit_form" id="search-event-submit">
            <i style="cursor: pointer;" class="fa fa-search" aria-hidden="true"></i></p>
		</form>
		<div>
			<p class="event-category">Popular Events</p>
		    <p class="event-category">Latest Events</p>
		</div>
	</div>
	</div>
</div>
<div id="display-events">
    <p id="querry">
	<?php
	   $query = mysqli_query($conn,"SELECT id,event_time,event_gallery,event_name,event_description,event_fare,event_category,event_location FROM events ORDER BY id desc");
	   $rows = mysqli_num_rows($query);
	?>
</p>
    <div id="events-list">
    	<?php 
    	if($rows>0)
    	{
    		while($row = mysqli_fetch_assoc($query))
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
</div>
<div id="our_features" style="position: relative;margin: 2em 0;">
    <img id="spin" src="assests/images/spin.png">
     <img id="spin2" src="assests/images/spin.png">
    <div id="grid-container">

        <div class="grid-item"><div class="grid-section"><p class="heading">Great Speakers</p><p class="img"><img src="assests/images/svg/mike.svg"></p><p>Looking for a celebrity,motivational speaker, influencer, storyteller, or keynote speaker? Meraki will help you.</p></div></div>
        <div class="grid-item" style="position: relative;
    box-shadow: none;
    margin: 0 1%; 
    background: none;
    padding-bottom: 0;"><div class="grid-section" style="display: flex;justify-content: center;align-items: center;font-weight: 900;font-size: 2em;"><p class="heading mob" style="position: absolute;
    bottom: 0;">Our</p><p></p></div></div>
        <div class="grid-item"><div class="grid-section"><p class="heading">Networking</p><p class="img"><img src="assests/images/svg/network.svg"></p><p>With countless types of business networking mixers, industry meetups, and professional conferences increase your network!</p></div></div>
        <div class="grid-item"><div class="grid-section"><p class="heading">Party</p><p class="img"><img src="assests/images/svg/party.svg"></p><p>Put your party experience to good use by planning, designing and throwing events for private and corporate clients.</p></div></div>
        <div class="grid-item" style="position: relative;
    box-shadow: none;
    margin: 0 1%;
    background: none;
    padding-bottom: 0;"><div class="grid-section" style="display: flex;justify-content: center;align-items: center;font-weight: 900;font-size: 2em;"><p class="heading mob">Features</p><p></p></div></div>
        <div class="grid-item"><div class="grid-section"><p class="heading">New People</p><p class="img"><img src="assests/images/svg/users.svg"></p> <p>
            Strike up conversations with other members or create your own group and meet people near you who share your interests.
        </p></div></div>
    </div>
</div>

<div id="why-us">
    <img id="dots" src="assests/images/dots1.png">
    <img id="dots1" src="assests/images/dots1.png">
    <div class="left-half"><p class="heading">Join us</p><p style="font-size: 40px; font-weight: 600;">Why Choose <span class="heading">Meraki?</span></p>
        <p>
            <p style="padding: 1em 0 1em 0;
    color: #353535;text-align: justify;">Meraki is a global self-service ticketing platform for live experiences that allows anyone to create, share, find and attend events that fuel their passions and enrich their lives. From music festivals, marathons, conferences, community rallies, and fundraisers, to gaming competitions and air guitar contests. Our mission is to bring the world together through live experiences.</p>
            <ul class="whyus_ul">
            <li>Create Free Events</li>
            <li>Live experiences in 180 countries in 2019</li>
            <li>Powered 4.7M events in 2019</li>
            <li>Served more than 949K event creators in 2019</li>

        </ul></p></div>
    <img id="service" src="assests/images/service2.png">
   
</div>
<div id="signup_login_contact_us">
    <img id="spin3" src="assests/images/circle-line.png">
    <img id="spin4" src="assests/images/circle.png">
<div id="signup_login">
    <img src="assests/images/signup.jpg">
    <form id="signup" class="enable" action="newuser.php" method="post">
        <h3>SIGN IN</h3>
        <label for="username">Username</label>
        <input type="text" name="username" id="signup_name">
        <label for="email">Email</label>
        <input type="email" name="email" id="signup_email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="button" name="" id="register-link" onclick="opacitychange('login','signup')" value="Already a member? Login here">
        <p class="notice" style="left:unset;top:unset; position: relative;animation:none;"></p>
    
        <input type="submit" name="Sign up">
 
    </form>
    <form id="login"  action="user.php" method="post">
        <h3>LOG IN</h3>
        <label for="username">Username</label>
        <input type="text" name="username" id="login_name">
        <label for="password">Password</label>
        <input type="password" name="password" id="l_password">
        <input type="button" name="" id="signup-link" onclick="opacitychange('signup','login')" value="New member? Sign up here">
        <p class="notice" style="left:unset;top:unset; position: relative;animation:none;"></p>
    
        <input type="submit" name="Login" >
        </form>
</div>
<div id="contact_us">
    <img src="assests/images/contact_us.jpg">
   <form id="contact_us_form" action="mail.php" method="post">
    <h3>CONTACT US</h3>
    <label for="emailc">Email</label>
    <input type="email" name="emailc">
    <label for="usernamec">Name</label>
    <input type="text" name="usernamec">
    <label for="message">Message</label>
    <textarea name="messsage" id="messsage"></textarea>
    <p class="notice" style="left:unset;top:unset; position: relative;animation:none;"></p>
    <input type="submit" name="submit">
   </form>
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
                <li><a href="#why-us">ABOUT US</a></li>
                <li><a href="#events-list">EVENTS</a></li>
                <li><a href="create_event.php">CREATE EVENT</a></li>
                <li><a href="#signup_login">SIGN IN/LOG IN</a></li>
                <li><a href="#contact_us">CONTACT US</a></li>
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
     
    function opacitychange(formid,formid2){
        $('#'+formid).addClass('enable');
        $('#'+formid2).removeClass('enable');

    }
</script>
</div>
<script type="text/javascript">

      $(function() {
     $( "#event_name").autocomplete({
       source: 'event-name-search.php',
     });
  });

    var slideIndex = 0;
    showSlides();

        function showSlides() {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }
          slideIndex++;
          if (slideIndex > slides.length) {slideIndex = 1}    
          slides[slideIndex-1].style.display = "block";  
          setTimeout(showSlides, 2000); 
}
    $('#contact_us_form').on("submit",function(e){
        var data_form = $(this).serializeArray();
        
        $.ajax({
            url:'mail.php',
            type:"POST",
            data:data_form,
              beforeSend: function(){
                $("<p id='Processing_Req'><img src='assests/images/loader.gif' style='width:20px;height:20px;margin-right:0.2em;'>Processing request</p>").insertAfter($('#contact_us_form .notice'));
            },
    complete: function(){
        $('#Processing_Req').hide();
    },
            success:function(data)
            {
             $('#contact_us_form .notice').html(data);
             $('#contact_us_form .notice').css("color","green");
            }
            
            

        })
        e.preventDefault();        

    })

    $('#signup').on("submit",function(e){
        var signup_name = $("#signup_name").val();
        var signup_email = $("#signup_email").val();
        var password = $('#password').val();
        if(signup_name=="" || signup_email =="" || password=="")
        {
             $('#signup .notice').html("Please enter valid input!");
             $('#signup .notice').css("color","tomato");
            
        }
        else{
            var data_form = $(this).serializeArray();
        
        $.ajax({
            url:'newuser.php',
            type:"POST",
            data:data_form,
            success:function(data)
            {
             $('#signup .notice').html(data);
             $('#signup .notice').css("color","lightgreen");
             
                
            }
            
            

        })
        

        }
        e.preventDefault();

    })
    $('#login').on("submit",function(e){



        var data_form = $(this).serializeArray();
        
        var login_name = $("#login_name").val();
        var l_password = $('#l_password').val();
        if(login_name=="" || password=="")
        {
             $('#login .notice').html("Please enter valid input!");
             $('#login .notice').css("color","tomato");
            
        }
        else{
        $.ajax({
            url:'user.php',
            type:"POST",
            data:data_form,
            success:function(data)
            {
             if(data!="ok")
             {
             $('#login .notice').html(data);
             $('#login .notice').css("color","tomato");
              }
              else{
                window.location.assign("dashboard.php");
              }  
            }
            
            

        })
    }
        e.preventDefault();

    })
       $('.toggle').click(function(){
                        $('.toggle').toggleClass('active');
                        $('#nav-links').toggleClass('active');
                    })
    $('#search-event-form').on("submit",function(e){
        var data_form = $(this).serializeArray();
        console.log(data_form);

        $.ajax({
            url:'event_search.php',
            type:"POST",
            data:data_form,
            success:function(data)
            {
             $('#display-events').html(data);
                
            },
            error:function(data)
            {
                console.log(data);
            }
            
            

        })
        e.preventDefault();

    })
    function display_events(id)
    {
        
        $.ajax({
            url:'display_events.php',
            type:"POST",
            data:{id:id},
            success:function(data)
            {
                window.location.href = "event.php";
              
            }
        })
    }
</script>
</body>
</html>