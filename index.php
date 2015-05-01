<!DOCTYPE html>
<html lang="en">
<head>
	<title>Wedding Planner Southampton</title>
	<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css"></head>
	<link rel="stylesheet" href="css/main.css"></head>
<body>
	<h1 class="text-center">Wedding Planner Service</h1>
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
			<div class="col-md-6"></div>
			<!-- Quote form -->
			<div class="col-md-6">
				<h3 class="text-center">Get a Quote</h3>
				<form class="form-horizontal">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="First Name" name="firstName"></div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Last Name" name="lastName"></div>
					<div class="form-group">
						<input type="email" class="form-control" placeholder="Email" name="email"></div>
					<div class="form-group">
						<input type="text" class="form-control"placeholder="Address" name="address"></div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Postcode" name="postcode"></div>
					<div class="form-group">
						<input type="tel" class="form-control" placeholder="Telephone" name="telephone"></div>
					<div class="form-group">
						<input type="date" class="form-control" placeholder="Wedding Date" name="weddingDate"></div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Wedding Location" name="weddingLocation"></div>
					<div class="form-group">
						<textarea type="text" class="form-control" placeholder="Special Requirements" name="specialRequirements"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-default btn-block">Submit enquiry</button>
					</div>
				</form>
			</div>
		</div>

	</div>
	<script type="text/javascript" src="lib/jquery/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

<?php
	require ('connect_oo.php'); #connect to database

	#values initialised
	$today = date("Y-m-d H:i:s");    
    $firstName = "";
    $lastName = "";
    $email = "";
    $address = "";
    $postcode = "";
    $telephone = "";
    $weddingDate = "";
    $weddingLocation
 	$specialRequirements = "";


 	$firstName = $mysqli->real_escape_string($_POST['firstName']);
 	$lastName = $mysqli->real_escape_string($_POST['lastName']);
 	$email = $mysqli->real_escape_string($_POST['email']);
 	$address = $mysqli->real_escape_string($_POST['address']);
 	$postcode = $mysqli->real_escape_string($_POST['postcode']);
 	$telephone = $mysqli->real_escape_string($_POST['telephone']);
 	$weddingDate = $mysqli->real_escape_string($_POST['weddingDate']);
 	$weddingLocation = $mysqli->real_escape_string($_POST['weddingLocation']);
 	$specialRequirements = $mysqli->real_escape_string($_POST['specialRequirements']);

 	#query
        $stmt = $mysqli->prepare("INSERT INTO inquiries(submit_date, first_name,last_name,address,postcode,email,wedding_date,wedding_location,special_req) VALUES (?,?,?,?,?,?,?,?,?);");
        $stmt->bind_param('sssssssss', $today,$firstName, $lastName, $addres, $postcode, $email,$weddingDate,$weddingLocation,$specialRequirements);
        $OK = $stmt->execute();
        #if query has been executed
        if ($OK)
            echo "<p>Student has been enrolled</p>";
        else
            echo "<p> Something went wrong :(</p>";

        $stmt->close();
        $mysqli->close();
?>

