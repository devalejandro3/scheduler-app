$(document).ready(function(){

	USERS.initializeBindings();

});

var USERS = {};

USERS.initializeBindings = function(){
	USERS.bindDeleteButton();
	USERS.bindUpdateButton();
	USERS.dialogs();

}


USERS.dialogs = function(){
	var name = $( "#name" ),
				email = $( "#email" ),
				password = $( "#password" ),
				allFields = $( [] ).add( name ).add( email ).add( password ),
				tips = $( ".validateTips" );

				$( "#dialog-form" ).dialog({
					autoOpen: false,
					height: 300,
					width: 350,
					modal: true,
					buttons: {
					"Create User": function() {
						USERS.addEntry();
						
						var bValid = true;
						allFields.removeClass( "ui-state-error" );

						$( this ).dialog( "close" );
						
					},

					Cancel: function() {
						$( this ).dialog( "close" );
					}

					},

					close: function() {
						allFields.val( "" ).removeClass( "ui-state-error" );
					}
				});


			$( "#dialog-form-update" ).dialog({
				autoOpen: false,
				height: 300,
				width: 350,
				modal: true,
				buttons: {
				"Update Record": function() {

				
					var userId = $('#selectedUserId').val();
					
					USERS.updateEntry(userId);
					
					var bValid = true;
					allFields.removeClass( "ui-state-error" );
					$( this ).dialog( "close" );
					
				},

				Cancel: function() {
					$( this ).dialog( "close" );
				}

				},

				close: function() {
					allFields.val( "" ).removeClass( "ui-state-error" );
				}
			});


			$( "#create-users" ).button().click(function() {

				$( "#dialog-form" ).dialog( "open" );

				// This will display the selected USERS to the dialog box.
				$('#usersLbl').text($("#dwnDept>option:selected").html());
			});
}


//BINDINGS

/*
	Bindings of USERS 
*/

USERS.bindDeleteButton = function(){

	$('#usersTable tbody tr').click( function () {
		var custId = $(this).find('td:first').text();
		$('#selectedUserId').val(custId);
	});


	$('.deleteButton').click(function(){
		if(confirm("Are you sure you want to delete this record? ")){
			$('#usersTable tbody tr').click( function () {
			   
			    var userId = $('#selectedUserId').val();
			    alert("userId :" + userId);
			    	$.ajax ({
						datatype:'text',
					  	type		: "POST",
						url: "/scheduler-app/index.php/Maintenance/UserController/deleteUsers/" + userId,
					  	success	: function(rs)  {
					 		//console.log("HERE : " + rs);
					  		$( "#usersTable" ).html('');
							$( "#usersTable" ).append( "<p>" + rs + "</p>" );

							USERS.bindDeleteButton();
							USERS.bindUpdateButton();
					  	}
					});
			} );
		}
	});
}

USERS.bindUpdateButton = function(){
	$('.updateButton').click(function(){
			
				$('#USERSTable tbody tr').click( function () {
						var userId = $(this).find('td:first').text();
						$('#selectedUserId').val(userId);
				});

				$( "#dialog-form-update" ).dialog( "open" ); // Update Button Dialog.

				// This will display the selected USERS to the dialog box.
				$('#USERSLbl').text($("#dwnDept>option:selected").html());
			
	});	
}



//END OF BINDINGS

//CRUD USERS
USERS.addEntry = function(){


	var all = $('#addUsers').serialize();
	var url = "/scheduler-app/index.php/Maintenance/UserController/addUsers";
	
	$.ajax
	({
		  type		: "POST",
		  url		: url,
		  data 		: all,
		  success	: function(rs)
		  {
			if(rs != null) {
				location = "/scheduler-app/index.php/Maintenance/UserController/users";
			} else {
		  		alert("error : " + rs);
			}
		  }
	});	

}

USERS.updateEntry = function(userId){

	var all = $('#updateUsers').serialize();
	var url = "/scheduler-app/index.php/Maintenance/UserController/updateUsers/" + userId;
	$.ajax
	({
		  type		: "POST",
		  url		: url,
		  data 		: all,
		  success	: function(rs) {
		  	 $( "#usersTable" ).html('');
			$( "#usersTable" ).append( "<p>" + rs + "</p>" );
			USERS.bindUpdateButton();
			USERS.bindDeleteButton();
			alert('Successfully Updated.');
			
		  }
	});

}



//MESSY function
				function updateTips( t ) {
					tips.text( t ).addClass( "ui-state-highlight" );
					setTimeout(function() {
						tips.removeClass( "ui-state-highlight", 1500 );
					}, 500 );
				}

				function checkLength( o, n, min, max ) {
					// if ( o.val().length > max || o.val().length < min ) {
					// 	o.addClass( "ui-state-error" );
					// 	updateTips( "Length of " + n + " must be between " +
					// 	min + " and " + max + "." );
					// 	return false;
					// } else {
					// 	return true;
					// }

					return true;
				}
				function checkRegexp( o, regexp, n ) {
					if ( !( regexp.test( o.val() ) ) ) {
						o.addClass( "ui-state-error" );
						updateTips( n );
						return false;
					} else {
						return true;
					}
				}
