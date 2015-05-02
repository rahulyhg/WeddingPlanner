$(document).ready(function(){

	
	var today = new Date().toJSON().slice(0,10);
	$("#wedding-date-in-the-future").attr("min",today);
	var dateToday = new Date(today);

	$("input")
		.on("invalid",function(){
			setValidity(this);
			setIncorrectInputs(this);
		});


	$(".typeMismatch")
		.on("input",function(){
		if(this.validity.typeMismatch || $(this).val() < 1){
			setValidity(this);
			setIncorrectInputs(this);
		}else{
			setCorrectInputs(this);
		}
	});


	$(".patternMismatch")
		.on("input",function(){
		if(this.validity.patternMismatch || $(this).val() < 1){
			setValidity(this);
			setIncorrectInputs(this);
		}else{
			setCorrectInputs(this);
		}
	});


	$(".requiredMismatch")
		.on("input",function(){
			if($(this).val() < 1){
			setValidity(this);
			setIncorrectInputs(this);
		}else{
			setCorrectInputs(this);
		}
		});


	$(".dateMismatch")
		.on("input",function(){
			givenDate = new Date($(this).val());
			if(givenDate < dateToday){
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