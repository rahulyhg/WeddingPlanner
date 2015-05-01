<!DOCTYPE html>
<html lang="en">
<head>
	<title>Wedding Planner Southampton</title>
	<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css"></head>
	<link rel="stylesheet" href="css/main.css"></head>
<body>
	<h1 class="text-center">Wedding Planner Service</h1>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<!-- Carousel of images -->
				<div id="weddingPicsCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#weddingImage1" data-slide-to="0" class="active"></li>
						<li data-target="#weddingImage2" data-slide-to="1"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<img class="carousel-image" src="img/weddingImage1.jpg" alt="Generic Wedding Image">
							<div class="carousel-caption">Planning Weddings is tough!</div>
						</div>
						<div class="item">
							<img class="carousel-image" src="img/weddingImage2.jpg" alt="Generic Wedding Image">
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
			</div>

			<!-- Quote form -->
			<div class="col-md-4">
				<h3 class="text-center">Get a Quote</h3>
				<form class="form-horizontal">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="First Name" id="firstName"></div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Last Name" id="lastName"></div>
					<div class="form-group">
						<input type="email" class="form-control" placeholder="Email" id="email"></div>
					<div class="form-group">
						<input type="text" class="form-control"placeholder="Address" id="address"></div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Postcode" id="postCode"></div>
					<div class="form-group">
						<input type="tel" class="form-control" placeholder="Telephone" id="telephone"></div>
					<div class="form-group">
						<input type="date" class="form-control" placeholder="Wedding Date" id="weddingDate"></div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Wedding Location" id="weddingLocation"></div>
					<div class="form-group">
						<textarea type="text" class="form-control" placeholder="Special Requirements" id="specialRequirements"></textarea></div>
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