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
		<script  src="/scheduler-app/resources/javascript/user.js"></script>
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
					<h4>User Maintenance</h4>
				</div>

				<form action="/scheduler-app/index.php/Default_Controller/insertValues"  method="POST" id="Data">
					<div class='maintenance'>
						
					
						<div id='usersTable'>
							<?php echo $this->load->view($content,$usersList) ?>
						</div>							
					</div>

				</form>
				<button id="create-users">Add New User</button>
			</div>		

		</div>

		<div class="footer">

			<?php $this->load->view( $footer ) ?>
		</div>



			<!-- DIALOG-->
			<div id="dialog-form" title="Add New User">
				<p class="validateTips">All form fields are required.</p>
				<form id='addUsers' method='POST'>
				<fieldset>
					
					<label for="name">Username</label>
					<input type="text" name="txtUsername" id="name" class="text ui-widget-content ui-corner-all">
					<label for="email">Fullname</label>
					<input type="text" name="txtFullname"  value="" class="text ui-widget-content ui-corner-all">
				</fieldset>
				</form>
			</div>



			<div id="dialog-form-update" title="Update User Info">
				<p class="validateTips">All form fields are required.</p>
				<form id='updateUsers' method='POST'>
				<fieldset>
					<label id='departmentLbl' for="department">User</label>
					
					<label for="name">Username</label>
					<input type="text" name="txtUsername" id="name" class="text ui-widget-content ui-corner-all">
					<label for="email">Fullname</label>
					<input type="text" name="txtFullname"  value="" class="text ui-widget-content ui-corner-all">
				</fieldset>
				</form>
			</div>




		<!-- END OF DIALOG -->

		

	</body>
</html>