 <!DOCTYPE html>
<html lang="en">
	<head>
		
		<meta charset="utf-8">
		<title> <?php echo $title ?> </title>
		<link rel="stylesheet" type="text/css" href="/scheduler-app/resources/css/myStyles.css"/>
		<link rel="stylesheet" type="text/css" href="/scheduler-app/resources/css/maintenance.css"/>
		<script  src="/scheduler-app/resources/jquery/jquery-2.1.0.js"></script>
		<script  src="/scheduler-app/resources/jquery/jquery-2.1.0.min.js"></script>
		<script  src="/scheduler-app/resources/javascript/login.js"></script>
		<script></script>
	</head>
	<body>

		<div id="header">
			<div class="header_inner">
				
				<div><?php $this->load->view( $header ) ?></div>
				<div style="text-align:right;"><div>Welcome : <?php echo $_SESSION['fullname'] ?></div><a href="/scheduler-app/index.php/Default_Controller/logout">	 Logout</a></div>
				
			</div>
		</div>

		<div class="menu_bar">
				<div>HOME | <a href="/scheduler-app/index.php/Default_Controller/homePage">User Maintenance</a> | <a href="/scheduler-app/index.php/DepartmentController/werd">Department Maintenance</a> </div>
		
		</div>

		<div class='content'> 

			<div class='content_inner '  style="border:0px solid yellow;">

			</div>		

		</div>

		<div class="footer">

			<?php $this->load->view( $footer ) ?>
		</div>

		

	</body>
</html>