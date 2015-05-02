$(document).ready(function(){

	$("#firstName").on("keyup",function(){
		console.log("hello");
		if(this.validity.typeMismatch){
			this.setCustomValidity("Please enter a First Name");
		}else{
			this.setCustomValidity("");
		}
	});


});