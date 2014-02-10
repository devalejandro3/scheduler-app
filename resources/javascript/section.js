$(document).ready(function(){

	SECTION.initializeBindings();

});

var SECTION = {};

SECTION.initializeBindings = function(){
	SECTION.department();
	SECTION.dialogs();
}


SECTION.dialogs = function(){
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
				"Create an account": function() {
					SECTION.addEntry($('#dwnDept').val());
					
					var bValid = true;
					allFields.removeClass( "ui-state-error" );
				//	bValid = bValid && checkLength( name, "username", 3, 16 );
				//bValid = bValid && checkLength( email, "email", 6, 80 );
				//	bValid = bValid && checkLength( password, "password", 5, 16 );
				//	bValid = bValid && checkRegexp( name, /^[a-z]([0-9a-z_])+$/i, "Username may consist of a-z, 0-9, underscores, begin with a letter." );
					// From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
				//	bValid = bValid && checkRegexp( email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "email@domain.com" );
				//	bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
					
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

				
					var custId = $('#selectedUserId').val();
					var deptId = $('#dwnDept').val();
					SECTION.updateEntry(custId, deptId);
					
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


			$( "#create-user" ).button().click(function() {
				$( "#dialog-form" ).dialog( "open" );

				// This will display the selected department to the dialog box.
				$('#departmentLbl').text($("#dwnDept>option:selected").html());
			});
}


//BINDINGS

/*
	Bindings of Department 
*/
SECTION.department = function(){
	$('#dwnDept').change(function(){
		//$( "#sectionTable" ).html('');
		//$( "#sectionTable" ).append( "<p>Test</p>" );
		var deptId = $('#dwnDept').val();
		
		$.ajax ({
			datatype:'text',
		  	type		: "POST",
			url: "/scheduler-app/index.php/Maintenance/SectionController/viewSectionTable/" + deptId,
		  	success	: function(rs)  {
		 		//console.log("HERE : " + rs);
		  		$( "#sectionTable" ).html('');
				$( "#sectionTable" ).append( "<p>" + rs + "</p>" );

				SECTION.bindDeleteButton();
				SECTION.bindUpdateButton();
		  	}
		});


	});



}
	
SECTION.bindDeleteButton = function(){
	$('.deleteButton').click(function(){
		if(confirm("Are you sure you want to delete this record? ")){
			$('#sectionTable tbody tr').click( function () {
			    var custId = $(this).find('td:first').text();
			   
			    var deptId = $('#dwnDept').val();
			    	$.ajax ({
						datatype:'text',
					  	type		: "POST",
						url: "/scheduler-app/index.php/Maintenance/SectionController/deleteUsers/" + custId  + 	"/" + deptId,
					  	success	: function(rs)  {
					 		//console.log("HERE : " + rs);
					  		$( "#sectionTable" ).html('');
							$( "#sectionTable" ).append( "<p>" + rs + "</p>" );

							SECTION.bindDeleteButton();
							SECTION.bindUpdateButton();
					  	}
					});
			} );
		}
	});
}

SECTION.bindUpdateButton = function(){
	$('.updateButton').click(function(){
			
				$('#sectionTable tbody tr').click( function () {
						var custId = $(this).find('td:first').text();
						$('#selectedUserId').val(custId);
				});

				$( "#dialog-form-update" ).dialog( "open" ); // Update Button Dialog.

				// This will display the selected department to the dialog box.
				$('#departmentLbl').text($("#dwnDept>option:selected").html());
			
	});	
}



//END OF BINDINGS

//CRUD SECTION
SECTION.addEntry = function(deptId){


	var all = $('#addSection').serialize();
	var url = "/scheduler-app/index.php/Maintenance/SectionController/addSection/"+deptId;
	
	$.ajax
	({
		  type		: "POST",
		  url		: url,
		  data 		: all,
		  success	: function(rs)
		  {
			if(rs != null) {
				location = "/scheduler-app/index.php/Maintenance/SectionController/section";
			} else {
		  		alert("error : " + rs);
			}
		  }
	});

}

SECTION.updateEntry = function(userId, deptId){

	var all = $('#updateSection').serialize();
	var url = "/scheduler-app/index.php/Maintenance/SectionController/updateSection/" + userId + "/" + deptId;
	$.ajax
	({
		  type		: "POST",
		  url		: url,
		  data 		: all,
		  success	: function(rs) {
		  	 $( "#sectionTable" ).html('');
			$( "#sectionTable" ).append( "<p>" + rs + "</p>" );
			SECTION.bindUpdateButton();
			SECTION.bindDeleteButton();
			alert('Successfully Updated.');
			
		  }
	});

}

SECTION.departmentChange = function(){
	alert("#dwnDept").val();
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
