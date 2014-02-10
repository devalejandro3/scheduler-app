 <!DOCTYPE html>
<html lang="en">
	<head>
		
		<meta charset="utf-8">
		<title> <?php echo $title ?> </title>
		<link rel="stylesheet" type="text/css" href="/scheduler-app/resources/css/myStyles.css"/>
		<link rel="stylesheet" type="text/css" href="/scheduler-app/resources/css/maintenance.css"/>
		<link rel="stylesheet" type="text/css" href="/scheduler-app/resources/css/jquery-ui/jquery-ui.css">
		<link rel="stylesheet" type="text/css" href="/scheduler-app/resources/css/table/TableCSSCode.css">
		<script  src="/scheduler-app/resources/jquery/jquery-2.1.0.js"></script>
		<script  src="/scheduler-app/resources/jquery/jquery-2.1.0.min.js"></script>
		<script  src="/scheduler-app/resources/jquery/jquery-ui/jquery-ui.js"></script>
		<script  src="/scheduler-app/resources/javascript/login.js"></script>
		<script  src="/scheduler-app/resources/javascript/section.js"></script>
		<script  src="/scheduler-app/resources/javascript/jquery-ui-menu.js"></script>
	</head>
	<body>

		<div id="header">
			<div class="header_inner">
				
				<div><?php $this->load->view( $header ) ?></div>
				<div style="text-align:right;"><div>Welcome : <?php echo $_SESSION['fullname'] ?></div><a href="/scheduler-app/index.php/Default_Controller/logout">	 Logout</a></div>
				
			</div>
		</div>

		<div class="menu_bar">

				<div><?php $this->load->view( $menu ) ?></div>
				
		</div>
		<div class='content'> 

			<div class='content_inner'>

				<div class='maintenance_header'>
					<h4>Section Maintenance</h4>
				</div>

				<form action="/scheduler-app/index.php/Default_Controller/insertValues"  method="POST" id="Data">
					<div class='maintenance'>
						
						<div>
							<label for='dwnDept'>Section :</label>
							<select id='dwnDept' >
								<option>- Select -</option>
								<option value='1'>Pre School Department</option>
								<option value='2'>Elementary Department</option>
								<option value=3>High School Department</option>
								<option value='4'>SPED Department</option>
							</select>
						</div>
					
						<div id='sectionTable'>
							<!--

								Section Table here . . . 
								see SectionCOntent.php

							 -->
						</div>							
					</div>

				</form>
				<button id="create-user">Create new section</button>
			</div>		

		</div>

		<div class="footer">

			<?php $this->load->view( $footer ) ?>
		</div>



			<!-- DIALOG-->
			<div id="dialog-form" title="Add New Section">
				<p class="validateTips">All form fields are required.</p>
				<form id='addSection' method='POST'>
				<fieldset>
					<label id='departmentLbl' for="department">Department</label>
					
					<label for="name">Section Name</label>
					<input type="text" name="txtName" id="name" class="text ui-widget-content ui-corner-all">
					<label for="email">Description</label>
					<input type="text" name="txtDescription"  value="" class="text ui-widget-content ui-corner-all">
				</fieldset>
				</form>
			</div>



			<div id="dialog-form-update" title="Update Section">
				<p class="validateTips">All form fields are required.</p>
				<form id='updateSection' method='POST'>
				<fieldset>
				
					<label for="name">Section Name</label>
					<input type="text" name="txtName" id="name" class="text ui-widget-content ui-corner-all">
					<label for="email">Description</label>
					<input type="text" name="txtDescription"  value="" class="text ui-widget-content ui-corner-all">
				</fieldset>
				</form>
			</div>




		<!-- END OF DIALOG -->

		

	</body>
</html>