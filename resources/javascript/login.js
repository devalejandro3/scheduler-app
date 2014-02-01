$(document).ready(function(){
	
	//LOGIN_VALIDATION.alerts();


	LOGIN_VALIDATION.init();
});	



var LOGIN_VALIDATION = {};




LOGIN_VALIDATION.alerts = function(){
	alert();
}

LOGIN_VALIDATION.init = function(){

	$('#btnSubmit').click(function(){

		LOGIN_VALIDATION.test();
	})

	
}


LOGIN_VALIDATION.test = function(){

	var username = $('#txtUsername').val();
	var password = $('#txtPassword').val();

	if(username != ''){
		if(password != ''){
			
		}

	}

}