$(document).ready(function(){

	var firstName = document.getElementById("firstName");
	var lastName = document.getElementById("lastName");
	var weddingDate = document.getElementById("weddingDate");
	var weddingLocation = document.getElementById("weddingLocation");
	var telephone = document.getElementById("telephone");
	

	$("#first-name")
		.on("invalid",function(){
			console.log(this);
			this.setCustomValidity("Please enter a valid first name");
			setIncorrectInputs(this);
		})
		.on("keyup",function(){
		if(this.validity.patternMismatch || $(this).val().length < 1){
			this.setCustomValidity("Please enter a valid first name");
			this.setIncorrectInputs(this);
		}else{
			setCorrectInputs(this);
		}
	});



});

var setIncorrectInputs = function(element){
	$(element).parent().find(".glyphicon").remove();
	$(element).parent().removeClass("has-success has-feedback");
	$(element).parent().addClass("has-error has-feedback");
	$(element).parent().append("<span class='glyphicon glyphicon-remove form-control-feedback' aria-hidden='true'></span>");
};


var setCorrectInputs = function(element){
	element.setCustomValidity("");
	$(element).parent().find(".glyphicon").remove();
	$(element).parent().removeClass("has-error has-feedback");
	$(element).parent().addClass("has-success has-feedback");
	$(element).parent().append("<span class='glyphicon glyphicon-ok form-control-feedback' aria-hidden='true'></span>");
};