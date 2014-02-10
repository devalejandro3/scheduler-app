$(document).ready(function(){

	DEPARTMENT.initializeBindings();

});

var DEPARTMENT = {};

DEPARTMENT.initializeBindings = function(){
	DEPARTMENT.bindDeleteButton();
	DEPARTMENT.bindUpdateButton();
	DEPARTMENT.dialogs();

}


DEPARTMENT.dialogs = function(){
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
					"Create Department": function() {
						DEPARTMENT.addEntry();
						
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

				
					var deptId = $('#selectedDepartmentId').val();
					
					DEPARTMENT.updateEntry(deptId);
					
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


			$( "#create-department" ).button().click(function() {

				$( "#dialog-form" ).dialog( "open" );

				// This will display the selected department to the dialog box.
				$('#departmentLbl').text($("#dwnDept>option:selected").html());
			});
}


//BINDINGS

/*
	Bindings of Department 
*/
DEPARTMENT.department = function(){
	

}
	
DEPARTMENT.bindDeleteButton = function(){

	$('#departmentTable tbody tr').click( function () {
		var custId = $(this).find('td:first').text();
		$('#selectedDepartmentId').val(custId);
	});


	$('.deleteButton').click(function(){
		if(confirm("Are you sure you want to delete this record? ")){
			$('#departmentTable tbody tr').click( function () {
			   
			    var deptId = $('#selectedDepartmentId').val();
			    alert("dpetid :" + deptId);
			    	$.ajax ({
						datatype:'text',
					  	type		: "POST",
						url: "/scheduler-app/index.php/Maintenance/DEPARTMENTController/deleteDepartment/" + deptId,
					  	success	: function(rs)  {
					 		//console.log("HERE : " + rs);
					  		$( "#departmentTable" ).html('');
							$( "#departmentTable" ).append( "<p>" + rs + "</p>" );

							DEPARTMENT.bindDeleteButton();
					  	}
					});
			} );
		}
	});
}

DEPARTMENT.bindUpdateButton = function(){
	$('.updateButton').click(function(){
			
				$('#departmentTable tbody tr').click( function () {
						var deptId = $(this).find('td:first').text();
						$('#selectedDepartmentId').val(deptId);
				});

				$( "#dialog-form-update" ).dialog( "open" ); // Update Button Dialog.

				// This will display the selected department to the dialog box.
				$('#departmentLbl').text($("#dwnDept>option:selected").html());
			
	});	
}



//END OF BINDINGS

//CRUD DEPARTMENT
DEPARTMENT.addEntry = function(){


	var all = $('#addDepartment').serialize();
	var url = "/scheduler-app/index.php/Maintenance/DepartmentController/addDepartment";
	
	$.ajax
	({
		  type		: "POST",
		  url		: url,
		  data 		: all,
		  success	: function(rs)
		  {
			if(rs != null) {
				location = "/scheduler-app/index.php/Maintenance/DEPARTMENTController/department";
			} else {
		  		alert("error : " + rs);
			}
		  }
	});

}

DEPARTMENT.updateEntry = function(deptId){

	var all = $('#updateDepartment').serialize();
	var url = "/scheduler-app/index.php/Maintenance/DepartmentController/updateDepartment/" + deptId;
	$.ajax
	({
		  type		: "POST",
		  url		: url,
		  data 		: all,
		  success	: function(rs) {
		  	 $( "#departmentTable" ).html('');
			$( "#departmentTable" ).append( "<p>" + rs + "</p>" );
			DEPARTMENT.bindUpdateButton();
			DEPARTMENT.bindDeleteButton();
			alert('Successfully Updated.');
			
		  }
	});

}

DEPARTMENT.departmentChange = function(){
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
