$(document).ready(function(){

	var firstName = document.getElementById("firstName");
	var lastName = document.getElementById("lastName");
	var weddingDate = document.getElementById("weddingDate");
	var weddingLocation = document.getElementById("weddingLocation");
	var telephone = document.getElementById("telephone");
	

	$("input")
		.on("invalid",function(){
			
			setIncorrectInputs(this);
		})
		.on("valid",function(){
			setCorrectInputs(this);
		});


	$(".typeMismatch")
		.on("keyup",function(){
		if(this.validity.typeMismatch || $(this).val() < 1){
			setValidity(this);
			setIncorrectInputs(this);
		}else{
			setCorrectInputs(this);
		}
	});


	$(".patternMismatch")
		.on("keyup",function(){
		if(this.validity.patternMismatch){
			setValidity(this);
			setIncorrectInputs(this);
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

var setValidity = function(element){
	var values = element.id.split("-");
	var fieldname = "";
	for(var i=0;i < values.length;i++){
		fieldname+= " "+  values[i];
	}
	element.setCustomValidity("Please enter a valid" + fieldname + ".");
};