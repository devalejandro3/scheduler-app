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
		lvwClick(id);
	})

	$('.delUser').click(function(){
		var id = this.id
		btnDelete(id);
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
	alert(all);
	var url = "/scheduler-app/index.php/Default_Controller/UpdateMaintenance";
	
	$.ajax
	({
		  type		: "POST",
		  url		: url,
		  data 		: all,
		  success	: function(rs)
		  {
		  	alert(rs);
			if(rs != null)
			{
				location = "/scheduler-app/index.php/Default_Controller/homePage";
			}
			else
			{
		  		alert("error : " + rs);
			}
		  }
	});

	

	// alert("FORM ACTION : " + $('#hiddenEdit').val());

	// $('#Data').attr('action',$('#hiddenEdit').val());

}

function lvwClick(id){
	var all 		= $('#Data').serialize();
	var user  		= "#a" + id;
	var getUser 	= $(user).val();
	var full		= "#f" + id;
	var getFullname = $(full).val();
	$('#txtUsername').val(getUser);
	$('#txtFullname').val(getFullname);
	$('#UserID').val(id);

	 
	

}

function btnDelete(id)
{

	var url = "/scheduler-app/index.php/Default_Controller/deleteUser";
	if (confirm ("Are you sure you want to delete this record?"))
	{
	    $.ajax
		({
			  type		: "POST",
			  url		: url,
			  data 		: $('#Data').serialize(),
			  success	: function(rs)
			  {
			  	alert(rs);
				if(rs != null)
				{
					location = "/scheduler-app/index.php/Default_Controller/homePage";
				}
				else
				{
			  		alert("error : " + rs);
				}
			  }
		});
	}

}

