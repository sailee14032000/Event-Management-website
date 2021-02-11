<?php
include 'databaseconnect.php';

if(isset($_SESSION['admin'])=="admin")
    {?>

		<!DOCTYPE html>
		<html>
		<head>
			<title></title>
			<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Dosis&family=Josefin+Sans&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
   
		</head>
		<body>
		<header>
     <div id="logo">
         <img src="assests/images/1.png">
        <!--<img src="assests/images/2.png">-->
        <span style="font-size: 1.5em;letter-spacing: 0.2em; font-family: 'Dosis', sans-serif;">MERAKI</span>
    </div>    
    <div class="toggle"></div> 

        <nav id="nav-links">
        
        <ul id="navigation-links">
          <li class="active"><a href="index.php" >Events</a></li>
            <li><a href="create_event.php">Create Events</a></li>
            <li><a href="index.php#signup">Sign up/Login</a></li>
        </ul>
        <div id="clear"></div>
    </nav>
</header>
            <div id="events_dashboard_parent">
            	<img id="dots" src="assests/images/dots1.png">
            	<img id="dots1" src="assests/images/dots1.png">
            	<?php
            	$q_ = mysqli_query($conn,"SELECT * FROM event_requests");
            	$roww = mysqli_num_rows($q_);
            	?>
            	<div id="button_dashboard">
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
            	<div id="requested_events" class="events_dashboard">
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
		<script type="text/javascript">
              $('.toggle').click(function(){
                        $('.toggle').toggleClass('active');
                        $('#nav-links').toggleClass('active');
                    })
			function show_section(div1,div2)
			{
				$(div1).removeClass("hide");

				$(div2).addClass("hide");

			}
			function display_description(no,id)
			{
				$(id).eq(no).toggleClass('hide');
				$('.downarrow').eq(no).toggleClass('flip');
			
			}
			
            function event_accept(id,todo,tname,divid){
            	$.ajax({
					type:"POST",
					url:"add_event.php",
					data:{id:id,todo:todo,tname:tname},
					success : function(data){
			
						$('#events_dashboard_parent').html(data);
						$(divid).removeClass('hide');
						if(todo=="delete")
						{
                         if(divid=="#requested_events")
                         {   
                         $('.notice').eq(0).html("Event Deleted !!");
						 $('.notice').eq(0).css('background','tomato');
                        }
                        else
                        {   
                         $('.notice').eq(1).html("Event Deleted !!");
                         $('.notice').eq(1).css('background','tomato');
                        }



						}
						else{
                         if(divid=="#requested_events")
                         {    
						 $('.notice').eq(0).html("Added To Existing Events");
						 $('.notice').eq(0).css('background','lightgreen');
                        }
                        else{
                         $('.notice').eq(1).html("Added To Existing Events");
                         $('.notice').eq(1).css('background','lightgreen');
                            
                        }

						}


                        setTimeout(() => {
                            $('.notice').eq(0).html("");
                             $('.notice').eq(1).html("");
  

                       }, 5000);



                
                      }
					 

				})

			}
		
		</script>    
		</body>
		</html>

<?php
}
?>


		