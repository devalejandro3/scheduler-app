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
				<div style="text-align:right;"><div>Welcome : Alejandro > Alain III></div><a href="/scheduler-app">	 Logout</a></div>
				
			</div>
		</div>

		<div class="menu_bar">
			<div>HOME | MENU2 | <a href="#">Department Maintenance</a> </div>
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