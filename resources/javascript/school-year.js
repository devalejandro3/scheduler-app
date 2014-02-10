$(document).ready(function(){
	SCHOOLYEAR.initializeBindings();

});

var SCHOOLYEAR = {};

SCHOOLYEAR.initializeBindings = function(){
	SCHOOLYEAR.bindDeleteButton();
	SCHOOLYEAR.bindUpdateButton();
	SCHOOLYEAR.dialogs();

}


SCHOOLYEAR.dialogs = function(){
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
					"Add School-Year": function() {
						SCHOOLYEAR.addEntry();
						
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

				
					var deptId = $('#selectedSchoolYearId').val();
					
					SCHOOLYEAR.updateEntry(deptId);
					
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


			$( "#createSchoolyear" ).button().click(function() {
		

				$( "#dialog-form" ).dialog( "open" );

				// This will display the selected SCHOOLYEAR to the dialog box.
				$('#schoolYearLbl').text($("#dwnDept>option:selected").html());
			});	
}


//BINDINGS

/*
	Bindings of SCHOOLYEAR 
*/

	
SCHOOLYEAR.bindDeleteButton = function(){

	$('#schoolYearTable tbody tr').click( function () {
		var schoolYearId = $(this).find('td:first').text();
		$('#selectedSchoolYearId').val(schoolYearId);
	});


	$('.deleteButton').click(function(){
		if(confirm("Are you sure you want to delete this record? ")){
			$('#schoolYearTable tbody tr').click( function () {
			   
			    var schoolYearId = $('#selectedSchoolYearId').val();
			    alert("schoolYearId :" + schoolYearId);
			    	$.ajax ({
						datatype:'text',
					  	type		: "POST",
						url: "/scheduler-app/index.php/Maintenance/SchoolYearController/deleteSchoolYear/" + schoolYearId,
					  	success	: function(rs)  {
					 		//console.log("HERE : " + rs);
					  		$( "#schoolYearTable" ).html('');
							$( "#schoolYearTable" ).append( "<p>" + rs + "</p>" );

							SCHOOLYEAR.bindDeleteButton();
							SCHOOLYEAR.bindUpdateButton();
					  	}
					});
			} );
		}
	});
}

SCHOOLYEAR.bindUpdateButton = function(){
	$('.updateButton').click(function(){
			
				$('#schoolYearTable tbody tr').click( function () {
						var schoolYearId = $(this).find('td:first').text();
						$('#selectedSchoolYearId').val(schoolYearId);
				});

				$( "#dialog-form-update" ).dialog( "open" ); // Update Button Dialog.

				// This will display the selected SCHOOLYEAR to the dialog box.
				$('#schoolYearLbl').text($("#dwnDept>option:selected").html());
			
	});	
}



//END OF BINDINGS

//CRUD SCHOOLYEAR
SCHOOLYEAR.addEntry = function(){


	var all = $('#addSchoolYear').serialize();
	var url = "/scheduler-app/index.php/Maintenance/SchoolYearController/addSchoolYear";
	
	$.ajax
	({
		  type		: "POST",
		  url		: url,
		  data 		: all,
		  success	: function(rs)
		  {
			if(rs != null) {
				location = "/scheduler-app/index.php/Maintenance/SchoolYearController/schoolYear";
			} else {
		  		alert("error : " + rs);
			}
		  }
	});

}

SCHOOLYEAR.updateEntry = function(schoolYearId){

	var all = $('#updateSchoolYear').serialize();
	var url = "/scheduler-app/index.php/Maintenance/SchoolYearController/updateSchoolYear/" + schoolYearId;
	$.ajax
	({
		  type		: "POST",
		  url		: url,
		  data 		: all,
		  success	: function(rs) {
		  	 $( "#schoolYearTable" ).html('');
			$( "#schoolYearTable" ).append( "<p>" + rs + "</p>" );
			SCHOOLYEAR.bindUpdateButton();
			SCHOOLYEAR.bindDeleteButton();
			alert('Successfully Updated.');
			
		  }
	});

}

SCHOOLYEAR.schoolYearChange = function(){
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
