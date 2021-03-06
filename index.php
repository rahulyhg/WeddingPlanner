<!DOCTYPE html>
<html lang="en">
<head>
	<title>Wedding Planner Southampton</title>
	<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css"></head>
	<link rel="stylesheet" href="css/main.css"></head>
<body>
	<nav class="navbar navbar-default navbar-static-top navbar-inverse ">
  <div class="container">
	<div class="navbar-header"><a class="navbar-brand" href="index.php">Wedding Planner Service</a></div>
  </div>
</nav>
	
			<?php

				$errors = 0;
			    $errorText = "
			<div class='alert alert-danger alert-dismissable' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<ul>
					";

				require ('connect_oo.php'); #connect to database
    
    		if($sqlError){
    			$errors++;
        		$errorText+="<li>There as an error connecting to the database, please try again later.</li>";

    		}else{
				$today = date("Y-m-d");
    			$firstName = "";
    			$lastName = "";
    			$email = "";
    			$address = "";
    			$postcode = "";
    			$telephone = "";
    			$weddingDate = "";
   				$weddingLocation = "";
    			$specialRequirements = "";
 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			    #validate first name
    if(empty ($_POST['first-name']) || strlen($_POST['first-name']) > 35 || !preg_match("/^[a-zA-Z ,.'-]+$/",$_POST['first-name'])){
        $errorText.="
					<li>Please enter a valid first name</li>
					";
        $errors++;
    }

    #validate last name
    if(empty ($_POST['last-name']) || strlen($_POST['last-name']) > 35 || !preg_match("/^[a-zA-Z ,.'-]+$/",$_POST['last-name'])){
         $errorText.="
					<li>Please enter a valid last name</li>
					";
        $errors++;
    }

    #validate email
    if(empty ($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || strlen($_POST['email']) > 254){
        $errorText.="
					<li>Please enter a valid email</li>
					";
        $errors++;
    }

    #validate address
    if(strlen($_POST['address']) > 255){
        $errorText.="
					<li>Please enter a valid address</li>
					";   
        $errors++;
    }

    #validate telephone
    if(!empty($_POST['telephone-number']) && !preg_match("/^[0-9]{11}$/",$_POST['telephone-number'])){
        $errorText.="
					<li>Please enter a valid telephone number</li>
					";
        $errors++;
    }
    
    #validate postcode
    if(!empty($_POST['postcode']) && !preg_match("/^([A-PR-UWYZ0-9][A-HK-Y0-9][AEHMNPRTVXY0-9]?[ABEHMNPRVWXY0-9]? {1,2}[0-9][ABD-HJLN-UW-Z]{2}|GIR 0AA)$/",$_POST['postcode'])){
        $errorText.="
					<li>Please enter a valid UK postcode</li>
					";
        $errors++;   
    }

    #validate wedding date
    if(empty ($_POST['wedding-date']) || !checkValidDate($_POST['wedding-date']) ||$_POST['wedding-date']
					< $today){
        $errorText.="<li>Please enter a valid date in the future</li>
					";
        $errors++;
    }

    #validate wedding location
    if(empty ($_POST['wedding-location']) || strlen($_POST['wedding-location']) > 50){
        $errorText.="
					<li>Please enter a valid wedding location</li>
					";
        $errors++;

    }
    	
    }
	}
    #returns boolean depending on validity of date
    function checkValidDate( $postedDate) {
        if ( preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$postedDate) ) {
        list( $year , $month , $day ) = explode('-',$postedDate);
        return( checkdate( $month , $day , $year ) );
        } else {
        return( false );
        }
        }	


        if($errors > 0){
							$errorText .= "<li>Cannot process request - one or more errors exist. Please fix them and try again</li></ul></div>";
							echo $errorText;
							$firstName = $_POST['first-name'];
    						$lastName = $_POST['last-name'];
    						$email = $_POST['email'];
    						$address = $_POST['address'];
    						$postcode = $_POST['postcode'];
    						$telephone = $_POST['telephone-number'];
    						$weddingDate = $_POST['wedding-date'];
    						$weddingLocation = $_POST['wedding-location'];
    						$specialRequirements = $_POST['special-requirements'];
						}

				
					 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	 	 if($errors == 0){
	 	 	$now = date("Y-m-d H:i:s");    
	 	 	$firstName = $mysqli->real_escape_string($_POST['first-name']);
    		$lastName = $mysqli->real_escape_string($_POST['last-name']);
    		$email = $mysqli->real_escape_string($_POST['email']);
    		$address = $mysqli->real_escape_string($_POST['address']);
    		$postcode = $mysqli->real_escape_string($_POST['postcode']);
    		$telephone = $mysqli->real_escape_string($_POST['telephone-number']);
    		$weddingDate = $mysqli->real_escape_string($_POST['wedding-date']);
    		$weddingLocation = $mysqli->real_escape_string($_POST['wedding-location']);
    		$specialRequirements = $mysqli->real_escape_string($_POST['special-requirements']);

	 	 #query
   		if($stmt = $mysqli->prepare("INSERT INTO inquiries(submit_date, first_name, last_name, address, postcode, email, phone, wedding_date, wedding_location, special_req) VALUES (?,?,?,?,?,?,?,?,?,?);")){
        	$stmt->bind_param('ssssssssss', $now, $firstName, $lastName, $address, $postcode, $email, $telephone, $weddingDate, $weddingLocation, $specialRequirements);
        	$OK = $stmt->execute();
        	#if query has been executed
        	if ($OK){
            					echo "<div class='alert alert-success alert-dismissable' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				
				<p>
					Your quote has been successfully processed and saved. We will contact you shortly
				</p>
			</div>
			";
			$firstName = "";
    			$lastName = "";
    			$email = "";
    			$address = "";
    			$postcode = "";
    			$telephone = "";
    			$weddingDate = "";
   				$weddingLocation = "";
    			$specialRequirements = "";
			
        	}else{
             $errors++;
             $errorText.= "<li>We were not able to process your request right now, please try again later</li>";
			}
        $stmt->close();

        }else{
        	 $errors++;
             $errorText.= "<li>We were not able to process your request right now, please try again later</li>";
        }
        $mysqli->close();
    }
    }



			?>
	<div class="container">
		<!-- Carousel of images -->
		<div id="weddingPicsCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#weddingPicsCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#weddingPicsCarousel" data-slide-to="1"></li>
				<li data-target="#weddingPicsCarousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img  class="carousel-image" src="img/weddingImage1.jpg" alt="Generic Wedding Image 1">
					<div class="carousel-caption">Planning Weddings is tough!</div>
				</div>
				<div class="item">
					<img class="carousel-image" src="img/weddingImage2.jpg" alt="Generic Wedding Image 2">
					<div class="carousel-caption">...</div>
				</div>
				<div class="item">
					<img class="carousel-image" src="img/weddingImage3.jpg" alt="Generic Wedding Image 3">
					<div class="carousel-caption">...</div>
				</div>
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#weddingPicsCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#weddingPicsCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>

		<div class="row">
			<div class="col-md-8">
				<h3 class="text-center">About Us</h3>
				<div class="text-justify">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus aliquam nunc vel ante consectetur,
					et tristique dolor semper. Pellentesque vitae libero sed dolor sodales maximus. Maecenas semper posuere
					augue, sit amet sodales libero lacinia ac. Nunc tincidunt mi nec auctor facilisis. Curabitur eget lacus
					lorem. Nullam eget facilisis metus, in convallis justo. Phasellus a purus id lacus molestie iaculis 
					facilisis sit amet justo. Pellentesque a vestibulum leo, a egestas sapien. Aliquam id aliquam diam. 
					Vestibulum id mauris consectetur, imperdiet turpis sed, interdum neque. Suspendisse potenti. Vestibulum
					ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum suscipit odio
					ut nulla egestas, in aliquam lorem ornare. Vestibulum et tortor tristique justo ultrices interdum at
					in ipsum. Praesent gravida ipsum felis, ornare cursus tortor mattis sit amet. Etiam quis augue vel 
					lacus maximus blandit nec eget risus.
					</p>
					<p>
						In non orci at arcu iaculis fermentum. Suspendisse ultricies elit est, quis condimentum augue sodales
					ac. Nam cursus sem metus, sit amet scelerisque libero tempor nec. Donec bibendum ut purus quis dignissim.
				  	Nullam diam nibh, scelerisque et turpis a, posuere bibendum ante. Cras malesuada ligula erat, ut vestibulum
				   	velit pharetra ac. Mauris imperdiet dui et eros cursus malesuada. Praesent faucibus diam nisi, ac rhoncus 
				   	diam hendrerit ut. Maecenas sit amet tristique elit. Praesent in lacus eu magna venenatis pulvinar vel eu 
				   	justo. Vivamus feugiat sapien vitae nisi lacinia, vulputate pellentesque ipsum porta. Duis porttitor mauris 
				   	vitae tempor commodo. Integer posuere, magna quis rutrum egestas, enim velit gravida quam, eu consectetur 
				   	tellus risus vitae augue. Maecenas tellus mi, tempor ac ligula non, tempus malesuada mauris.
					</p>
					<p>
						Mauris at nibh in dolor mattis gravida. Proin tincidunt finibus nisi eu eleifend. Fusce convallis egestas 
					ex, non placerat augue scelerisque a. Phasellus nec tortor tincidunt nulla ornare semper ac et augue. Proin 
					id elementum eros, sed bibendum ipsum. Vivamus ac diam ut urna gravida pellentesque. Cras pretium ac magna 
					in scelerisque. Curabitur sed maximus metus. Nunc ac nisl nibh. Praesent molestie ultricies mi vitae fermentum. 
					Duis in maximus erat. Maecenas ante risus, egestas eu lorem quis, ornare volutpat tortor. Curabitur mollis 
					consequat ex quis feugiat. Aliquam sed mattis ligula.
					</p>
					<p></p>
				</div>
			</div>
			<!-- Quote form -->
			<div class="col-md-4">
				<h3 class="text-center">Get a Quote</h3>
			<form method="post" action="index.php" name="quote" class="form-horizontal">
				<div class="form-group">
					<input type="text" class="form-control patternMismatch" placeholder="First Name (required)" id="first-name" name="first-name" value="<?php  echo $firstName; ?>" maxlength="35" pattern="[a-zA-Z ,.'-]+" required></div>
				<div class="form-group">
					<input type="text" class="form-control patternMismatch" placeholder="Last Name (required)" id="last-name" name="last-name" value="<?php  echo $lastName; ?>" maxlength="35"  pattern="[a-zA-Z ,.'-]+" required></div>
				<div class="form-group">
					<input type="email" class="form-control typeMismatch" placeholder="Email (required)" id="email" name="email" value="<?php  echo $email; ?>" maxlength="254" required></div>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Address" id="address" name="address" value="<?php  echo $address; ?>" maxlength="255"></div>
				<div class="form-group">
					<input type="text" class="form-control patternMismatch" placeholder="Postcode" id="UK-postcode" name="postcode" value="<?php  echo $postcode; ?>" pattern="([A-PR-UWYZ0-9][A-HK-Y0-9][AEHMNPRTVXY0-9]?[ABEHMNPRVWXY0-9]? {1,2}[0-9][ABD-HJLN-UW-Z]{2}|GIR 0AA)" maxlength="8">
				</div>
				<div class="form-group">
					<input type="tel" class="form-control patternMismatch" placeholder="Telephone" id="telephone-number" name="telephone-number" value="<?php  echo $telephone; ?>" maxlength="11" pattern="[0-9]{11}"></div>
				<div class="form-group">
					<input type="date" class="form-control dateMismatch" placeholder="Wedding Date (required)" id="wedding-date-in-the-future" name="wedding-date" value="<?php  echo $weddingDate; ?>" required></div>
				<div class="form-group">
					<input type="text" class="form-control requiredMismatch" placeholder="Wedding Location (required)" id="wedding-location" name="wedding-location" value="<?php  echo $weddingLocation; ?>" maxlength="50" required></div>
				<div class="form-group">
					<textarea type="text" class="form-control" placeholder="Special Requirements" id="special-requirements" name="special-requirements" value="<?php  echo $specialRequirements; ?>"></textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default btn-block">Submit enquiry</button>
				</div>
			</form>
		</div>
	</div>
	<h2 class="text-center">Services</h2>
	<div class="row">
		<div class="col-md-4">
			<h3 class="text-center">Marquees</h3>
			<img class="centre-image img-circle img-responsive" src="img/service1.jpg" alt="Wedding Service">
			<br/>
			<p class="text-justify">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus aliquam nunc vel ante consectetur,
				et tristique dolor semper. Pellentesque vitae libero sed dolor sodales maximus. Maecenas semper posuere
				augue, sit amet sodales libero lacinia ac. Nunc tincidunt mi nec auctor facilisis. Curabitur eget lacus
				lorem. Nullam eget facilisis metus, in convallis justo. Phasellus a purus id lacus molestie iaculis 
				facilisis sit amet justo. Pellentesque a vestibulum leo, a egestas sapien. Aliquam id aliquam diam. 
				Vestibulum id mauris consectetur, imperdiet turpis sed, interdum neque. Suspendisse potenti. Vestibulum
				ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum suscipit odio
				ut nulla egestas, in aliquam lorem ornare.
			</p>
		</div>
		<div class="col-md-4">
			<h3 class="text-center">Catering</h3>
			<img class="centre-image img-circle img-responsive" src="img/service2.jpg" alt="Wedding Service">
			<br/>
			<p class="text-justify">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus aliquam nunc vel ante consectetur,
				et tristique dolor semper. Pellentesque vitae libero sed dolor sodales maximus. Maecenas semper posuere
				augue, sit amet sodales libero lacinia ac. Nunc tincidunt mi nec auctor facilisis. Curabitur eget lacus
				lorem. Nullam eget facilisis metus, in convallis justo. Phasellus a purus id lacus molestie iaculis 
				facilisis sit amet justo. Pellentesque a vestibulum leo, a egestas sapien. Aliquam id aliquam diam. 
				Vestibulum id mauris consectetur, imperdiet turpis sed, interdum neque. Suspendisse potenti. Vestibulum
				ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum suscipit odio
				ut nulla egestas, in aliquam lorem ornare.
			</p>
		</div>
		<div class="col-md-4">
			<h3 class="text-center">Decoration</h3>
			<img class="centre-image img-circle img-responsive" src="img/service3.jpg" alt="Wedding Service">
			<br/>
			<p class="text-justify">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus aliquam nunc vel ante consectetur,
				et tristique dolor semper. Pellentesque vitae libero sed dolor sodales maximus. Maecenas semper posuere
				augue, sit amet sodales libero lacinia ac. Nunc tincidunt mi nec auctor facilisis. Curabitur eget lacus
				lorem. Nullam eget facilisis metus, in convallis justo. Phasellus a purus id lacus molestie iaculis 
				facilisis sit amet justo. Pellentesque a vestibulum leo, a egestas sapien. Aliquam id aliquam diam. 
				Vestibulum id mauris consectetur, imperdiet turpis sed, interdum neque. Suspendisse potenti. Vestibulum
				ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum suscipit odio
				ut nulla egestas, in aliquam lorem ornare.
			</p>
		</div>
	</div>
</div>
<br/>
<br/>
<br/>
<br/>
<footer class="footer">
      <div class="container">
        <p>DISCLAIMER: Note that this is a fictitious website that was
developed by a university student as part of a programming
assignment. None of the content on this page is meant to be
genuine nor should it be taken as such</p>
      </div>
    </footer>

<script type="text/javascript" src="lib/jquery/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>