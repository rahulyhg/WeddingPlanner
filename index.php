<!DOCTYPE html>
<html lang="en">
<head>
	<title>Wedding Planner Southampton</title>
	<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css"></head>
<body>
	<h1 class="text-center">Wedding Planner Service</h1>
	<div class="container">

		<!-- Carousel of images -->
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="..." alt="...">
					<div class="carousel-caption">...</div>
				</div>
				<div class="item">
					<img src="..." alt="...">
					<div class="carousel-caption">...</div>
				</div>
				...
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>

		<!-- Quote form -->
		<div>
			<h3 class="text-center">Get a Quote</h3>
			<form class="form-horizontal">
				<div class="form-group">
					<label for="firstName" class="col-sm-2 control-label">First Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" placeholder="" id="firstName"></div>
				</div>
				<div class="form-group">
					<label for="lastName" class="col-sm-2 control-label">Last Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" placeholder="" id="lastName"></div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" placeholder="" id="email"></div>
				</div>
				<div class="form-group">
					<label for="address" class="col-sm-2 control-label">Address</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" class="form-control" placeholder="" id="address"></div>
				</div>
				<div class="form-group">
					<label for="postCode" class="col-sm-2 control-label">Postcode</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" placeholder="" id="postCode"></div>
				</div>
				<div class="form-group">
					<label for="telephone" class="col-sm-2 control-label">Telephone</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" placeholder="" id="telephone"></div>
				</div>
				<div class="form-group">
					<label for="weddingDate" class="col-sm-2 control-label">Wedding Date</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" placeholder="" id="weddingDate"></div>
				</div>
				<div class="form-group">
					<label for="weddingLocation" class="col-sm-2 control-label">Wedding Location</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" placeholder="" id="weddingLocation"></div>
				</div>
				<div class="form-group">
					<label for="specialRequirements" class="col-sm-2 control-label">Special requirements</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" placeholder="" id="specialRequirements"></div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default btn-block">Submit enquiry</button>
				</div>
			</form>
		</div>
	</div>

	<script type="text/javascript" src="lib/jquery/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>