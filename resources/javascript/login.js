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
	});

	$('#btnEdit').click(function(){

		btnEdit();
	})

	$('.lvwUserMaintenance').click(function(){
		var id = this.id
		var name = this.name	
		lvwClick(id,name);
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
function btnEdit()
{
	var all = $('#Data').serialize();
	// alert(all);
	var url = "/scheduler-app/index.php/Default_Controller/function1";
	$.ajax
	({
		  type		: "GET",
		  url		: url,
		  success	: function(rs)
		  {
		  	// alert(rs);
			if(rs == "Success")
			{
				alert("connect")
			}
			else
			{
		  		alert("error")
			}
		  }
	});

}

function lvwClick(id,name){
	alert(name);
	$('#txtUsername').val(name);

}